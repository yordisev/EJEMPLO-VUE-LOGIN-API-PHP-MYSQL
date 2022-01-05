<?php 
    require_once 'conexion/conexion.php';
    require_once 'respuestas.class.php';



    class asistentes extends conexion{
        private $token = "";
        private $tip_doc = "";
        private $numero_doc = "";
        private $p_nombre = "";
        private $s_nombre = "";
        private $p_apellido = "";
        private $s_apellido = "";
        private $edad = "";
        private $sexo = "";
        private $barrio = "";
        private $direccion = "";
        private $telefono = "";
        private $correo = "";
        private $fecha_nacimiento = "";




        public function ListaAsistentes($datostoken){
            $_respuestas = new respuestas;
            // $datos = json_decode($datos1,true);
            $nombre = $datostoken["p_nombre"];
            // $numerodocumento = $datostoken["numero_doc"];
            // print_r($datostoken['p_nombre']);
            if(!isset($datostoken['token'])){
                return $_respuestas->error_401();
            } else {
                $this->token = $datostoken['token'];
                $arrayToken = $this->buscarToken();
                if($arrayToken){
            $query = "SELECT * FROM asistentes WHERE p_nombre LIKE '%$nombre%' or numero_doc like '%$nombre%'";
            $datos1 = parent::obtenerDatos($query);
        return ($datos1);
        } else {
            return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        }
        }
    }


    public function ListaAsistente($datostoken){
        $_respuestas = new respuestas;
        $cedula = $datostoken["numero_doc"];
        if(!isset($datostoken["token"])){
            return $_respuestas->error_401();
        } else {
            $this->token = $datostoken["token"];
            $arrayToken = $this->buscarToken();
            if($arrayToken){
        $query = "SELECT * FROM asistentes WHERE numero_doc = '$cedula'";
        $datos1 = parent::obtenerDatos($query);
    return ($datos1);
    } else {
        return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
    }
    }
}

        private function obtenerDatosusuarios($correo){
            $query = "SELECT  UsuarioId, Password, Estado FROM usuarios WHERE Usuario = '$correo'";
            $datos = parent::obtenerDatos($query);
            if(isset($datos[0]['UsuarioId'])){
                return $datos;
            }else{
                return 0;
            }
        }



        public function agregarUsuario($json,$datostoken){
            $_respuestas = new respuestas;
            $datos = json_decode($json,true);
    
            if(!isset($datostoken)){
                return $_respuestas->error_401();
        } else {
            $this->token = $datostoken;
            $arrayToken = $this->buscarToken();
            if($arrayToken){

                if(!isset($datos['identificacion']) || !isset($datos['nombres']) || !isset($datos['apellidos']) ||
                !isset($datos['usuario']) || !isset($datos['password']) || !isset($datos['seccional']) || !isset($datos['municipio'])){
                    return $_respuestas->error_400();
                } else {
                            $this->identificacion = $datos['identificacion'];
                            $this->nombres = $datos['nombres'];
                            $this->apellidos = $datos['apellidos'];
                            $this->usuario = $datos['usuario'];
                            $this->password = empty($datos['password']) ? hash("SHA256",passGenerator()) : hash("SHA256",$datos['password']);
                            $this->seccional = $datos['seccional'];
                            $this->municipio = $datos['municipio'];
                            if(isset($datos['telefono'])) { $this->telefono = $datos['telefono']; }
                            if(isset($datos['rolid'])) { $this->rolid = $datos['rolid']; }
                            
                            
                            $resp = $this->insertarUsuario();
                            if($resp){
                                $respuesta = $_respuestas->responde;
                                $respuesta["result"] = array(
                                    "UsuarioId" => $resp
                                );
                                return $respuesta;
                            }else{
                                return $_respuestas->error_500();
                            }
                }
            }else {
                return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }
    
        }

        private function insertarUsuario(){
            $query = "INSERT INTO " . $this->table . " (identificacion,nombres,apellidos,telefono,usuario,password,seccional,municipio,rolid)
            values
            ('" . $this->identificacion . "','" . $this->nombres . "','" . $this->apellidos ."','" . $this->telefono . "','"  . $this->usuario . "','" . $this->password . "','" . $this->seccional . "','" . $this->municipio . "','" . $this->rolid . "')"; 
            $resp = parent::nonQueryId($query);
            if($resp){
                 return $resp;
            }else{
                return 0;
            }
        }

        private  function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

        private function insertartoken($usuarioid){
            // $val = true;
            // $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
            $r1 = bin2hex(random_bytes(10));
     $r2 = bin2hex(random_bytes(10));
     $r3 = bin2hex(random_bytes(10));
     $r4 = bin2hex(random_bytes(10));
     $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
            $date = date("y-m-d H:i");
            $estado = "Activo";
            $query = "INSERT INTO usuarios_token (UsuarioId,Token,Estado,Fecha) VALUES('$usuarioid','$token','$estado','$date')";
            $verificar = parent::nonQuery($query);
            if($verificar){
                return $token;
            }else{
                return false;
            }
        }


        private function buscarToken(){
            $query = "SELECT  TokenId,UsuarioId,Estado from usuarios_token WHERE Token = '" . $this->token . "' AND estado = 'Activo' ";
            $resp = parent::obtenerDatos($query);
            if($resp){
                return $resp;
            }else{
                return 0;
            }
        }


    }



?>
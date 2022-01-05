<?php 
    require_once 'conexion/conexion.php';
    require_once 'respuestas.class.php';



    class auth extends conexion{
        private $token = "";
        private $table = "usuarios";
        private $UsuarioId = "";
        private $identificacion = "";
        private $nombres = "";
        private $apellidos = "";
        private $telefono = "";
        private $usuario = "";
        private $password = "";
        private $seccional = "";
        private $municipio = "";
        private $rolid = "";



        public function login($json){
            $_respuestas = new respuestas;
            $datos = json_decode($json,true);
            if(!isset($datos['usuario']) || !isset($datos['password'])){
                // error en los campos
                return $_respuestas->error_400();
            }else{
                // todo esta bien
                $usuario = $datos['usuario'];
                $password = $datos['password'];
                $password = hash("SHA256",$password);
                // $password = parent::encriptar($password);
                $datos = $this->obtenerDatosusuarios($usuario);
                if($datos){
                    //si la contraseña existe
                    if($password == $datos[0]['Password']){
                        if($datos[0]['Estado'] == 1){
                            // crear el token
                            $verificart = $this->insertartoken($datos[0]['UsuarioId']);
                            if($verificart){
                                // si se guardo el token
                                $resultadoguardado = $_respuestas->responde;
                                $resultadoguardado['result'] = array(
                                                                    "token" => $verificart,
                                                                    "nombre" => $datos[0]['nombres'],
                                                                    "usuario" => $datos[0]['usuario']);
                            } else {
                                // error al guardar
                                return $_respuestas->error_500("Error interno, no hemos podido guardar");
                            }

                            return $resultadoguardado;
                        } else {
                            // el usuario esta inactivo
                            return $_respuestas->error_200("Usuario Inactivo");
                        }

                    } else {
                        return $_respuestas->error_200("Password Invalida");
                    }

                } else {
                    //no existe el usuario
                    return $_respuestas->error_200("El usuario $usuario no existe");
                }

            }
        }

        public function ListaUsuarios($datostoken){
            $_respuestas = new respuestas;
            $nombre = $datostoken["cedulaonombre"];
            if(!isset($datostoken['token'])){
                return $_respuestas->error_401();
        } else {
            $this->token = $datostoken['token'];
            $arrayToken = $this->buscarToken();
            if($arrayToken){
            $query = "SELECT * FROM usuarios WHERE identificacion LIKE '%$nombre%' or nombres like '%$nombre%'";
            $datos = parent::obtenerDatos($query);
            return ($datos);
        } else {
            return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        }
        }
    }

        private function obtenerDatosusuarios($correo){
            $query = "SELECT usuario, nombres, UsuarioId, Password, Estado FROM usuarios WHERE Usuario = '$correo'";
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
            $query = "SELECT  TokenId,UsuarioId,Estado from usuarios_token WHERE Token = '" . $this->token . "' AND Estado = 'Activo'";
            $resp = parent::obtenerDatos($query);
            if($resp){
                return $resp;
            }else{
                return 0;
            }
        }


    }



?>
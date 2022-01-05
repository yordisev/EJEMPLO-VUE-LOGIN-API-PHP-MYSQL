<?php 
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class pacientes  extends conexion{
    private $table = "pacientes";
    private $pacienteid = "";
    private $dni = "";
    private $nombre = "";
    private $direccion = "";
    private $codigoPostal = "";
    private $genero = "";
    private $telefono = "";
    private $fechaNacimiento = "0000-00-00";
    private $correo = "";
    private $token = "";
    private $imagen = "";

    // 564550a0d961c85645f54b9041b4d030

    public function ListaPacientes($pagina = 1,$datostoken){
        $_respuestas = new respuestas;
        if(!isset($datostoken)){
            return $_respuestas->error_401();
    } else {
        $this->token = $datostoken;
        $arrayToken = $this->buscarToken();
        if($arrayToken){
        $inicio = 0 ;
        $cantidad = 10;
        if($pagina > 1){
            $inicio = ($cantidad *($pagina - 1)) +1;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT PacienteId,Nombre,DNI,Telefono,Correo FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    } else {
        return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
    }
    }
}
    


    public function obtenerPaciente($id){
        $query = "SELECT * FROM " . $this->table . " WHERE PacienteId = '$id'";
        return parent::obtenerDatos($query);
    }


    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
    } else {
        $this->token = $datos['token'];
        $arrayToken = $this->buscarToken();
        if($arrayToken){
            if(!isset($datos['nombre']) || !isset($datos['dni']) || !isset($datos['correo'])){
                return $_respuestas->error_400();
            } else {
                $this->nombre = $datos['nombre'];
                        $this->dni = $datos['dni'];
                        $this->correo = $datos['correo'];
                        if(isset($datos['telefono'])) { $this->telefono = $datos['telefono']; }
                        if(isset($datos['direccion'])) { $this->direccion = $datos['direccion']; }
                        if(isset($datos['codigoPostal'])) { $this->codigoPostal = $datos['codigoPostal']; }
                        if(isset($datos['genero'])) { $this->genero = $datos['genero']; }
                        if(isset($datos['fechaNacimiento'])) { $this->fechaNacimiento = $datos['fechaNacimiento']; }

                        if(isset($datos['imagen'])){
                            $resp = $this->procesarImagen($datos['imagen']);
                            $this->imagen = $resp;
                        }

                        $resp = $this->insertarPaciente();
                        if($resp){
                            $respuesta = $_respuestas->responde;
                            $respuesta["result"] = array(
                                "pacienteId" => $resp
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


    private function procesarImagen($img){
        $direccion = dirname(__DIR__) . "\public\imagenes\\";
        $partes = explode(";base64,",$img);
        $extencion = explode('/',mime_content_type($img))[1];
        $imagen_base64 = base64_decode($partes[1]);
        $file = $direccion . uniqid() . "." . $extencion;
        file_put_contents($file,$imagen_base64);
        $nuevadireccion = str_replace('\\','/',$file);
        
        return $nuevadireccion;
    }


    private function insertarPaciente(){
        $query = "INSERT INTO " . $this->table . " (DNI,Nombre,Direccion,CodigoPostal,Telefono,Genero,FechaNacimiento,Correo,Imagen)
        values
        ('" . $this->dni . "','" . $this->nombre . "','" . $this->direccion ."','" . $this->codigoPostal . "','"  . $this->telefono . "','" . $this->genero . "','" . $this->fechaNacimiento . "','" . $this->correo . "','" . $this->imagen . "')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }


    public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
    } else {
        $this->token = $datos['token'];
        $arrayToken = $this->buscarToken();
        if($arrayToken){
            if(!isset($datos['pacienteId'])){
                return $_respuestas->error_400();
            }else{
                        $this->pacienteid = $datos['pacienteId'];
                        if(isset($datos['nombre'])) { $this->nombre = $datos['nombre']; }
                        if(isset($datos['dni'])) { $this->dni = $datos['dni']; }
                        if(isset($datos['correo'])) { $this->correo = $datos['correo']; }
                        if(isset($datos['telefono'])) { $this->telefono = $datos['telefono']; }
                        if(isset($datos['direccion'])) { $this->direccion = $datos['direccion']; }
                        if(isset($datos['codigoPostal'])) { $this->codigoPostal = $datos['codigoPostal']; }
                        if(isset($datos['genero'])) { $this->genero = $datos['genero']; }
                        if(isset($datos['fechaNacimiento'])) { $this->fechaNacimiento = $datos['fechaNacimiento']; }
            
                        $resp = $this->modificarPaciente();
                        if($resp){
                            $respuesta = $_respuestas->responde;
                            $respuesta["result"] = array(
                                "pacienteId" => $this->pacienteid
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


    private function modificarPaciente(){
        $query = "UPDATE " . $this->table . " SET Nombre ='" . $this->nombre . "',Direccion = '" . $this->direccion . "', DNI = '" . $this->dni . "', CodigoPostal = '" .
        $this->codigoPostal . "', Telefono = '" . $this->telefono . "', Genero = '" . $this->genero . "', FechaNacimiento = '" . $this->fechaNacimiento . "', Correo = '" . $this->correo .
         "' WHERE PacienteId = '" . $this->pacienteid . "'"; 
        $resp = parent::nonQuery($query);
        if($resp >= 1){
             return $resp;
        }else{
            return 0;
        }
    }


    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
    } else {
        $this->token = $datos['token'];
        $arrayToken = $this->buscarToken();
        if($arrayToken){
            if(!isset($datos['pacienteId'])){
                return $_respuestas->error_400();
            }else{
                        $this->pacienteid = $datos['pacienteId'];
            
                        $resp = $this->eliminarPaciente();
                        if($resp){
                            $respuesta = $_respuestas->responde;
                            $respuesta["result"] = array(
                                "pacienteId" => $this->pacienteid
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



    private function eliminarPaciente(){
        $query = "DELETE FROM " . $this->table . " WHERE PacienteId= '" . $this->pacienteid . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
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


    private function actualizarToken($tokenid){
        $date = date("Y-m-d H:i");
        $query = "UPDATE usuarios_token SET Fecha = '$date' WHERE TokenId = '$tokenid' ";
        $resp = parent::nonQuery($query);
        if($resp >= 1){
            return $resp;
        }else{
            return 0;
        }
    }




}


?>
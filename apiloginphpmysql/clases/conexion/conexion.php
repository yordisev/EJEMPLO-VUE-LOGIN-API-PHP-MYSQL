<?php 


class conexion {

private $server;
private $user;
private $password;
private $database;
private $port;
private $conexion;

    function __construct(){
        $listadatos = $this->datosdeConexion();
        foreach ($listadatos as $key => $value){
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->conexion = new mysqli($this->server,$this->user,$this->password,$this->database,$this->port);
        if($this->conexion->connect_errno){
            echo "no se realizo la conexion a la base de datos";
            die();
        }
    }


private function datosdeConexion(){
    $direccion = dirname(__FILE__);
    $jsondata = file_get_contents($direccion . "/" . "config");
    return json_decode($jsondata, true);
}



private function convertirUTF8($array){
    array_walk_recursive($array,function(&$item,$key){
        if(!mb_detect_encoding($item,'utf-8',true)){
            $item = utf8_encode($item);
        }
    });
    return $array;
}

// para optener los datos de la base de datos
public function obtenerDatos($sqlstr){ 
    $resultado = $this->conexion->query($sqlstr);
    $resultadoarray = array();
    foreach ($resultado as $key) {
        $resultadoarray[] = $key;
    }
    
    return $this->convertirUTF8($resultadoarray);
}

// para traer el ultimo id que se inserto en la base de datos
public function nonQuery($sqlstr){
    $resultado = $this->conexion->query($sqlstr);
    return $this->conexion->affected_rows;
}

//insertar archivos en la base de datos
public function nonQueryId($sqlstr){
    $resultado = $this->conexion->query($sqlstr);
    $filas = $this->conexion->affected_rows;
    if ($filas >= 1){
        return $this->conexion->insert_id;
    }else {
        return 0;
    }
}

//ENCRYPTAR CONTRASEÑA

protected function encriptar($string){
    return md5($string);
}



}


?>
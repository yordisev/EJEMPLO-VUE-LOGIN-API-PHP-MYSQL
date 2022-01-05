<?php 
require_once 'clases/auth.class.php';
require_once 'clases/respuestas.class.php';

header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );
header( 'Access-Control-Max-Age: 3600' );
header( 'Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
    header( "Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}" );
    header( 'Access-Control-Allow-Credentials: true' );
}

if ( $_SERVER['REQUEST_METHOD'] == 'OPTIONS' ) {
    if ( isset( $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] ) )
    header( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS' );
    if ( isset( $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'] ) )
    header( "Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}" );
}
// Advanced REST client para realizar pruebas

$_auth = new auth;
$_respuestas = new respuestas;
if($_SERVER['REQUEST_METHOD'] == "GET"){
        $header = getallheaders();
        $listausuarios =  $_auth->ListaUsuarios($header);
        header("Content-Type: application/json");
        echo json_encode($listausuarios);
        http_response_code(200);
  
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $header = getallheaders();
if (!isset($header['token'])){
//recibir datos
$postBody = file_get_contents("php://input");

//Enviamos datos al manejador
$datosArray = $_auth->login($postBody);

//Devolvemos la respuesta
header('Content-Type: application/json');
if(isset($datosArray["result"]["error_id"])){
    $respondecode = $datosArray["result"]["error_id"];
    http_response_code($respondecode);
}else{
    http_response_code(200);
}
echo json_encode($datosArray);
} else {
    $header = getallheaders();
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos los datos al manejador
    $datosArray = $_auth->agregarUsuario($postBody,$header['token']);
    //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);
}
    
} else {
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}


?>
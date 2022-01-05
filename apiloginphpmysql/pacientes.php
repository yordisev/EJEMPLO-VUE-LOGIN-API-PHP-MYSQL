<?php 
require_once 'clases/respuestas.class.php';
require_once 'clases/pacientes.class.php';

# CORS config
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

$_respuestas = new respuestas;
$_pacientes = new pacientes;

if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET['page'])){
        $header = getallheaders();
        // print_r($header['token']);
        // foreach (getallheaders() as $nombre => $valor) {
        //     echo "$nombre: $valor\n";
        // }
        $pagina = $_GET['page'];
        $listapacientes =  $_pacientes->ListaPacientes($pagina,$header['token']);
        header("Content-Type: application/json");
        echo json_encode($listapacientes);
        http_response_code(200);
    } else if(isset($_GET['id'])){
        $pacienteid = $_GET['id'];
        $datosPaciente = $_pacientes->obtenerPaciente($pacienteid);
        header("Content-Type: application/json");
        echo json_encode($datosPaciente);
        http_response_code(200);
    }
}else if($_SERVER['REQUEST_METHOD'] == "POST") {
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos los datos al manejador
    $datosArray = $_pacientes->post($postBody);
    //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);
}else if($_SERVER['REQUEST_METHOD'] == "PUT") {
        //recibimos los datos enviados
      $postBody = file_get_contents("php://input");
      //enviamos datos al manejador
      $datosArray = $_pacientes->put($postBody);
        //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);
}else if($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $headers = getallheaders();
    if(isset($headers["token"]) && isset($headers["pacienteId"])){
        //recibimos los datos enviados por el header
        $send = [
            "token" => $headers["token"],
            "pacienteId" =>$headers["pacienteId"]
        ];
        $postBody = json_encode($send);
    }else{
        //recibimos los datos enviados por el body
        $postBody = file_get_contents("php://input");
    }
     //enviamos datos al manejador
    $datosArray = $_pacientes->delete($postBody);
    //delvovemos una respuesta 
    header('Content-Type: application/json');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode = $datosArray["result"]["error_id"];
        http_response_code($responseCode);
    }else{
        http_response_code(200);
    }
    echo json_encode($datosArray);

}else {
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}



?>
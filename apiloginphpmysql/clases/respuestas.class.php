<?php 

class respuestas{

    public $responde = [
        'status' => "ok",
        "result" => array()
    ];



    public function error_405(){
        $this->responde ['status'] = "error";
        $this->responde ['result'] = array(
            "error_id" => "405",
            "error_msg" => "metodo no permitido"
        );
        return $this->responde;
    }

    public function error_200($valor = "Datos incorrectos"){
        $this->responde ['status'] = "error";
        $this->responde ['result'] = array(
            "error_id" => "200",
            "error_msg" => $valor
        );
        return $this->responde;
    }


    public function error_400(){
        $this->responde ['status'] = "error";
        $this->responde ['result'] = array(
            "error_id" => "400",
            "error_msg" => "Datos enviados Incompletos o con formato incorrecto"
        );
        return $this->responde;
    }


    public function error_500($valor = "Error interno del Servidor"){
        $this->responde ['status'] = "error";
        $this->responde ['result'] = array(
            "error_id" => "500",
            "error_msg" => $valor
        );
        return $this->responde;
    }


    public function error_401($valor = "No Autorizado token invalido"){
        $this->responde ['status'] = "error";
        $this->responde ['result'] = array(
            "error_id" => "401",
            "error_msg" => $valor
        );
        return $this->responde;
    }


}

?>
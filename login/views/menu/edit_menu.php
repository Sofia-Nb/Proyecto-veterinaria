<?php
include_once "../../../configuracion.php";
$data = datasubmitted();
$respuesta = false;
if (isset($data['idmenu'])){
    $objC = new AbmMenu();
    $respuesta = $objC->modificacion($data);
    
    if (!$respuesta){

        $sms_error = " La accion  MODIFICACION No pudo concretarse";
        
    }else $respuesta =true;
    
}
$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
    
    $retorno['errorMsg']=$sms_error;
    
}
echo json_encode($retorno);
?>
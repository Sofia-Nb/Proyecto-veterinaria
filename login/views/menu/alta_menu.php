<?php 
include_once "../../../configuracion.php";
$data = datasubmitted();
$respuesta = false;
if (isset($data['menombre'])){
        $objC = new ABMmenu();
        $respuesta = $objC->alta($data);
        if (!$respuesta){
            $mensaje = " La accion  ALTA No pudo concretarse";
            
        }
}
$retorno['respuesta'] = $respuesta;
if (isset($mensaje)){
    
    $retorno['errorMsg']=$mensaje;
   
}
 echo json_encode($retorno);
?>
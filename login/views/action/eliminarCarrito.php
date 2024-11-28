<?php
include_once '../../../configuracion.php';
include_once '../utils/funciones.php';

$data = datasubmitted();
$objSession = new Session();
$idUsuario = $objSession->getIdUsuario();

if (isset($data['idproducto'])) {
    $idproducto = $data['idproducto'];
    
    // Eliminar producto del carrito
    $objAbmCarrito = new ABMCarrito();
    $objAbmCarrito->eliminarDelCarrito($idUsuario, $idproducto);

    // Responder con el nuevo estado del carrito
    $productosCarrito = $objAbmCarrito->verCarritoPorUsuario($idUsuario);
    
    echo json_encode($productosCarrito); // Retorna los productos actuales del carrito
}
?>

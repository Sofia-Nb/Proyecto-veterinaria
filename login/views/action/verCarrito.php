<?php
include_once '../../controller/session.php';
include_once '../utils/funciones.php';

$datos = datasubmitted();
$objSession = new Session();
$idusuario = $objSession->getIdUsuario();

// Crear instancia del ABM de carrito
$abmCarrito = new ABMCarrito();

// Obtener los productos del carrito
$productosEnCarrito = $abmCarrito->verCarritoPorUsuario($idusuario);

$response = [];
if ($productosEnCarrito) {
    $response['success'] = true;
    $response['carrito'] = $productosEnCarrito; // Enviar la lista de productos
} else {
    $response['success'] = false;
    $response['mensaje'] = 'Carrito vacío.';
}

echo json_encode($response);
?>

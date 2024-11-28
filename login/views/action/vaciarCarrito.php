<?php
include_once '../../controller/session.php';
include_once '../utils/funciones.php';

$objSession = new Session();
$objAbmCarrito = new ABMCarrito();
$idusuario = $objSession->getIdUsuario();

$response = [];
if ($idusuario) {
    // Vaciar el carrito del usuario
    $exito = $objAbmCarrito->vaciarCarrito($idusuario);
    if ($exito) {
        $response = ['success' => true, 'message' => 'Carrito vaciado exitosamente.'];
    } else {
        $response = ['success' => false, 'message' => 'No se pudo vaciar el carrito.'];
    }
} else {
    $response = ['success' => false, 'message' => 'Usuario no autenticado.'];
}

header('Content-Type: application/json');
echo json_encode($response);

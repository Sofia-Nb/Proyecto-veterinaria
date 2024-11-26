<?php
include_once '../../controller/session.php';
include_once '../utils/funciones.php';

include_once '../../controller/session.php';
include_once '../utils/funciones.php';

$objSession = new Session();
$datos = dataSubmitted();
$objProductos = new abmProducto();



if (!isset($datos['productoId'], $datos['cantidad'])) {
    echo json_encode(['success' => false, 'mensaje' => 'Datos incompletos']);
    exit;
}

$idUsuario = $objSession->getIdUsuario();
$idProducto = intval($datos['productoId']);
$cantidad = intval($datos['cantidad']);

if ($idProducto <= 0 || $cantidad <= 0) {
    echo json_encode(['success' => false, 'mensaje' => 'ID del producto o cantidad inválidos']);
    exit;
}

$abmCarrito = new ABMCarrito();

$idCarrito = $abmCarrito->idCarrito($idUsuario);

// Verificar si el producto ya existe en el carrito
$productoExistente = $abmCarrito->verificarProductoEnCarrito($idCarrito, $idUsuario, $idProducto);

try {
    if ($productoExistente) {
        // Si el producto ya está en el carrito, actualizamos la cantidad

        $cantPrincipal = $productoExistente->getCantProductos();
        $nuevaCantidad= $cantPrincipal + $cantidad;

        $abmCarrito->actualizarCantidad($idCarrito, $idUsuario, $idProducto, $nuevaCantidad);
    } else {
        // Si el producto no está en el carrito, lo agregamos
        $abmCarrito->agregarAlCarrito($idCarrito, $idUsuario, $idProducto, $cantidad);
    }
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'mensaje' => 'Error: ' . $e->getMessage()]);
}

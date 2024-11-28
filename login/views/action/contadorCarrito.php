<?php
include_once '../../controller/session.php'; // Asegúrate de incluir el archivo que maneja las sesiones
include_once '../../model/ABMCarrito.php'; // Asegúrate de incluir el modelo del carrito
include_once '../../model/ABMProducto.php'; // Asegúrate de incluir el modelo de los productos

// Verifica si el usuario está autenticado
$objSession = new Session();
if (!$objSession->validar()) {
    // Si no está autenticado, redirige al login
    echo json_encode(['success' => false, 'mensaje' => 'Usuario no autenticado']);
    exit;
}

// Obtiene el ID del usuario
$idUsuario = $objSession->getIdUsuario();

// Crear una instancia del ABM de carrito
$abmCarrito = new ABMCarrito();

// Obtener los productos del carrito para este usuario
$productosEnCarrito = $abmCarrito->verCarritoPorUsuario($idUsuario);

$response = [];

// Si hay productos en el carrito
if ($productosEnCarrito) {
    // Crear una lista de productos con los detalles necesarios (por ejemplo, nombre, precio, etc.)
    $productos = [];
    foreach ($productosEnCarrito as $productoCarrito) {
        // Obtener detalles del producto (por ejemplo, nombre, precio, imagen)
        $abmProducto = new ABMProducto();
        $producto = $abmProducto->obtenerProducto($productoCarrito['idproducto']);

        if ($producto) {
            $productos[] = [
                'idproducto' => $producto['idproducto'],
                'nombre' => $producto['proNombre'],
                'detalle' => $producto['proDetalle'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantproductos' => $productoCarrito['cantproductos']
            ];
        }
    }

    // Respuesta exitosa con los productos
    $response['success'] = true;
    $response['carrito'] = $productos; // Productos del carrito
} else {
    // Si no hay productos en el carrito
    $response['success'] = false;
    $response['mensaje'] = 'Carrito vacío';
}

// Devuelve la respuesta como JSON
echo json_encode($response);
?>

<?php
include_once '../estructura/nav-seguro.php';
include_once '../utils/funciones.php';
include_once '../../controller/ABMCarrito.php';

$objSession = new Session();
$objAbmCarrito = new ABMCarrito();
$objProducto = new abmProducto();
$idusuario = $objSession->getIdUsuario();
$productosCarrito = $objAbmCarrito->verCarritoPorUsuario($idusuario);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Veterinaria</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Carrito de Compras</h2>
        <div id="carrito-container">
        <?php if (!empty($productosCarrito)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Detalles</Data></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="carrito-contenedor">
                    <?php foreach ($productosCarrito as $item): 
                    $dataproducto = $objProducto->obtenerProducto($item['idproducto']);
                    ?>
                    <tr>
                    <td><img src="../assests/img/<?php echo $dataproducto->getImagen(); ?>" alt="Producto" width="100"></td>
                        <td><?php echo $dataproducto->getProNombre(); ?></td>
                        <td><?php echo $dataproducto->getProDetalle(); ?></td>
                        <td>$<?php echo $dataproducto->getPrecio(); ?></td>
                        <td><?php echo $item['cantproductos']; ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(<?php echo $item['idproducto']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>

        <button id="vaciar-carrito" class="btn btn-danger">Vaciar Carrito</button>
        <button id="finalizar-compra" class="btn btn-success">Pagar</button>
    </div>

    <?php include_once '../estructura/footer.php';?>

    <script>
        function eliminarProducto(idProducto) {
    $.ajax({
        url: '../action/eliminarCarrito.php',  // Llamar al archivo PHP para eliminar el producto
        type: 'POST',
        data: { idproducto: idProducto },
        dataType: 'json',  // Esperamos que el servidor nos devuelva los datos en formato JSON
        success: function(response) {
    if (response.length > 0) {
        mostrarCarrito(response);
    } else {
        $('#carrito-contenedor').html('<tr><td colspan="6">Carrito vacío</td></tr>');
    }
},
        error: function() {
            alert("Error al eliminar el producto.");
        }
    });
}

function mostrarCarrito(productosCarrito) {
    let carritoHTML = '';
    
    if (productosCarrito && productosCarrito.length > 0) {
        productosCarrito.forEach(function(item) {
            carritoHTML += `
                <tr>
                    <td><img src="../assests/img/<?php echo $dataproducto->getImagen(); ?>" alt="Producto" width="100"></td>
                    <td><?php echo $dataproducto->getProNombre(); ?></td>
                    <td><td><?php echo $dataproducto->getProDetalle(); ?></td></td>
                    <td>$<td>$<?php echo $dataproducto->getPrecio(); ?></td></td>
                    <td><?php echo $item['cantproductos']; ?></td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${item.idproducto})">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        $('#carrito-contenedor').html(carritoHTML); // Actualiza el contenedor con los productos
    } else {
        $('#carrito-contenedor').html('<tr><td colspan="6">Carrito vacío</td></tr>');
    }
}

// Evento para vaciar el carrito
$('#vaciar-carrito').on('click', function() {
    if (confirm("¿Estás seguro de que deseas vaciar el carrito?")) {
        $.ajax({
            url: '../action/vaciarCarrito.php', // Archivo PHP que vacía el carrito
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#carrito-container').html('<p>No hay productos en el carrito.</p>'); // Actualizar la vista
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("Error al vaciar el carrito.");
            }
        });
    }
});



// Redirigir al login cuando se hace clic en el botón "Pagar"
$('#finalizar-compra').on('click', function() {
    window.location.href = "../Login/login.php";
});

    </script>
</body>
</html>


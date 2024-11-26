<?php
include_once '../estructura/nav-seguro.php';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Carrito de Compras</h2>
        <div id="carrito-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="carrito-contenedor">
                    <!-- Aquí se mostrarán los productos del carrito -->
                </tbody>
            </table>
        </div>

        <button id="vaciar-carrito" class="btn btn-danger">Vaciar Carrito</button>
        <button id="finalizar-compra" class="btn btn-success">Pagar</button>
    </div>

    <?php include_once '../estructura/footer.php';?>
    <script src="../views/assests/js/verCarrito.js"></script>
    <script>
        // Redirigir al login cuando se hace clic en el botón "Pagar"
        $('#finalizar-compra').on('click', function() {
            window.location.href = "../Login/login.php";
        });
    </script>
</body>
</html>


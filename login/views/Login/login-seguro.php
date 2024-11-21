<?php 
include_once '../estructura/nav-seguro.php';
include_once '../../../configuracion.php';
include_once '../../controller/session.php';

// Crear la instancia de la clase Session
$objSession = new Session();

// Verificar si el usuario está autenticado
if (!$objSession->validar()) {
    header('Location: login.php');
    exit;
}

// Obtener el rol del usuario desde la sesión
$rolUsuario = $objSession->getRol(); // Esto te dará el rol del usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estructura/style.css">
</head>
<body>

<div class="container mt-5">
    <h1>Bienvenido a tu Dashboard, <?php echo htmlspecialchars($objSession->getUsuario()); ?>!</h1>

    <!-- Ejemplo de contenido del dashboard -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Información de tu cuenta
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($objSession->getUsuario()); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($objSession->getEmail()); ?></p>
                </div>
            </div>
        </div>

        <!-- Mostrar opciones solo para administradores -->
        <?php if ($rolUsuario == 1): ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Gestión Administrativa
                </div>
                <div class="card-body">
                    <h5>Opciones de administrador:</h5>
                    <ul>
                        <li><a href="eliminar_usuarios.php" class="btn btn-danger">Eliminar Usuarios</a></li>
                        <li><a href="asignar_roles.php" class="btn btn-primary">Asignar Roles</a></li>
                        <li><a href="gestion_productos.php" class="btn btn-warning">Gestionar Productos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <!-- Botón para cerrar sesión -->
    <form action="../Login/logout.php" method="POST">
        <button type="submit" class="btn btn-danger mt-3">Cerrar Sesión</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

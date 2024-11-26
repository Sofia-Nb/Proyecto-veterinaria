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
    <link rel="stylesheet" href="../assests/css/styleContactos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


</head>
<body>

<div style="background-color: #33312A; padding: 40px;"></div>
<div class="container mt-5">
    <button onclick="history.back()" class="btn btn-primary">Volver</button>
    <br><br><br>
    <h1>Contacto</h1>
    <p>Por favor, complete el formulario a continuación para ponerse en contacto con nosotros. Estaremos encantados de atender su consulta.</p>
<br>

    <!-- Formulario de contacto -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div id="datosContacto">
            <form action="procesar_contacto.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input type="text" class="form-control" id="asunto" name="asunto" required>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </form>
            </div>
        </div>
    </div>

<br><br><br>

    <!-- Información de contacto adicional -->
    <div class="d-flex justify-content-between align-items-center">
    <div>
        <h4><i class="bi bi-geo-alt-fill"></i> Dirección</h4>
        <p>Santiago del Estero 202, Q8300 Neuquén</p>
    </div>
    <div>
        <h4><i class="bi bi-telephone-fill"></i> Teléfono</h4>
        <p>(+123) 456 7890</p>
    </div>
    <div>
        <h4><i class="bi bi-envelope-fill"></i> Correo</h4>
        <p>VeterinariaQP@gmail.com</p>
    </div>
</div>

</div>
<br>

<?php
include_once '../estructura/footer.php';

?>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
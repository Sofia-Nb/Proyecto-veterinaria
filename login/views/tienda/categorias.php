<?php 
    include_once '../estructura/nav.php';
    include_once '../../../configuracion.php'; // Configuración general
    include_once '../../controller/session.php'; // Controlador de sesión

    $objSession = new Session(); // Instancia de la sesión

// Verificar si el usuario está autenticado
if (!$objSession->validar()) {
    header('Location: login.php');
    exit;
}

?>


<script>$(document).ready(function () {
    actualizarContadorCarrito(); // Esta función se llama cada vez que la página se carga
});
</script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Veterinaria</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body><br><br>

<?php if ($idMenu == 5): ?>
<!-- CATEGORIA PARA LA OPCION DE GATOS -->
<div id="categorias" class="container mt-5">
    <div class="row d-flex align-items-stretch">
        <!-- Accesorios Gatos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Accesorios</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img12.jpg" class="img-fluid product-img" alt="collares"></a></td>
                                <td><a href="collares.php">Collares</a></td>
                                <td><a href="#"><img src="../assests/img/img14.avif" class="img-fluid product-img" alt="prendas"></a></td>
                                <td><a href="#">Prendas</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img11.webp" class="img-fluid product-img" alt="correas"></a></td>
                                <td><a href="#">Correas</a></td>
                                <td><a href="#"><img src="../assests/img/img13.jpg" class="img-fluid product-img" alt="camas"></a></td>
                                <td><a href="#">Camas</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Alimentos Gatos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Alimentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img17.webp" class="img-fluid product-img" alt="whiskas"></a></td>
                                <td><a href="#">Whiskas</a></td>
                                <td><a href="#"><img src="../assests/img/img18.jpg" class="img-fluid product-img" alt="catchow"></a></td>
                                <td><a href="#">Cat Chow</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img19.webp" class="img-fluid product-img" alt="raza"></a></td>
                                <td><a href="#">Raza</a></td>
                                <td><a href="#"><img src="../assests/img/img20.webp" class="img-fluid product-img" alt="sieger"></a></td>
                                <td><a href="#">Sieger</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Medicamentos Gatos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Medicamentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img25.webp" class="img-fluid product-img" alt="silimarina"></a></td>
                                <td><a href="#">hepatoprotectores</a></td>
                                <td><a href="#"><img src="../assests/img/img26.jpg" class="img-fluid product-img" alt="revolutionplus"></a></td>
                                <td><a href="#">antiparasitarios</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img27.jpg" class="img-fluid product-img" alt="totalfull"></a></td>
                                <td><a href="#">Suplementos nutricionales</a></td>
                                <td><a href="#"><img src="../assests/img/img28.jpg" class="img-fluid product-img" alt="cisticalm"></a></td>
                                <td><a href="#">suplementos urológicos</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php elseif ($rolUsuario == 4): ?>
<!-- CATEGORIA PARA LA OPCION DE PERROS -->
<div id="categorias" class="container mt-5">
    <div class="row d-flex align-items-stretch">
        <!-- Accesorios Perros -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Accesorios</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img5.webp" class="img-fluid product-img" alt="collares"></a></td>
                                <td><a href="collares.php">Collares</a></td>
                                <td><a href="#"><img src="../assests/img/img8.jpg" class="img-fluid product-img" alt="prendas"></a></td>
                                <td><a href="#">Prendas</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img9.webp" class="img-fluid product-img" alt="correas"></a></td>
                                <td><a href="#">Correas</a></td>
                                <td><a href="#"><img src="../assests/img/img10.webp" class="img-fluid product-img" alt="camas"></a></td>
                                <td><a href="#">Camas</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Alimentos Perros -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Alimentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img2.webp" class="img-fluid product-img" alt="proplan"></a></td>
                                <td><a href="#">ProPlan</a></td>
                                <td><a href="#"><img src="../assests/img/img3.jpg" class="img-fluid product-img" alt="pedigree"></a></td>
                                <td><a href="#">Pedigree</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img15.jpg" class="img-fluid product-img" alt="raza"></a></td>
                                <td><a href="#">Raza</a></td>
                                <td><a href="#"><img src="../assests/img/img16.png" class="img-fluid product-img" alt="dogchow"></a></td>
                                <td><a href="#">DogChow</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Medicamentos Perros -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Medicamentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img21.jpg" class="img-fluid product-img" alt="librela"></a></td>
                                <td><a href="#">anticuerpos monoclonales</a></td>
                                <td><a href="#"><img src="../assests/img/img22.jpg" class="img-fluid product-img" alt="colotrin"></a></td>
                                <td><a href="#">antiinflamatorios</a></td>
                            </tr>
                            <tr>
                                <td><a href="#"><img src="../assests/img/img23.jpg" class="img-fluid product-img" alt="anemibye"></a></td>
                                <td><a href="#">antianemicos</a></td>
                                <td><a href="#"><img src="../assests/img/img24.png" class="img-fluid product-img" alt="simparica"></a></td>
                                <td><a href="#">Anti Pulgas</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
include_once '../estructura/footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assests/js/agregarCarrito.js"></script>
<script src="../assests/js/carrito.js"></script>

</body>
</html>
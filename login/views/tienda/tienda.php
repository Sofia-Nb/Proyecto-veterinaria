<?php
include_once '../estructura/nav.php';
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
<div class="container mt-5">
    <div class="row">
        <!-- Accesorios -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Accesorios</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="#"><img src="../../assests/img/img5.webp" class="img-fluid" alt="collares" style="width: 200px;"></a></td>


                                <td><a href="collares.php">collares</a></td>


                                <td><a href="http://localhost:3000/login/views/collares.php"><img src="../views/" class="img-fluid" alt="bozal" style="width: 200px;"></a></td>


                                <td><a href="accesorio.php?producto=bozal">bozal</a></td>
                            </tr>
                            <tr>
                                <td><a href="accesorio.php?producto=corrreas"><img src="../../../img1.jpg" class="img-fluid" alt="correas" style="width: 200px;"></a></td>


                                <td><a href="accesorio.php?producto=correas">correas</a></td>


                                <td><a href="accesorio.php?producto=cono"><img src="../../../img1.jpg" class="img-fluid" alt="cono" style="width: 200px;"></a></td>


                                <td><a href="accesorio.php?producto=cono">cono</a></td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Alimentos -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alimentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href=""><img src="../../../imagen2.jpg" class="img-fluid" alt="Snacks" style="width: 150px;"></a></td>


                                <td><a href="alimento.php?producto=snacks">Snacks</a></td>


                                <td><a href="alimento.php?producto=bebidas"><img src="../../../imagen2.jpg" class="img-fluid" alt="Bebidas" style="width: 150px;"></a></td>


                                <td><a href="alimento.php?producto=bebidas">Bebidas</a></td>
                            </tr>
                            <tr>
                                <td><a href="alimento.php?producto=frutas"><img src="../../../imagen2.jpg" class="img-fluid" alt="Gato Purina One" style="width: 150px;"></a></td>


                                <td><a href="alimento.php?producto=frutas">Gato Purina One</a></td>


                                <td><a href="alimento.php?producto=verduras"><img src="../../../imagen2.jpg" class="img-fluid" alt="Verduras" style="width: 150px;"></a></td>


                                <td><a href="alimento.php?producto=verduras">Verduras</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Medicamentos -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicamentos</h5>
                    <table class="table text-center">
                        <tbody>
                            <tr>
                                <td><a href="medicamento.php?producto=analgesicos"><img src="../../../img3.jpg" class="img-fluid" alt="Analgésicos" style="width: 150px;"></a></td>


                                <td><a href="medicamento.php?producto=analgesicos">Analgésicos</a></td>


                                <td><a href="medicamento.php?producto=antiinflamatorios"><img src="../../../img3.jpg" class="img-fluid" alt="Antiinflamatorios" style="width: 150px;"></a></td>


                                <td><a href="medicamento.php?producto=antiinflamatorios">Antiinflamatorios</a></td>


                            </tr>
                            <tr>
                                <td><a href="medicamento.php?producto=vitaminas"><img src="../../../img3.jpg" class="img-fluid" alt="Vitaminas" style="width: 150px;"></a></td>


                                <td><a href="medicamento.php?producto=vitaminas">Vitaminas</a></td>


                                <td><a href="medicamento.php?producto=antibioticos"><img src="../../../img3.jpg" class="img-fluid" alt="Antibióticos" style="width: 150px;"></a></td>


                                <td><a href="medicamento.php?producto=antibioticos">Antibióticos</a></td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
include_once '../estructura/footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assests/js/agregarCarrito.js"></script>
<script src="../assests/js/carrito.js"></script>

</body>
</html>
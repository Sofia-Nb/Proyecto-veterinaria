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
<body><br>


<div class="container mt-5">
    <h2>Accesorios</h2>
    <!-- Carrusel para Collares -->
    <div id="carouselCollares" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Primer Slide -->
            <div class="carousel-item active">
                <div class="row">
                    <!-- Producto 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img1.webp" class="card-img-top" alt="Collar 1">
                            <div class="card-body">
                                <h5 class="card-title">Collares para cachorros</h5>
                                <p class="card-text">Collar elegantes de colores para cualquier ocasión especial. Longitud ajustable.</p>
                                <br><br>
                                <p class="card-text"><strong>Precio: US$ 29.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="1" data-nombre="Collar de Plata" data-precio="29.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img2.jpg" class="card-img-top" alt="Collar 2">
                            <div class="card-body">
                                <h5 class="card-title">Prendas para cachorros</h5>
                                <p class="card-text">Prendas cómodas para cachorritos, diseñadas para mantenerlos cálidos. Perfectas para cualquier ocasión, con materiales suaves y seguros.</p>
                                <p class="card-text"><strong>Precio: US$ 129.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="2" data-nombre="Collar de Oro" data-precio="129.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img3.webp" class="card-img-top" alt="Collar 3">
                            <div class="card-body">
                                <h5 class="card-title">Correas</h5>
                                <p class="card-text">Correas resistentes y cómodas para perros, ideales para paseos seguros y controlados.</p>
                                <br>
                                <p class="card-text"><strong>Precio: US$ 19.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="3" data-nombre="Collar de Cuero" data-precio="19.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segundo Slide (agregar más productos si lo deseas) -->
            <div class="carousel-item">
                <div class="row">
                    <!-- Producto 4 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img4.jpg" class="card-img-top" alt="Collar 4">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cadenas</h5>
                                <p class="card-text">Un diseño moderno y elegante, con cadenas de acero inoxidable.</p>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="4" data-nombre="Collar de Cadenas" data-precio="49.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img5.avif" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Seda</h5>
                                <p class="card-text">Collar de seda suave, perfecto para eventos elegantes.</p>
                                <p class="card-text"><strong>Precio: US$ 79.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="5" data-nombre="Collar de Seda" data-precio="79.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img6.webp" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cristales</h5>
                                <p class="card-text">Collar con cristales brillantes, para un toque de lujo.</p>
                                <p class="card-text"><strong>Precio: US$ 99.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="6" data-nombre="Collar de Cristales" data-precio="99.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCollares" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCollares" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="container mt-5">
    <h2>Alimentos</h2>
    <!-- Carrusel para Alimentos -->
    <div id="carouselAlimentos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Primer Slide -->
            <div class="carousel-item active">
                <div class="row">
                    <!-- Producto 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img7.jpg" class="card-img-top" alt="Collar 1">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Plata</h5>
                                <p class="card-text">Un collar elegante de plata para cualquier ocasión especial. Longitud ajustable.</p>
                                <p class="card-text"><strong>Precio: US$ 29.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="7" data-nombre="Collar de Plata" data-precio="29.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img8.jpg" class="card-img-top" alt="Collar 2">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Oro</h5>
                                <p class="card-text">Collar de oro de 18 quilates, ideal para eventos formales y elegantes.</p>
                                <p class="card-text"><strong>Precio: US$ 129.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="8" data-nombre="Collar de Oro" data-precio="129.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img9.png" class="card-img-top" alt="Collar 3">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cuero</h5>
                                <p class="card-text">Collar de cuero con detalles metálicos. Perfecto para looks casuales.</p>
                                <p class="card-text"><strong>Precio: US$ 19.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="9" data-nombre="Collar de Cuero" data-precio="19.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segundo Slide (agregar más productos si lo deseas) -->
            <div class="carousel-item">
                <div class="row">
                    <!-- Producto 4 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img10.webp" class="card-img-top" alt="Collar 4">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cadenas</h5>
                                <p class="card-text">Un diseño moderno y elegante, con cadenas de acero inoxidable.</p>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="10" data-nombre="Collar de Cadenas" data-precio="49.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img11.jpg" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Seda</h5>
                                <p class="card-text">Collar de seda suave, perfecto para eventos elegantes.</p>
                                <p class="card-text"><strong>Precio: US$ 79.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="1" data-nombre="Collar de Seda" data-precio="79.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img12.webp" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cristales</h5>
                                <p class="card-text">Collar con cristales brillantes, para un toque de lujo.</p>
                                <p class="card-text"><strong>Precio: US$ 99.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="12" data-nombre="Collar de Cristales" data-precio="99.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAlimentos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAlimentos" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="container mt-5">
    <h2>Medicamentos</h2>
    <!-- Carrusel para Medicamentos -->
    <div id="carouselMedicamentos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Primer Slide -->
            <div class="carousel-item active">
                <div class="row">
                    <!-- Producto 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img13.jpg" class="card-img-top" alt="Collar 1">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Plata</h5>
                                <p class="card-text">Un collar elegante de plata para cualquier ocasión especial. Longitud ajustable.</p>
                                <p class="card-text"><strong>Precio: US$ 29.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="13" data-nombre="Collar de Plata" data-precio="29.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img14.jpg" class="card-img-top" alt="Collar 2">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Oro</h5>
                                <p class="card-text">Collar de oro de 18 quilates, ideal para eventos formales y elegantes.</p>
                                <p class="card-text"><strong>Precio: US$ 129.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="14" data-nombre="Collar de Oro" data-precio="129.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img15.png" class="card-img-top" alt="Collar 3">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cuero</h5>
                                <p class="card-text">Collar de cuero con detalles metálicos. Perfecto para looks casuales.</p>
                                <p class="card-text"><strong>Precio: US$ 19.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="15" data-nombre="Collar de Cuero" data-precio="19.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segundo Slide (agregar más productos si lo deseas) -->
            <div class="carousel-item">
                <div class="row">
                    <!-- Producto 4 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img16.webp" class="card-img-top" alt="Collar 4">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cadenas</h5>
                                <p class="card-text">Un diseño moderno y elegante, con cadenas de acero inoxidable.</p>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="16" data-nombre="Collar de Cadenas" data-precio="49.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img17.jpg" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Seda</h5>
                                <p class="card-text">Collar de seda suave, perfecto para eventos elegantes.</p>
                                <p class="card-text"><strong>Precio: US$ 79.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="17" data-nombre="Collar de Seda" data-precio="79.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img18.jpg" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Collar de Cristales</h5>
                                <p class="card-text">Collar con cristales brillantes, para un toque de lujo.</p>
                                <p class="card-text"><strong>Precio: US$ 99.99</strong></p>
                                <a href="javascript:void(0);" class="btn btn-warning agregarCarrito" data-producto="18" data-nombre="Collar de Cristales" data-precio="99.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMedicamentos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMedicamentos" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php include '../estructura/footer.php'; // Incluir pie de página ?>
<script src="../assests/js/agregarCarrito.js"></script>


</body>
</html>

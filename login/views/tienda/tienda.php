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
                                <p class="card-text"><strong>Precio: US$ 20.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="1" data-nombre="Collar de Plata" data-precio="20.99">Agregar al carrito</a>
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
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="2" data-nombre="Collar de Oro" data-precio="49.99">Agregar al carrito</a>
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
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="3" data-nombre="Collar de Cuero" data-precio="19.99">Agregar al carrito</a>
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
                                <h5 class="card-title">Collares para gatos</h5>
                                <p class="card-text">Collares suaves y ligeros. Ofrecen comodidad y seguridad, con un diseño ajustable que se adapta a gatos de todos los tamaños.</p>
                                <p class="card-text"><strong>Precio: US$ 20.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="4" data-nombre="Collares para gatos" data-precio="20.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img5.avif" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">Prendas para gatos</h5>
                                <p class="card-text">Abrigos cómodos para gatos. Fabricados con materiales suaves y transpirables, ideales para mantener a tu mascota cálida y protegida en climas fríos.</p>
                                <p class="card-text"><strong>Precio: US$ 39.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="5" data-nombre="Prendas para gatos" data-precio="39.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img6.webp" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Pechera con correa para gatos</h5>
                                <p class="card-text">Pechera ajustable con correa incluida. Ideal para paseos seguros, fabricada con materiales resistentes pero suaves al tacto.</p>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="6" data-nombre="Pechera con correa para gatos" data-precio="49.99">Agregar al carrito</a>
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
                                <h5 class="card-title">Pedigree adulto</h5>
                                <p class="card-text">Alimento balanceado para perros adultos. Enriquecido con vitaminas y minerales para mantener a tu mascota fuerte y saludable.</p>
                                <p class="card-text"><strong>Precio: US$ 29.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="7" data-nombre="Pedigree adulto" data-precio="29.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img8.jpg" class="card-img-top" alt="Collar 2">
                            <div class="card-body">
                                <h5 class="card-title">Raza adulto (Perro)</h5>
                                <p class="card-text">Alimento premium para perros adultos. Diseñado para cubrir todas sus necesidades nutricionales con ingredientes de alta calidad.</p>
                                <p class="card-text"><strong>Precio: US$ 129.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="8" data-nombre="Raza adulto (Perro)" data-precio="129.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img9.png" class="card-img-top" alt="Collar 3">
                            <div class="card-body">
                                <h5 class="card-title">Dog Chow adulto</h5>
                                <p class="card-text">Comida completa para perros adultos. Proporciona la energía y los nutrientes necesarios para mantener a tu perro feliz y saludable.</p>
                                <p class="card-text"><strong>Precio: US$ 19.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="9" data-nombre="Dog Chow adulto" data-precio="19.99">Agregar al carrito</a>
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
                                <h5 class="card-title">Whiskas adultos</h5>
                                <p class="card-text">Alimento seco para gatos adultos. Formulado con ingredientes naturales para una digestión óptima. Incluye nutrientes esenciales para su bienestar.</p>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="10" data-nombre="Whiskas" data-precio="49.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img11.jpg" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">Cat Chow adulto</h5>
                                <p class="card-text"> Alimento rico en proteínas y fibras naturales. Ayuda a mantener un sistema digestivo saludable y un pelaje brillante.</p>
                                <br>
                                <p class="card-text"><strong>Precio: US$ 79.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="11" data-nombre="Cat Chow adulto" data-precio="79.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img12.webp" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Raza adulto (Gato)</h5>
                                <p class="card-text">Comida premium para gatos adultos, enriquecida con vitaminas y minerales esenciales. Diseñada para mejorar la salud general y mantener la vitalidad.</p>
                                <p class="card-text"><strong>Precio: US$ 99.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="12" data-nombre="Raza adulto (Gato)" data-precio="99.99">Agregar al carrito</a>
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
                                <h5 class="card-title">Librela</h5>
                                <p class="card-text">Tratamiento innovador para el alivio del dolor crónico en perros. Utiliza anticuerpos monoclonales para brindar un alivio seguro y efectivo.</p>
                                <p class="card-text"><strong>Precio: US$ 18.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="13" data-nombre="Librela" data-precio="18.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img14.jpg" class="card-img-top" alt="Collar 2">
                            <div class="card-body">
                                <h5 class="card-title">Anemi-Bye</h5>
                                <p class="card-text">Suplemento antianémico diseñado para tratar deficiencias de hierro en mascotas.</p>
                                <br><br>
                                <p class="card-text"><strong>Precio: US$ 109.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="14" data-nombre="Anemi-Bye" data-precio="109.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img15.png" class="card-img-top" alt="Collar 3">
                            <div class="card-body">
                                <h5 class="card-title">Simparica</h5>
                                <p class="card-text">Tabletas masticables que eliminan pulgas y garrapatas. Brinda protección continua por hasta 30 días, manteniendo a tu mascota libre de parásitos.</p>
                                <p class="card-text"><strong>Precio: US$ 30.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="15" data-nombre="Simparica" data-precio="30.99">Agregar al carrito</a>
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
                                <h5 class="card-title">Silimarina</h5>
                                <p class="card-text">Hepatoprotector natural que ayuda a mantener un hígado saludable. Ideal para mascotas con enfermedades hepáticas o en recuperación.</p>
                                <br>
                                <p class="card-text"><strong>Precio: US$ 49.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="16" data-nombre="Silimarina" data-precio="49.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 5 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img17.jpg" class="card-img-top" alt="Collar 5">
                            <div class="card-body">
                                <h5 class="card-title">RevolutionPlus</h5>
                                <p class="card-text">Tratamiento antiparasitario de amplio espectro. Protege contra pulgas, garrapatas, ácaros y parásitos internos.</p>
                                <br><br>
                                <p class="card-text"><strong>Precio: US$ 79.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="17" data-nombre="RevolutionPlus" data-precio="79.99">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 6 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img id="productos" src="../assests/img/img18.jpg" class="card-img-top" alt="Collar 6">
                            <div class="card-body">
                                <h5 class="card-title">Totalfull</h5>
                                <p class="card-text">Suplemento nutricional completo para mejorar la vitalidad y fortalecer el sistema inmunológico de tu mascota. Ideal para periodos de recuperación o como complemento dietético.</p>
                                <p class="card-text"><strong>Precio: US$ 55.99</strong></p>
                                <a href="javascript:void(0);" id="agregarCarrito" class="btn btn-warning agregarCarrito" data-producto="18" data-nombre="Totalfull" data-precio="55.99">Agregar al carrito</a>
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

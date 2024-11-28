$(document).ready(function () {
    // Agregar un producto al carrito
    $('.agregarCarrito').on('click', function () {
        const productoId = $(this).data('producto');
        let cantidad = 1; // Definimos que por defecto la cantidad es 1

        // Verificamos si ya hay este producto en el carrito y sumamos la cantidad
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        const productoExistente = carrito.find(item => item.idproducto === productoId);
        if (productoExistente) {
            cantidad = productoExistente.cantidad + 1; // Si ya existe, se incrementa la cantidad
        }

        // Llamada AJAX para agregar el producto al carrito
        $.ajax({
            url: '../../views/action/agregarCarrito.php',
            type: 'POST',
            dataType: 'json',
            data: {
                productoId: productoId,
                cantidad: cantidad
            },
            success: function (response) {
                if (response.success) {
                    alert('Producto agregado al carrito');
                    actualizarCarrito(); // Refresca la vista del carrito
                    // Actualizar el contador del carrito
                } else {
                    alert('Error: ' + response.mensaje);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al agregar producto:', error);
            }
        });
    });
});


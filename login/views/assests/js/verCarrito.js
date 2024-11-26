document.addEventListener('DOMContentLoaded', function() {
    // Función para cargar el carrito
    function cargarCarrito() {
        fetch('ruta/a/verCarrito.php', {
            method: 'GET', // O 'POST' si necesitas enviar algún dato adicional
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Si la respuesta es exitosa, mostrar los productos
                mostrarCarrito(data.carrito);
            } else {
                // Si el carrito está vacío, mostrar mensaje
                document.getElementById('carrito-contenedor').innerHTML = '<tr><td colspan="4">Carrito vacío</td></tr>';
            }
        })
        .catch(error => {
            console.error('Error al cargar el carrito:', error);
            document.getElementById('carrito-contenedor').innerHTML = '<tr><td colspan="4">Error al cargar el carrito</td></tr>';
        });
    }

    // Función para mostrar los productos en el carrito
    function mostrarCarrito(productos) {
        const contenedor = document.getElementById('carrito-contenedor');
        contenedor.innerHTML = ''; // Limpiar el contenedor antes de mostrar los productos

        // Recorrer los productos y mostrarlos en la tabla
        productos.forEach(producto => {
            const productoFila = document.createElement('tr');

            productoFila.innerHTML = `
                <td>${producto.nombre}</td>
                <td>$${producto.precio}</td>
                <td>${producto.cantproductos}</td>
                <td>
                    <!-- Puedes agregar botones para eliminar o modificar la cantidad -->
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${producto.idproducto})">Eliminar</button>
                </td>
            `;

            contenedor.appendChild(productoFila); // Añadir la fila a la tabla
        });
    }

    // Cargar el carrito al cargar la página
    cargarCarrito();
});

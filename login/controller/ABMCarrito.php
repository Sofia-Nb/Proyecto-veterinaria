<?php
class ABMCarrito
{
    private $objCarrito;

    public function __construct()
    {
        $this->objCarrito = new Carrito();
    }

    // Agregar un producto al carrito
    public function agregarProducto($idCarrito, $idusuario, $idproducto, $cantproductos)
    {
        // Verificar si el producto ya está en el carrito
        $productosEnCarrito = $this->objCarrito->obtenerCarritoPorUsuario($idusuario);

        foreach ($productosEnCarrito as $producto) {
            if ($producto['idproducto'] == $idproducto) {
                // Si ya existe, actualizar la cantidad
                $this->actualizarCantidad($idCarrito, $idusuario, $idproducto, $producto['cantproductos'] + $cantproductos);
                return;
            }
        }

        $objCarrito = new Carrito();
        // Si no existe, agregar el producto al carrito
        $objCarrito->setear($idCarrito, $idusuario, $idproducto, $cantproductos);
        if ($objCarrito->insertar()) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un producto del carrito
    public function eliminarProducto($idusuario, $idproducto)
    {
        if ($this->objCarrito->eliminarProducto($idusuario, $idproducto)) {
            echo "Producto eliminado del carrito.";
        } else {
            echo "Error al eliminar el producto.";
        }
    }

    // Vaciar el carrito
    public function vaciarCarrito($idusuario)
    {
        $objCarrito = new Carrito();
        if ($objCarrito->vaciarCarrito($idusuario)) {
            return true;
        } else {
            return false;
        }
    }

  // Consultar el carrito de un usuario
public function verCarritoPorUsuario($idusuario)
{
    $objCarrito = new Carrito();
    $arrayproductos = $objCarrito->obtenerCarritoPorUsuario($idusuario);

    return $arrayproductos;
}

    // Consultar el carrito de un usuario
    public function verTotalCarrito($idusuario)
    {
        $objCarrito = new Carrito();
        $total = $objCarrito->obtenerTotalCarrito($idusuario);

        return $total;
    }

       // Consultar el carrito de un usuario
       public function verCantidad($idusuario)
       {
           $objCarrito = new Carrito();
           $carrito = $objCarrito->obtenerCarritoPorUsuario($idusuario);
           if ($carrito != []){
           $cantidad = count($carrito);
           }else{
            $cantidad = 0;
           }

           return $cantidad;
       }


    public function manejarPeticion()
    {
        // Recibimos los datos JSON enviados desde AJAX
        $datos = json_decode(file_get_contents('php://input'), true);

        // Verificamos que la acción esté definida
        if (isset($datos['action'])) {
            switch ($datos['action']) {
                case 'agregar':
                    return $this->agregarAlCarrito(
                        $datos['idCarrito'],
                        $datos['usuarioId'],
                        $datos['productoId'],
                        $datos['cantidad']
                    );
                case 'eliminar':
                    return $this->eliminarDelCarrito(
                        $datos['usuarioId'],
                        $datos['productoId']
                    );
                default:
                    return json_encode(['success' => false, 'mensaje' => 'Acción no válida.']);
            }
        }
    }
    



    // Función para agregar un producto al carrito
    public function agregarAlCarrito($idCarrito, $idusuario, $idproducto, $cantidad)
    {
        // Verificar si el producto ya está en el carrito
        $productosEnCarrito = $this->objCarrito->obtenerCarritoPorUsuario($idusuario);

        foreach ($productosEnCarrito as $producto) {
            if ($producto['idproducto'] == $idproducto) {
                // Si el producto ya existe en el carrito, actualizamos la cantidad
                $this->actualizarCantidad($idCarrito, $idusuario, $idproducto, $producto['procantstock'] + $cantidad);
                return json_encode(['success' => true, 'mensaje' => 'Cantidad actualizada en el carrito.']);
            }
        }

        // Si el producto no está en el carrito, agregamos el nuevo producto
        $this->objCarrito->setear($idCarrito, $idusuario, $idproducto, $cantidad);
        if ($this->objCarrito->insertar()) {
            return json_encode(['success' => true, 'mensaje' => 'Producto agregado al carrito.']);
        } else {
            return json_encode(['success' => false, 'mensaje' => 'Error al agregar el producto al carrito.']);
        }
    }




    // Función para eliminar un producto del carrito
    public function eliminarDelCarrito($idusuario, $idproducto)
    {
        // Llamamos al método de la clase Carrito para eliminar el producto
        if ($this->objCarrito->eliminarProducto($idusuario, $idproducto)) {
            return json_encode(['success' => true, 'mensaje' => 'Producto eliminado del carrito.']);
        } else {
            return json_encode(['success' => false, 'mensaje' => 'Error al eliminar el producto del carrito.']);
        }
    }

    
    public function verificarProductoEnCarrito($idCarrito, $idUsuario, $idProducto) {
        $filtro = [
            'idCarrito' => $idCarrito,
            'idusuario' => $idUsuario,
            'idproducto' => $idProducto
        ];
        $carrito = $this->buscar($filtro); // Método del modelo que busca registros según el filtro
    
        return !empty($carrito) ? $carrito[0] : null; // Devuelve el primer elemento encontrado o null si no hay ninguno
    }
    



    public function buscar($param)
    {
        $where = " true ";
        if ($param <> null) {
            if (isset($param['idCarrito'])) {
                $where .= " and idCarrito ='" . $param['idCarrito'] . "'";
            }
            if (isset($param['idusuario'])) {
                $where .= " and idusuario ='" . $param['idusuario'] . "'";
            }
            if (isset($param['idproducto'])) {
                $where .= " and idproducto ='" . $param['idproducto'] . "'";
            }
        }

        $objCarrito = new Carrito();
        $arreglo = $objCarrito->listar($where);
        return $arreglo;
    }


// Función para actualizar la cantidad de un producto en el carrito
public function actualizarCantidad($idCarrito, $idusuario, $idproducto, $nuevaCantidad)
{
    // Establecer los nuevos valores en el carrito
    $this->objCarrito->setear($idCarrito, $idusuario, $idproducto, $nuevaCantidad);
    
    // Llamar al método actualizar() del modelo Carrito para guardar los cambios en la base de datos
    if ($this->objCarrito->actualizar()) {
        return json_encode(['success' => true, 'mensaje' => 'Cantidad actualizada en el carrito.']);
    } else {
        return json_encode(['success' => false, 'mensaje' => 'Error al actualizar la cantidad en el carrito.']);
    }
}

public function obtenerCarrito($idusuario){
    $objCarrito = new Carrito();
    $idCarrito = $objCarrito->obtenerCarritoId($idusuario);
    return $idCarrito;
}


public function idCarrito($idUsuario){
    $objCarrito = new Carrito();
    $nuevoCart = $objCarrito->nuevoCarrito($idUsuario);
    return $nuevoCart;
}

}

?>
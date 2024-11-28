<?php

class Carrito extends BaseDatos {
    private $idCarrito;
    private $idUsuario;
    private $fechaCreacion;
    private $idProducto;
    private $cantProductos;
    private $mensajeOperacion;

    // Constructor
    public function __construct($idCarrito = null, $idUsuario = null, $fechaCreacion = null, $idProducto = null, $cantProductos = null) {
        parent::__construct(); // Inicializa la conexión a la base de datos
        $this->idCarrito = $idCarrito;
        $this->idUsuario = $idUsuario;
        $this->fechaCreacion = $fechaCreacion;
        $this->idProducto = $idProducto;
        $this->cantProductos = $cantProductos;
    }

    // Métodos Get
    public function getIdCarrito() {
        return $this->idCarrito;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getCantProductos() {
        return $this->cantProductos;
    }

    public function setIdCarrito($idCart) {
        $this->idCarrito = $idCart;
    }
    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Inserta un producto en el carrito
    public function insertar() {
        $sql = "INSERT INTO carrito (idCarrito, idusuario, fechaCreacion, idproducto, cantproductos) 
                VALUES ('{$this->idCarrito}', '{$this->idUsuario}', NOW(), '{$this->idProducto}', '{$this->cantProductos}')";
        $id = $this->Ejecutar($sql);
        return $id > 0;
    }

    // Actualiza la cantidad de un producto en el carrito
    public function actualizar() {
        $sql = "UPDATE carrito 
                SET cantproductos = '{$this->cantProductos}' 
                WHERE idusuario = '{$this->idUsuario}' AND idproducto = '{$this->idProducto}'";
        $filasAfectadas = $this->Ejecutar($sql);
        return $filasAfectadas > 0;
    }

    // Elimina un producto del carrito
    public function eliminarProducto($idUsuario, $idProducto) {
        $sql = "DELETE FROM carrito 
                WHERE idusuario = '{$idUsuario}' AND idproducto = '{$idProducto}'";
        $filasAfectadas = $this->Ejecutar($sql);
        return $filasAfectadas > 0;
    }

    // Vacía el carrito de un usuario
    public function vaciarCarrito($idUsuario) {
        $sql = "DELETE FROM carrito WHERE idusuario = '{$idUsuario}'";
        $filasAfectadas = $this->Ejecutar($sql);
        return $filasAfectadas > 0;
    }

    // Obtiene los productos del carrito por usuario
    public function obtenerCarritoPorUsuario($idUsuario) {
        $sql = "SELECT idproducto, cantproductos FROM carrito WHERE idusuario = '{$idUsuario}'";
        $cantidad = $this->Ejecutar($sql);
        $productos = [];
        if ($cantidad > 0) {
            while ($registro = $this->Registro()) {
                $productos[] = $registro;
            }
        }
        return $productos;
    }

    // Calcula el total de productos en el carrito de un usuario
    public function obtenerTotalCarrito($idUsuario) {
        $sql = "SELECT SUM(cantproductos) as total FROM carrito WHERE idusuario = '{$idUsuario}'";
        $resultado = $this->Ejecutar($sql);
        $total = 0;
        if ($resultado) {
            $registro = $this->Registro(); // Asumiendo que Registro obtiene el resultado actual.
            $total = $registro['total'] !== null ? (int)$registro['total'] : 0;
        }
        return $total;
    }

    // Configura las propiedades del carrito
    public function setear($idCarrito, $idUsuario, $idProducto, $cantProductos) {
        $this->idCarrito = $idCarrito;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->cantProductos = $cantProductos;
    }

// Listar todos los productos o los que coincidan con el parámetro
public function listar($parametro = "") {
    $arreglo = array();
    $sql = "SELECT * FROM carrito";
    if ($parametro != "") {
        $sql .= " WHERE " . $parametro;
    }
    $res = $this->Ejecutar($sql);
    if ($res > -1) {
        if ($res > 0) {
            while ($row = $this->Registro()) {
                $obj = new Carrito();
                $obj->setear(
                    $row['idCarrito'],
                    $row['idusuario'],
                    $row['idproducto'],
                    $row['cantproductos'],
                );
                array_push($arreglo, $obj);
            }
        }
    } else {
        $this->setMensajeOperacion("carrito->listar: " . $this->getError());
    }
    return $arreglo;
}

public function obtenerCarritoId($idUsuario)
{
    if ($idUsuario) {
        // Si el usuario está logueado, buscar su carrito
        $sql = "SELECT idCarrito FROM carrito WHERE idusuario = '{$idUsuario}' LIMIT 1";
    }
    $res = $this->Ejecutar($sql);
    if ($res > 0) {
        $registro = $this->Registro();
        return $registro['idCarrito'];
    } else {
        return null;
    }
}

public function nuevoCarrito($idUsuario){
    $objCarrito = new Carrito();
    $cantCarritos = $objCarrito->contarCarritos();
    $nuevoIdCarrito = $cantCarritos + 1;
    $sql = "UPDATE carrito 
                SET idCarrito = '{$nuevoIdCarrito}' 
                WHERE idusuario = '{$idUsuario}'";
        $idAgregado = $this->Ejecutar($sql);
        return $nuevoIdCarrito;
}


public function contarCarritos() {
    // Consulta SQL para contar todos los carritos en la base de datos
    $sql = "SELECT COUNT(idCarrito) AS totalCarritos FROM carrito";

    // Ejecuta la consulta
    $res = $this->Ejecutar($sql);

    // Inicializa la variable para almacenar el total
    $totalCarritos = 0;

    // Si la consulta tuvo resultados, recupera el total
    if ($res > 0) {
        $registro = $this->Registro();
        $totalCarritos = $registro['totalCarritos'] ?? 0; // Si no hay resultados, se retorna 0
    }

    // Retorna el total de carritos
    return $totalCarritos;
}


}



?>
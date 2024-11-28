<?php

class Producto extends BaseDatos {
    private $idProducto;
    private $proNombre;
    private $proDetalle;
    private $proCantStock;
    private $precio;
    private $prodeshabilitado;
    private $imagen;
    private $mensajeOperacion;

    public function __construct() {
        parent::__construct();
        $this->idProducto = "";
        $this->proNombre = "";
        $this->proDetalle = "";
        $this->proCantStock = 0;
        $this->precio = 0.0;
        $this->prodeshabilitado = false;
        $this->imagen = "";
        $this->mensajeOperacion = "";
    }

    public function setearSinID($pronombre, $prodetalle, $procantstock, $precio, $prodeshabilitado, $imagen) {
        $this->proNombre = $pronombre;
        $this->proDetalle = $prodetalle;
        $this->proCantStock = $procantstock;
        $this->precio = $precio;
        $this->prodeshabilitado = $prodeshabilitado;
        $this->imagen = $imagen;
    }

    // Métodos de establecimiento (Setters)
    public function setear($idProducto, $proNombre, $proDetalle, $proCantStock, $precio, $prodeshabilitado, $imagen) {
        $this->setIdProducto($idProducto);
        $this->setProNombre($proNombre);
        $this->setProDetalle($proDetalle);
        $this->setProCantStock($proCantStock);
        $this->setPrecio($precio);
        $this->setProDeshabilitado($prodeshabilitado);
        $this->setImagen($imagen);
    }

    // Cargar datos desde la base de datos
    public function cargar() {
        $resp = false;
        $sql = "SELECT * FROM producto WHERE idproducto = '" . $this->getIdProducto() . "'";
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $this->Registro();
                    $this->setear(
                        $row['idproducto'],
                        $row['pronombre'],
                        $row['prodetalle'],
                        $row['procantstock'],
                        $row['precio'],
                        $row['prodeshabilitado'],
                        $row['imagen']
                    );
                }
            }
        } else {
            $this->setMensajeOperacion("producto->cargar: " . $this->getError());
        }
        return $resp;
    }

    // Insertar un nuevo producto
    public function insertar() {
        $resp = false;
        $sql = "INSERT INTO producto (pronombre, prodetalle, procantstock, precio, prodeshabilitado, imagen) 
                VALUES ('" . $this->getProNombre() . "', '" . $this->getProDetalle() . "', " . $this->getProCantStock() . ", " . $this->getPrecio() . ", " . ($this->getProDeshabilitado() ? 1 : 0) . ", '" . $this->getImagen() . "')";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("producto->insertar: " . $this->getError());
            }
        } else {
            $this->setMensajeOperacion("producto->insertar: " . $this->getError());
        }
        return $resp;
    }

    // Modificar los datos de un producto
    public function modificar() {
        $resp = false;
        $sql = "UPDATE producto SET pronombre = '" . $this->getProNombre() . "', 
                prodetalle = '" . $this->getProDetalle() . "', procantstock = " . $this->getProCantStock() . ",
                precio = " . $this->getPrecio() . ", prodeshabilitado = " . ($this->getProDeshabilitado() ? 1 : 0) . ", 
                imagen = '" . $this->getImagen() . "'
                WHERE idproducto = '" . $this->getIdProducto() . "'";

        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("producto->modificar: " . $this->getError());
            }
        } else {
            $this->setMensajeOperacion("producto->modificar: " . $this->getError());
        }
        return $resp;
    }

    // Eliminar un producto
    public function eliminar() {
        $resp = false;
        $sql = "DELETE FROM producto WHERE idproducto = '" . $this->getIdProducto() . "'";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("producto->eliminar: " . $this->getError());
            }
        } else {
            $this->setMensajeOperacion("producto->eliminar: " . $this->getError());
        }
        return $resp;
    }

    // Listar todos los productos o los que coincidan con el parámetro
    public function listar($parametro = "") {
        $arreglo = array();
        $sql = "SELECT * FROM producto";
        if ($parametro != "") {
            $sql .= " WHERE " . $parametro;
        }
        $res = $this->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $this->Registro()) {
                    $obj = new Producto();
                    $obj->setear(
                        $row['idproducto'],
                        $row['pronombre'],
                        $row['prodetalle'],
                        $row['procantstock'],
                        $row['precio'],
                        $row['prodeshabilitado'],
                        $row['imagen']
                    );
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("producto->listar: " . $this->getError());
        }
        return $arreglo;
    }


    public function buscarPorID($idProducto){
        $arreglo = []; // Inicializar el arreglo para almacenar los productos.
        
        // Usar un prepared statement para evitar inyecciones SQL
        $sql = "SELECT * FROM producto WHERE idproducto = $idProducto";
        $res = $this->Ejecutar($sql, [$idProducto]); // Asumiendo que 'Ejecutar' maneja parámetros de manera segura.
        
        if ($res) { // Verificamos si hay resultados.
            while ($row = $this->Registro()) { // Procesamos cada registro.
                $obj = new Producto();
                $obj->setear(
                    $row['idproducto'],
                    $row['pronombre'],
                    $row['prodetalle'],
                    $row['procantstock'],
                    $row['precio'],
                    $row['prodeshabilitado'],
                    $row['imagen']
                );
                array_push($arreglo, $obj); // Agregamos el producto al arreglo.
            }
        } else {
            return null; // Si no hay resultados, retornamos null.
        }
    
        return $arreglo; // Devolvemos el arreglo con los productos encontrados.
    }
    

    // Métodos getter y setter
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getProNombre() {
        return $this->proNombre;
    }

    public function setProNombre($proNombre) {
        $this->proNombre = $proNombre;
    }

    public function getProDetalle() {
        return $this->proDetalle;
    }

    public function setProDetalle($proDetalle) {
        $this->proDetalle = $proDetalle;
    }

    public function getProCantStock() {
        return $this->proCantStock;
    }

    public function setProCantStock($proCantStock) {
        $this->proCantStock = $proCantStock;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getProDeshabilitado() {
        return $this->prodeshabilitado;
    }

    public function setProDeshabilitado($prodeshabilitado) {
        $this->prodeshabilitado = $prodeshabilitado;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }
}

?>

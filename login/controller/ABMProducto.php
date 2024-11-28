<?php

class abmProducto
{
    public function abm($datos)
    {
        $resp = false;
        if ($datos['action'] == 'eliminar') {
            if ($this->baja($datos)) {
                $resp = true;
            }
        }
        if ($datos['action'] == 'modificar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['action'] == 'alta') {
            if ($this->alta($datos)) {
                $resp = true;
            }
        }
        return $resp;
    }

    private function cargarObjeto($param)
    {
        $obj = null;
        if (
            array_key_exists('idproducto', $param) &&
            array_key_exists('pronombre', $param) &&
            array_key_exists('prodetalle', $param) &&
            array_key_exists('procantstock', $param) &&
            array_key_exists('precio', $param) &&
            array_key_exists('prodeshabilitado', $param) &&
            array_key_exists('imagen', $param)
        ) {
            $obj = new producto();
            $obj->setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['precio'], $param['prodeshabilitado'], $param['imagen']);
        }
        return $obj;
    }

    private function cargarObjetoSinID($param)
    {
        $obj = null;
        if (
            array_key_exists('pronombre', $param) &&
            array_key_exists('prodetalle', $param) &&
            array_key_exists('procantstock', $param) &&
            array_key_exists('precio', $param) &&
            array_key_exists('prodeshabilitado', $param) &&
            array_key_exists('imagen', $param)
        ) {
            $obj = new producto();
            $obj->setearSinID($param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['precio'], $param['prodeshabilitado'], $param['imagen']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param)
    {
        $producto = null;
        if (isset($param['idproducto'])) {
            $producto = new producto();
            $producto->setear($param['idproducto'], null, null, null, null, null, null);
        }
        return $producto;
    }

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idproducto'])) {
            $resp = true;
        }
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $objProducto = $this->cargarObjeto($param);
        if ($objProducto != null and $objProducto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function altaSinID($param)
    {
        $resp = false;

        // Procesamos la imagen
        $imagenNombre = $this->cargarImagen('producto', $param['files']['imagen'], 'productos/');

        if ($imagenNombre) {
            $param['imagen'] = $imagenNombre;
            $param['prodeshabilitado'] = null;
            $objProducto = $this->cargarObjetoSinID($param);
            if ($objProducto != null and $objProducto->insertar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objProducto = $this->cargarObjetoConClave($param);
            $objProducto->cargar();
            // Eliminamos la imagen
            $this->eliminarImagen($objProducto->getImagen(), 'productos/');
            if ($objProducto != null and $objProducto->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objProducto = $this->cargarObjeto($param);
            if ($objProducto != null and $objProducto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    // Modificación de imagen de producto
    public function modificarImagen($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objProducto = $this->cargarObjetoConClave($param);
            $objProducto->cargar();
            // Primero eliminamos la imagen antigua
            $this->eliminarImagen($param['url'], 'productos/');
            // Cargamos la nueva imagen
            $imagenNombre = $this->cargarImagen('producto', $param['files']['imagen'], 'productos/');
            if ($imagenNombre) {
                $objProducto->setImagen($imagenNombre);
                if ($objProducto != null and $objProducto->modificar()) {
                    $resp = true;
                }
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = "";
        if ($param <> null) {
            if (isset($param['idproducto'])) {
                $where .= "idproducto ='" . $param['idproducto'] . "'";
            }
        }

        $objProducto = new producto();
        $arreglo = $objProducto->listar($where);
        return $arreglo;
    }

    public function buscarConStock()
    {
        $arreglo = [];
        $objProducto = new producto();
        $arreglo = $objProducto->listar('procantstock > 0');
        return $arreglo;
    }

    // Deshabilitar producto
    public function deshabilitarProducto($datos)
    {
        $resp = false;
        if (!empty($datos)) {
            $objPro = $this->buscar(['idproducto' => $datos['idproducto']]);
            $fecha = null;
            if ($datos['accion'] == "deshabilitar") {
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $fecha = date('Y-m-d H:i:s');
            }

            $objPro[0]->setProDeshabilitado($fecha);
            if ($objPro[0]->modificar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    // Listar productos con información
    public function listarProductos($datos)
    {
        $arreglo = [];
        $list = $this->buscar($datos);
        if (count($list) > 0) {
            foreach ($list as $elem) {
                $nuevoElem = [
                    "idproducto" => $elem->getIdProducto(),
                    "pronombre" => $elem->getProNombre(),
                    "prodetalle" => $elem->getProDetalle(),
                    "procantstock" => $elem->getProCantStock(),
                    "precio" => $elem->getPrecio(),
                    "deshabilitado" => $elem->getProDeshabilitado(),
                    "imagen" => $elem->getImagen()
                ];
                array_push($arreglo, $nuevoElem);
            }
        }

        return $arreglo;
    }

    // Listar productos disponibles para la tienda
    public function listarProdTienda()
    {
        $arreglo_salida = [];
        $abmSession = new Session();
        $listaProductos = $this->buscarConStock();
        $rolActivo = $abmSession->getRol();

        if (count($listaProductos) > 0) {
            foreach ($listaProductos as $producto) {
                // Para cada producto, me fijo que no esté deshabilitado
                if ($producto->getProDeshabilitado() == null || $producto->getProDeshabilitado() == '0000-00-00 00:00:00') {
                    $nuevoElem = [
                        "idproducto" => $producto->getID(),
                        "imagen" => $producto->getImagen(),
                        "pronombre" => $producto->getProNombre(),
                        "prodetalle" => $producto->getProDetalle(),
                        "procantstock" => $producto->getProCantStock(),
                        "precio" => $producto->getPrecio(),
                    ];
                    array_push($arreglo_salida, $nuevoElem);
                }
            }
        }
        return $arreglo_salida;
    }

    // Función para cargar la imagen
    private function cargarImagen($tipo, $imagen, $ruta)
    {
        $nombreArchivo = uniqid() . '_' . $imagen['name'];
        $rutaDestino = $ruta . $nombreArchivo;
        if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
            return $nombreArchivo;
        }
        return false;
    }

    // Función para eliminar una imagen
    private function eliminarImagen($nombreImagen, $ruta)
    {
        $rutaArchivo = $ruta . $nombreImagen;
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo);
        }
    }

    public function obtenerProducto($idProducto){
        $objProducto = new Producto();
        $arrayProducto = $objProducto->buscarPorID($idProducto);

        // Si no se encuentra el producto, podrías retornar null o lanzar una excepción
        if ($arrayProducto === null || empty($arrayProducto)) {
            return null; // O podrías manejar el error de manera diferente, por ejemplo, lanzando una excepción.
        }
    
        // Si buscas un solo producto, puedes retornar el primer elemento del arreglo
        return $arrayProducto[0]; // Retorna el primer producto, ya que el ID es único.
    }

}
?>

<?php

class Usuario extends BaseDatos
{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;

    private $mensajeoperacion;

    public function __construct()
    {
        parent::__construct();
        $this->idusuario = "";
        $this->usnombre = "";
        $this->uspass = "";
        $this->usmail = "";
        $this->usdeshabilitado = "";
        $this->mensajeoperacion = "";

    }
    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado)
    {
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setuspass($uspass);
        $this->setusmail($usmail);

        if ($usdeshabilitado = '0000-00-00 00:00:00') {
            $usdeshabilitado = null;
        }

        $this->setusdeshabilitado($usdeshabilitado);
    }

    public function getidusuario()
    {return $this->idusuario;}

    public function setidusuario($idusuario)
    {$this->idusuario = $idusuario;}

    public function getusnombre()
    {return $this->usnombre;}

    public function setusnombre($usnombre)
    {$this->usnombre = $usnombre;}

    public function getuspass()
    {return $this->uspass;}

    public function setuspass($uspass)
    {$this->uspass = $uspass;}

    public function getusmail()
    {return $this->usmail;}

    public function setusmail($usmail)
    {$this->usmail = $usmail;}

    public function getusdeshabilitado()
    {return $this->usdeshabilitado;}

    public function setusdeshabilitado($usdeshabilitado)
    {$this->usdeshabilitado = $usdeshabilitado;}

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;

    }
    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;

    }

    public function cargar()
    {
        $resp = false;
        $sql = "SELECT * FROM usuarios WHERE id = " . $this->getidusuario();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $this->Registro();
                    $this->setear($row['id'], $row['nombreUsuario'], $row['password'], $row['email'], $row['usDeshabilitado']);

                }
            }
        } else {
            $this->setmensajeoperacion("usuarios->listar: " . $this->getError());
        }
        return $resp;

    }


    
    //insertar funciona
    public function insertar()
    {
        $resp = false;
        $sql = "INSERT INTO usuarios(nombreUsuario,password,email,usDeshabilitado)
            VALUES('" . $this->getusnombre() . "','" . $this->getuspass() . "','" . $this->getusmail() . "'," . ($this->getusdeshabilitado() === null ? 'NULL' : "'" . $this->getusdeshabilitado() . "'") . ");";
          


        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setidusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuarios->insertar: " . $this->getError());
                echo "Error al insertar: " . $this->getmensajeoperacion(); // Para depuración
            }
        } else {
            $this->setmensajeoperacion("usuarios->insertar: " . $this->getError());
            echo "Error al iniciar conexión: " . $this->getmensajeoperacion(); // Para depuración
        }
        return $resp;

        
    }



    //MODIFICAR VARIABLES
    public function modificar()
    {
        $resp = false;
        $sql = "UPDATE usuarios SET nombreUsuario='" . $this->getusnombre() . "' ,uspass='" . $this->getuspass() . "',usmail='" . $this->getusmail() . "' ,usdeshabilitado='" . $this->getusdeshabilitado() . "'  " .
        " WHERE idusuario=" . $this->getidusuario();
        if ($this->Iniciar()) {
            echo $sql;
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Especie->modificar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Especie->modificar: " . $this->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $sql = "DELETE FROM usuarios WHERE idusuario=" . $this->getidusuario();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuarios->eliminar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("usuarios->eliminar: " . $this->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $sql = "SELECT * FROM usuarios ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }

        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    while ($row = $this->Registro()) {
                        $obj = new Usuario();
                        $obj->setidusuario($row['id']);
                        $obj->cargar();
                        array_push($arreglo, $obj);
                    }
                }
            } else {
                $this->setmensajeoperacion("usuarios->listar: " . $this->getError());
            }
        }
        return $arreglo;
    }

}

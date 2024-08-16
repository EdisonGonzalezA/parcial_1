<?php
//TODO: Clase de Provedores
require_once('../config/config.php');

class Provedores
{

    //TODO: Implementar los metodos de la clase

    public function todos() //select * from provedores
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($provedores_id) //select * from provedores where id = $idProvedor
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores` WHERE `provedores_id`= $provedores_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre_empresa, $direccion, $telefono) //insert into provedores values($datos)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `proveedores`(`nombre_empresa`, `direccion`, `telefono`) VALUES ('$nombre_empresa','$direccion','$telefono')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($provedores_id, $nombre_empresa, $direccion, $telefono) //update provedores set $datos where id = $idProvedor
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `proveedores` SET `nombre_empresa`='$nombre_empresa',`direccion`='$direccion',`telefono`='$telefono WHERE `provedores_id`= $provedores_id";
            if (mysqli_query($con, $cadena)) {
                return $provedores_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($provedores_id) //delete from provedores where id = $idProvedor
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `proveedores` WHERE `provedores_id`= $provedores_id";
            if (mysqli_query($con, $cadena)) {
                return "ok";
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}

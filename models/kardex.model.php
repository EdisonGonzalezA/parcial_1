<?php
//TODO: Clase de Kardex
require_once('../config/config.php');

class Kardex
{

    //TODO: Implementar los metodos de la clase

    public function todos() //select * from kardex
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `kardex`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($kardex_id) //select * from kardex where id = $idKardex
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `kardex` WHERE `kardex_id`= $kardex_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $valor_ganacia, $IVA, $proveedores_proveedores_id, $productos_productos_id, $tipo_transaccion, $IVA_IVA_id) //insert into kardex values($datos)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `kardex`(`estado`, `fecha_transaccion`, `cantidad`, `valor_compra`, `valor_venta`, `valor_ganacia`, `IVA`, `proveedores_proveedores_id`, `productos_productos_id`, `tipo_transaccion`, `IVA_IVA_id`) VALUES ('$estado','$fecha_transaccion','$cantidad','$valor_compra','$valor_venta','$valor_ganacia','$IVA','$proveedores_proveedores_id','$productos_productos_id','$tipo_transaccion','$IVA_IVA_id')";
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

    public function actualizar($kardex_id, $estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $valor_ganacia, $IVA, $proveedores_proveedores_id, $productos_productos_id, $tipo_transaccion, $IVA_IVA_id) //update kardex set $datos where id = $idKardex
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `kardex` SET `estado`='$estado',`fecha_transaccion`='$fecha_transaccion',`cantidad`='$cantidad',`valor_compra`='$valor_compra',`valor_venta`='$valor_venta',`valor_ganacia`='$valor_ganacia',`IVA`='$IVA',`proveedores_proveedores_id`='$proveedores_proveedores_id',`productos_productos_id`='$productos_productos_id',`tipo_transaccion`='$tipo_transaccion',`IVA_IVA_id`='$IVA_IVA_id' WHERE `kardex_id`= $kardex_id";
            if (mysqli_query($con, $cadena)) {
                return $kardex_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($kardex_id) //delete from kardex where id = $idKardex
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `kardex` WHERE `kardex_id`= $kardex_id";
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

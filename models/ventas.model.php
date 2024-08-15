<?php
    //TODO: Clase de ventas
    require_once('../config/config.php');

    class Ventas{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from ventas
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `ventas`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($venta_id) //select * from ventas where id = $venta_id
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `ventas` WHERE `venta_id`= venta_id";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($fecha_venta, $total_venta, $Clientes_cliente_id, $Factura_factura_id) //insert into ventas values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `ventas`(`fecha_venta`, `total_venta`,`Clientes_cliente_id`, `Factura_factura_id`) VALUES ('$fecha_venta','$total_venta','$Clientes_cliente_id','$Factura_factura_id')";
                if(mysqli_query($con, $cadena)){
                return $con->insert_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function actualizar($venta_id, $fecha_venta, $total_venta, $Clientes_cliente_id, $Factura_factura_id) //update ventas set $datos where id = $venta_id
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `ventas` SET `fecha_venta`='$fecha_venta',`total_venta`='$total_venta',`Clientes_cliente_id`='$Clientes_cliente_id',`Factura_factura_id`='$Factura_factura_id' WHERE `venta_id`= $venta_id";
                if(mysqli_query($con, $cadena)){
                return $venta_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($venta_id) //delete from ventas where id = $venta_id
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `ventas` WHERE `venta_id`= $venta_id";
                if(mysqli_query($con, $cadena)){
                return "ok";
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }
    }
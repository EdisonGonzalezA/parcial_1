<?php
    //TODO: Clase de Factura
    require_once('../config/config.php');

    class Factura{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from factura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `factura`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($factura_id) //select * from factura where id = $idFactura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `factura` WHERE `factura_id`= factura_id";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($fecha, $sub_total, $sub_total_iva, $valor_IVA, $Clientes_cliente_id) //insert into factura values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `factura`(`fecha`, `sub_total`, `sub_total_iva`, `valor_IVA`, `Clientes_cliente_id`) VALUES ('$fecha','$sub_total','$sub_total_iva','$valor_IVA','$Clientes_cliente_id')";
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

        public function actualizar($factura_id, $fecha, $sub_total, $sub_total_iva, $valor_IVA, $Clientes_cliente_id) //update factura set $datos where id = $idFactura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `factura` SET `fecha`='$fecha',`sub_total`='$sub_total',`sub_total_iva`='$sub_total_iva',`valor_IVA`='$valor_IVA',`Clientes_cliente_id`='$Clientes_cliente_id' WHERE `factura_id`= $factura_id";
                if(mysqli_query($con, $cadena)){
                return $factura_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($factura_id) //delete from factura where id = $idFactura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `factura` WHERE `factura_id`= $factura_id";
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
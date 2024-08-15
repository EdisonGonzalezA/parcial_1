<?php
    //TODO: Clase de detalle_factura
    require_once('../config/config.php');

    class Detalle_factura{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from detalle_factura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `detalle_factura`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($detalle_factura_id) //select * from detalle_factura where id = $idDetalle_Factura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `detalle_factura` WHERE `detalle_factura_id`= detalle_factura_id";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($cantidad, $factura_factura_id, $kardex_kardex_id, $precio_unitario, $sub_total_item) //insert into detalle_factura values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `detalle_factura`(`cantidad`, `factura_factura_id`, `kardex_kardex_id`, `precio_unitario`, `sub_total_item`) VALUES ('$cantidad','$factura_factura_id','$kardex_kardex_id','$precio_unitario','$sub_total_item')";
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

        public function actualizar($detalle_factura_id, $cantidad, $factura_factura_id, $kardex_kardex_id, $precio_unitario, $sub_total_item) //update detalle_factura set $datos where id = $idDetalle_Factura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `detalle_factura` SET `cantidad`='$cantidad',`factura_factura_id`='$factura_factura_id',`kardex_kardex_id`='$kardex_kardex_id',`precio_unitario`='$precio_unitario',`sub_total_item`='$sub_total_item' WHERE `detalle_factura_id`= $detalle_factura_id";
                if(mysqli_query($con, $cadena)){
                return $detalle_factura_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($detalle_factura_id) //delete from detalle_factura where id = $idDetalle_Factura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `detalle_factura` WHERE `detalle_factura_id`= $detalle_factura_id";
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
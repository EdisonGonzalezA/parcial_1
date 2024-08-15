<?php
    //TODO: Clase de IVA
    require_once('../config/config.php');

    class IVA{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from IVA
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `iva`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($IVA_id) //select * from IVA where id = $idIVA
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `iva` WHERE `IVA_id`= IVA_id";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($Detalle, $Estado, $Valor) //insert into IVA values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `iva`(`detalle`, `estado`, `Valor`) VALUES ('$Detalle','$Estado','$Valor')";
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

        public function actualizar($IVA_id, $detalle, $estado, $Valor) //update IVA set $datos where id = $idIVA
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `iva` SET `detalle`='$detalle',`estado`='$estado',`Valor`='$Valor' WHERE `IVA_id`= $IVA_id";
                if(mysqli_query($con, $cadena)){
                return $IVA_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($IVA_id) //delete from IVA where id = $idIVA
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `iva` WHERE `IVA_id`= $IVA_id";
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
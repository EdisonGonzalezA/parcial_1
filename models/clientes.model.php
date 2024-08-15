<?php
    //TODO: Clase de Clientes
    require_once('../config/config.php');

    class Clientes{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from cliente
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `clientes`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($idCliente) //select * from cliente where id = $idCliente
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `clientes` WHERE `cliente_id`= cliente_id";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($nombre, $apellido, $email, $telefono, $direccion) //insert into cliente values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `clientes`(`nombre`, `apellido`, `email`, `telefono`, `direccion`) VALUES ('$nombre','$apellido','$email','$telefono','$direccion')";
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

        public function actualizar($cliente_id, $nombre, $apellido, $email, $telefono, $direccion) //update cliente set $datos where id = $idCliente
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `clientes` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`telefono`='$telefono',`direccion`='$direccion' WHERE `cliente_id`= $cliente_id";
                if(mysqli_query($con, $cadena)){
                return $cliente_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($cliente_id) //delete from cliente where id = $idCliente
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `clientes` WHERE `cliente_id`= $cliente_id";
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
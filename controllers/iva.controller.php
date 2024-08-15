<?php
//TODO: Controlador de IVA

require_once('../models/iva.model.php');
error_reporting(0);
$iva = new iva;

switch ($_GET["op"]) {
//TODO: Operaciones de IVA

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los IVA
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase iva.model.php
        $datos = $iva->todos(); // LLamo al metodo todos de la clase iva.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $IVA_id = $_POST["IVA_id"];
        $datos = array();
        $datos = $iva->uno($IVA_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un IVA en la base de datos
    case 'insertar':
        $detalle = $_POST["detalle"];
        $estado = $_POST["estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->insertar($detalle, $estado, $Valor);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un IVA en la base de datos
    case 'actualizar':
        $IVA_id = $_POST["IVA_id"];
        $detalle = $_POST["detalle"];
        $estado = $_POST["estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->actualizar($IVA_id, $detalle, $estado, $Valor);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un IVA en la base de datos
    case 'eliminar':
        $IVA_id = $_POST["IVA_id"];
        $datos = array();
        $datos = $iva->eliminar($IVA_id);
        echo json_encode($datos);
        break;
}
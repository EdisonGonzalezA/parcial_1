<?php
//TODO: Controlador de Factura

require_once('../models/factura.model.php');
error_reporting(0);
$factura = new Factura;

switch ($_GET["op"]) {
//TODO: Operaciones de factura

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los factura
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase factura.model.php
        $datos = $factura->todos(); // LLamo al metodo todos de la clase factura.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $factura_id = $_POST["factura_id"];
        $datos = array();
        $datos = $factura->uno($factura_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un factura en la base de datos
    case 'insertar':
        $fecha = $_POST["fecha"];
        $sub_total = $_POST["sub_total"];
        $sub_total_iva = $_POST["sub_total_iva"];
        $valor_IVA = $_POST["valor_IVA"];
        $Clientes_cliente_id = $_POST["Clientes_cliente_id"];
        $datos = array();
        $datos = $factura->insertar($fecha, $sub_total, $sub_total_iva, $valor_IVA, $Clientes_cliente_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un factura en la base de datos
    case 'actualizar':
        $factura_id = $_POST["factura_id"];
        $fecha = $_POST["fecha"];
        $sub_total = $_POST["sub_total"];
        $sub_total_iva = $_POST["sub_total_iva"];
        $valor_IVA = $_POST["valor_IVA"];
        $Clientes_cliente_id = $_POST["Clientes_cliente_id"];
        $datos = array();
        $datos = $factura->actualizar($factura_id, $fecha, $sub_total, $sub_total_iva, $valor_IVA, $Clientes_cliente_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un factura en la base de datos
    case 'eliminar':
        $factura_id = $_POST["factura_id"];
        $datos = array();
        $datos = $factura->eliminar($factura_id);
        echo json_encode($datos);
        break;
}
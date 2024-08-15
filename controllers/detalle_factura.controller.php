<?php
//TODO: Controlador de Detalle_factura

require_once('../models/detalle_factura.model.php');
error_reporting(0);
$detalle_factura = new detalle_factura;

switch ($_GET["op"]) {
//TODO: Operaciones de detalle_factura

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los detalle_factura
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase detalle_factura.model.php
        $datos = $detalle_factura->todos(); // LLamo al metodo todos de la clase detalle_factura.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $detalle_factura_id = $_POST["detalle_factura_id"];
        $datos = array();
        $datos = $detalle_factura->uno($detalle_factura_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un detalle_factura en la base de datos
    case 'insertar':
        $cantidad = $_POST["cantidad"];
        $factura_factura_id = $_POST["factura_factura_id"];
        $kardex_kardex_id = $_POST["kardex_kardex_id"];
        $precio_unitario = $_POST["precio_unitario"];
        $sub_total_item = $_POST["sub_total_item"];
        $datos = array();
        $datos = $detalle_factura->insertar($cantidad, $factura_factura_id, $kardex_kardex_id, $precio_unitario, $sub_total_item);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un detalle_factura en la base de datos
    case 'actualizar':
        $detalle_factura_id = $_POST["detalle_factura_id"];
        $cantidad = $_POST["cantidad"];
        $factura_factura_id = $_POST["factura_factura_id"];
        $kardex_kardex_id = $_POST["kardex_kardex_id"];
        $precio_unitario = $_POST["precio_unitario"];
        $sub_total_item = $_POST["sub_total_item"];
        $datos = array();
        $datos = $detalle_factura->actualizar($detalle_factura_id, $cantidad, $factura_factura_id, $kardex_kardex_id, $precio_unitario, $sub_total_item);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un detalle_factura en la base de datos
    case 'eliminar':
        $detalle_factura_id = $_POST["detalle_factura_id"];
        $datos = array();
        $datos = $detalle_factura->eliminar($detalle_factura_id);
        echo json_encode($datos);
        break;
}
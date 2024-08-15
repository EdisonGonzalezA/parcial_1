<?php
//TODO: Controlador de ventas

require_once('../models/ventas.model.php');
error_reporting(0);
$ventas = new Ventas;

switch ($_GET["op"]) {
//TODO: Operaciones de ventas

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los ventas
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase ventas.model.php
        $datos = $ventas->todos(); // LLamo al metodo todos de la clase ventas.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $venta_id = $_POST["venta_id"];
        $datos = array();
        $datos = $ventas->uno($venta_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un ventas en la base de datos
    case 'insertar':
        $fecha_venta = $_POST["fecha_venta"];
        $total_venta = $_POST["total_venta"];
        $Clientes_cliente_id = $_POST["Clientes_cliente_id"];
        $Factura_factura_id = $_POST["Factura_factura_id"];
        $datos = array();
        $datos = $ventas->insertar($fecha_venta, $total_venta, $Clientes_cliente_id, $Factura_factura_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un ventas en la base de datos
    case 'actualizar':
        $venta_id = $_POST["venta_id"];
        $fecha_venta = $_POST["fecha_venta"];
        $total_venta = $_POST["total_venta"];
        $Clientes_cliente_id = $_POST["Clientes_cliente_id"];
        $Factura_factura_id = $_POST["Factura_factura_id"];
        $datos = array();
        $datos = $ventas->actualizar($venta_id, $fecha_venta, $total_venta, $Clientes_cliente_id, $Factura_factura_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un ventas en la base de datos
    case 'eliminar':
        $venta_id = $_POST["venta_id"];
        $datos = array();
        $datos = $ventas->eliminar($venta_id);
        echo json_encode($datos);
        break;
}
<?php
//TODO: Controlador de Kardex

require_once('../models/kardex.model.php');
error_reporting(0);
$kardex = new Kardex;

switch ($_GET["op"]) {
//TODO: Operaciones de kardex

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los kardex
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase kardex.model.php
        $datos = $kardex->todos(); // LLamo al metodo todos de la clase kardex.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $kardex_id = $_POST["kardex_id"];
        $datos = array();
        $datos = $kardex->uno($kardex_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un kardex en la base de datos
    case 'insertar':
        $estado = $_POST["estado"];
        $fecha_transaccion = $_POST["fecha_transaccion"];
        $cantidad = $_POST["cantidad"];
        $valor_compra = $_POST["valor_compra"];
        $valor_venta = $_POST["valor_venta"];
        $valor_ganacia = $_POST["valor_ganacia"];
        $IVA = $_POST["IVA"];
        $proveedores_proveedores_id = $_POST["proveedores_proveedores_id"];
        $productos_productos_id = $_POST["productos_productos_id"];
        $tipo_transaccion = $_POST["tipo_transaccion"];
        $IVA_IVA_id = $_POST["IVA_IVA_id"];
        $datos = array();
        $datos = $kardex->insertar($estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $valor_ganacia, $IVA, $proveedores_proveedores_id, $productos_productos_id, $tipo_transaccion, $IVA_IVA_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un kardex en la base de datos
    case 'actualizar':
        $kardex_id = $_POST["kardex_id"];
        $estado = $_POST["estado"];
        $fecha_transaccion = $_POST["fecha_transaccion"];
        $cantidad = $_POST["cantidad"];
        $valor_compra = $_POST["valor_compra"];
        $valor_venta = $_POST["valor_venta"];
        $valor_ganacia = $_POST["valor_ganacia"];
        $IVA = $_POST["IVA"];
        $proveedores_proveedores_id = $_POST["proveedores_proveedores_id"];
        $productos_productos_id = $_POST["productos_productos_id"];
        $tipo_transaccion = $_POST["tipo_transaccion"];
        $IVA_IVA_id = $_POST["IVA_IVA_id"];
        $datos = array();
        $datos = $kardex->actualizar($kardex_id, $estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $valor_ganacia, $IVA, $proveedores_proveedores_id, $productos_productos_id, $tipo_transaccion, $IVA_IVA_id);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un kardex en la base de datos
    case 'eliminar':
        $kardex_id = $_POST["kardex_id"];
        $datos = array();
        $datos = $kardex->eliminar($kardex_id);
        echo json_encode($datos);
        break;
}
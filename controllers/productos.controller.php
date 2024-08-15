<?php
//TODO: Controlador de productos

require_once('../models/productos.model.php');
error_reporting(0);
$productos = new Productos;

switch ($_GET["op"]) {
//TODO: Operaciones de productos

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los productos
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase productos.model.php
        $datos = $productos->todos(); // LLamo al metodo todos de la clase productos.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $productos_id = $_POST["productos_id"];
        $datos = array();
        $datos = $productos->uno($productos_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un productos en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $datos = array();
        $datos = $productos->insertar($nombre, $descripcion, $precio, $stock);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un productos en la base de datos
    case 'actualizar':
        $productos_id = $_POST["productos_id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $datos = array();
        $datos = $productos->actualizar($productos_id, $nombre, $descripcion, $precio, $stock);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un productos en la base de datos
    case 'eliminar':
        $productos_id = $_POST["productos_id"];
        $datos = array();
        $datos = $productos->eliminar($productos_id);
        echo json_encode($datos);
        break;
}
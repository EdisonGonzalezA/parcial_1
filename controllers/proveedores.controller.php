<?php
//TODO: Controlador de Provedores

require_once('../models/proveedores.model.php');
error_reporting(0);
$proveedores = new Provedores;

switch ($_GET["op"]) {
//TODO: Operaciones de provedores

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los provedores
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $proveedores->todos(); // LLamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $provedores_id = $_POST["provedores_id"];
        $datos = array();
        $datos = $proveedores->uno($provedores_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un provedor en la base de datos
    case 'insertar':
        $nombre_empresa = $_POST["nombre_empresa"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $proveedores->insertar($nombre_empresa, $direccion, $telefono);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un provedor en la base de datos
    case 'actualizar':
        $provedores_id = $_POST["provedores_id"];
        $nombre_empresa = $_POST["nombre_empresa"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $proveedores->actualizar($provedores_id, $nombre_empresa, $direccion, $telefono);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un provedor en la base de datos
    case 'eliminar':
        $provedores_id = $_POST["provedores_id"];
        $datos = array();
        $datos = $proveedores->eliminar($provedores_id);
        echo json_encode($datos);
        break;
}
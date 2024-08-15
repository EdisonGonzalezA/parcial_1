<?php
//TODO: Controlador de Clientes

require_once('../models/clientes.model.php');
//error_reporting(0);
$clientes = new Clientes;

switch ($_GET["op"]) {
//TODO: Operaciones de clientes

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los cliente
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase cliente.model.php
        $datos = $clientes->todos(); // LLamo al metodo todos de la clase cliente.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $cliente_id = $_POST["cliente_id"];
        $datos = array();
        $datos = $clientes->uno($cliente_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un cliente en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $datos = array();
        $datos = $clientes->insertar($nombre, $apellido, $email, $telefono, $direccion);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un cliente en la base de datos
    case 'actualizar':
        $cliente_id = $_POST["cliente_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $datos = array();
        $datos = $clientes->actualizar($cliente_id, $nombre, $apellido, $email, $telefono, $direccion);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un cliente en la base de datos
    case 'eliminar':
        $cliente_id = $_POST["cliente_id"];
        $datos = array();
        $datos = $clientes->eliminar($cliente_id);
        echo json_encode($datos);
        break;
}
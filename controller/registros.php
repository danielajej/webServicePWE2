<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Registros.php");
$registros = new Registros();

$body = json_decode(file_get_contents("php://input"), true);


switch ($_GET["opcion"]) {

    case "GetAll":
        $datos = $registros->get_registros();
        echo json_encode($datos);
        break;

    case "GetId":
        $datos = $registros->get_registros_x_id($body["id"]);
        echo json_encode($datos);
        break;

    case "Insert":
        $datos = $registros->insert_registro($body["nombre"], $body["edad"], $body["fechaN"]);
        echo json_encode($datos);
        break;

    case "Update":
        $datos = $registros->update_registro($body["nombre"], $body["edad"], $body["fechaN"], $body["id"] );
        echo json_encode($datos);
        break;

    case "Delete":
        $datos = $registros->delete_registro($body["id"]);
        echo json_encode($datos);
        break;

    case "Tarjeta":
        
}

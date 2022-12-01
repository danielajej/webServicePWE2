<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Menu.php");
$menu = new Menu();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["opcion"]) {

    case "GetAll":
        $datos = $menu->get_menu();
        echo json_encode($datos);
        break;

    case "GetPollo":
        $datos = $menu->get_pollo();
        echo json_encode($datos);
        break;

    case "Get50":
        $datos = $menu->get_50();
        echo json_encode($datos);
        break;

    case "GetSinCarne":
        $datos = $menu->get_sin_carne();
        echo json_encode($datos);
        break;

    case "GetId":
        $datos = $menu->get_menu_x_id($body["id"]);
        echo json_encode($datos);
        break;

    case "Insert":
        $datos = $menu->insert_menu($body["nombre"], $body["descripcion"], $body["precio"]);
        echo json_encode($datos);
        break;

    case "Update":
        $datos = $menu->update_menu($body["nombre"], $body["descripcion"], $body["precio"], $body["id"] );
        echo json_encode($datos);
        break;

    case "Delete":
        $datos = $menu->delete_menu($body["id"]);
        echo json_encode($datos);
        break;

    case "UpdateEliminado":
        $datos = $menu->update_menueliminado($body["id"] );
        echo json_encode($datos);
        break;

    case "GetAllEliminado":
        $datos = $menu->get_menuEliminados();
        echo json_encode($datos);
        break;

    case "GetUsuario":
        $datos = $menu->get_usuario($body["email"], $body["password"]);
        echo json_encode($datos);
        break;

        case "GetClientes":
            $datos = $menu->get_clientes();
            echo json_encode($datos);
            break;
}

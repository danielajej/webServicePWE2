<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Futbolistas.php");
$futbolistas = new Futbolistas();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["opcion"]) {

    case "GetArbitros":
        $datos = $futbolistas->get_arbitros();
        echo json_encode($datos);
        break;
        
    case "GetPartidos":
        $datos = $futbolistas->get_partidos();
        echo json_encode($datos);
        break;

    case "GetEquipos":
        $datos = $futbolistas->get_equipos();
        echo json_encode($datos);
        break;

    case "GetJugadores":
        $datos = $futbolistas->get_jugadores();
        echo json_encode($datos);
        break;

    case "GetTorneos":
        $datos = $futbolistas->get_torneos();
        echo json_encode($datos);
        break;

    case "GetFechas":
        $datos = $futbolistas->get_fechas();
        echo json_encode($datos);
        break;


    /* case "GetId":
        $datos = $futbolistas->get_menu_x_id($body["id"]);
        echo json_encode($datos);
        break; */

    case "GetIdE":
        $datos = $futbolistas->get_equipos_x_id($body["id"]);
        echo json_encode($datos);
        break;

    case "GetIdJ":
        $datos = $futbolistas->get_jugadores_x_id($body["id"]);
        echo json_encode($datos);
        break;
    case "GetIdA":
        $datos = $futbolistas->get_arbitros_x_id($body["id"]);
        echo json_encode($datos);
        break;
    case "GetIdT":
        $datos = $futbolistas->get_torneos_x_id($body["id"]);
        echo json_encode($datos);
        break;

    /* case "Insert":
        $datos = $futbolistas->insert_menu($body["nombre"], $body["descripcion"], $body["precio"]);
        echo json_encode($datos);
        break; */

    case "InsertT":
        $datos = $futbolistas->insert_torneos($body["nombre"], $body["fechaI"], $body["fechaF"]);
        echo json_encode($datos);
        break;
    case "InsertE":
        $datos = $futbolistas->insert_equipos($body["nombre"], $body["logo"]);
        echo json_encode($datos);
        break;
    case "InsertA":
        $datos = $futbolistas->insert_arbitros($body["nombre"], $body["apellidos"], $body["contacto"], $body["email"], $body["fechaN"], $body["colocacion"]);
        echo json_encode($datos);
        break;
    case "InsertJ":
        $datos = $futbolistas->insert_jugadores($body["nombre"], $body["apellidos"], $body["fecha"]);
        echo json_encode($datos);
        break;
//////UPDATES
    case "Update":
        $datos = $futbolistas->update_menu($body["nombre"], $body["descripcion"], $body["precio"], $body["id"] );
        echo json_encode($datos);
        break;
    case "UpdateE":
        $datos = $futbolistas->update_equipos($body["nombre"], $body["logo"], $body["id"] );
        echo json_encode($datos);
        break;
    case "UpdateA":
        $datos = $futbolistas->update_arbitro($body["nombre"], $body["apellidos"], $body["contacto"], $body["email"], $body["fechaN"], $body["colocacion"], $body["id"] );
        echo json_encode($datos);
        break;
    case "UpdateT":
        $datos = $futbolistas->update_torneos($body["nombre"], $body["fechaI"], $body["fechaF"], $body["id"] );
        echo json_encode($datos);
        break;

    case "UpdateJ":
        $datos = $futbolistas->update_jugadores($body["nombre"], $body["apellidos"], $body["fecha"], $body["id"] );
        echo json_encode($datos);
        break;
/////////DELETES
    case "DeleteJ":
        $datos = $futbolistas->delete_jugadores($body["id"]);
        echo json_encode($datos);
        break;
    case "DeleteE":
        $datos = $futbolistas->delete_equipos($body["id"]);
        echo json_encode($datos);
        break;
    case "DeleteF":
        $datos = $futbolistas->delete_fechas($body["id"]);
        echo json_encode($datos);
        break;
    case "DeleteA":
        $datos = $futbolistas->delete_arbitros($body["id"]);
        echo json_encode($datos);
        break;
    case "DeleteT":
        $datos = $futbolistas->delete_torneos($body["id"]);
        echo json_encode($datos);
        break;


    case "GetUsuario":
        $datos = $futbolistas->get_usuario($body["email"], $body["password"]);
        echo json_encode($datos);
        break;

}

<?php
class Futbolistas extends Conectar
{
    public function get_arbitros()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_arbitro WHERE estatus = 0 ORDER BY id;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'apellidos' => $d->apellidos, 'contacto' => $d->contacto,
                'email' => $d->email,'fechaN' => $d->fechaN, 'colocacion' => $d->colocacion
            ];
        }
        return $Array;
    }

    public function get_partidos()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM partidos";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'Local' => $d->Local,
                'Visitante' => $d->Visitante, 'Arbitro' => $d->Arbitro,
                'Fecha' => $d->Fecha,'Hora' => $d->Hora
            ];
        }
        return $Array;
    }

    public function get_equipos()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT id, nombre, logo FROM tbl_equipos WHERE estatus = 0 ORDER BY id;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre, 'logo' => $d->logo
            ];
        }
        return $Array;
    }

    public function get_jugadores()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_jugador WHERE estatus = 0 ORDER BY id;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'apellidos' => $d->apellidos, 'fecha' => $d->fecha
            ];
        }
        return $Array;
    }

    public function get_fechas()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM fechas;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'partido' => $d->partido,
                'torneo' => $d->torneo
            ];
        }
        return $Array;
    }

    public function get_torneos()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_torneo WHERE estatus = 0 ORDER BY id;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'fechaI' => $d->fechaI, 'fechaF' => $d->fechaF
            ];
        }
        return $Array;
    }

    /* public function get_menu_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_menu WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'descripcion' => $resultado->descripcion, 'precio' => $resultado->precio
        ] : [];
        return $Array;
    } */

    public function get_equipos_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_equipos WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'logo' => $resultado->logo
        ] : [];
        return $Array;
    }
    public function get_jugadores_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_jugador WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'apellidos' => $resultado->apellidos, 'fecha' => $resultado->fecha
        ] : [];
        return $Array;
    }
    public function get_arbitros_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_arbitro WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'apellidos' => $resultado->apellidos, 'contacto' => $resultado->contacto,
            'email' => $resultado->email, 'fechaN' => $resultado->fechaN,
            'colocacion' => $resultado->colocacion
        ] : [];
        return $Array;
    }

    public function get_torneos_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_torneo WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'fechaI' => $resultado->fechaI, 'fechaF' => $resultado->fechaF
        ] : [];
        return $Array;
    }

   /*  public function insert_menu($nombre, $descripcion, $precio)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_menu`(`nombre`, `descripcion`, `precio`) VALUES (?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $precio);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    } */

    public function insert_torneos($nombre, $fechaI, $fechaF)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_torneo`(`nombre`, `fechaI`, `fechaF`) VALUES (?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $fechaI);
        $sql->bindValue(3, $fechaF);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    }
    public function insert_equipos($nombre, $logo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_equipos`(`nombre`, `logo`) VALUES (?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $logo);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    }

    public function insert_arbitros($nombre, $apellidos, $contacto, $email, $fechaN, $colocacion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_arbitro`(`nombre`, `apellidos`, `contacto`, `email`, `fechaN`, `colocacion`) VALUES (?,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $contacto);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $fechaN);
        $sql->bindValue(6, $colocacion);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    }
    public function insert_jugadores($nombre, $apellidos, $fecha)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_jugador`(`nombre`, `apellidos`, `fecha`) VALUES (?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $fecha);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    }

    public function update_menu($nombre, $descripcion, $precio,$id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_menu` SET `nombre`= ?, `descripcion`= ?, `precio`= ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $precio);
        $sql->bindValue(4, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function update_equipos($nombre, $logo, $id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_equipos` SET `nombre`= ?, `logo`= ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $logo);
        $sql->bindValue(3, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function update_arbitro($nombre, $apellidos, $contacto, $email, $fechaN, $colocacion, $id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_arbitro` SET `nombre`= ?, `apellidos`= ?, `contacto`= ?, `email`= ?, `fechaN`= ?, `colocacion`= ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $contacto);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $fechaN);
        $sql->bindValue(6, $colocacion);
        $sql->bindValue(7, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function update_torneos($nombre, $fechaI, $fechaF, $id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_torneo` SET `nombre`= ?, `fechaI`= ?, `fechaF`= ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $fechaI);
        $sql->bindValue(3, $fechaF);
        $sql->bindValue(4, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }

    public function update_jugadores($nombre, $apellidos, $fecha, $id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_jugador` SET `nombre`= ?, `apellidos` = ?, `fecha` = ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $fecha);
        $sql->bindValue(4, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }

    public function delete_jugadores($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_jugador` SET `estatus`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function delete_equipos($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_equipos` SET `estatus`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function delete_arbitros($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_arbitro` SET `estatus`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function delete_fechas($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM `fechas` WHERE partido = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
    public function delete_torneos($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_torneo` SET `estatus`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }



    public function get_usuario($email, $password)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 1 existe FROM tbl_usuarios WHERE email = ? AND password = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $password);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_OBJ);
        $array = [];
        foreach($data as $d){
            $array [] = [
                'existe' => (int)$d->existe
            ];
        }
        return $array;
    } 
}

<?php
class Registros extends Conectar
{
    public function get_registros()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_registros WHERE eliminado = 0;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'edad' => $d->edad, 'fechaN' => $d->fechaN
            ];
        }
        return $Array;
    }

    public function get_registros_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_registros WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_OBJ);
        $Array = $resultado ? [
            'id' => (int)$resultado->id, 'nombre' => $resultado->nombre,
            'edad' => $resultado->edad, 'fechaN' => $resultado->fechaN
        ] : [];
        return $Array;
    }

    public function insert_registro($nombre, $edad, $fechaN)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `tbl_registros`(`nombre`, `edad`, `fechaN`) VALUES (?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $edad);
        $sql->bindValue(3, $fechaN);
        $resultado['estatus'] =  $sql->execute();
        $lastInserId =  $conectar->lastInsertId();
        if ($lastInserId != "0") {
            $resultado['id'] = $lastInserId;
        }
        return $resultado;
    }

    public function update_registro($nombre, $edad, $fechaN,$id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_registros` SET `nombre`= ?, `edad`= ?, `fechaN`= ? WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $edad);
        $sql->bindValue(3, $fechaN);
        $sql->bindValue(4, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }

    public function delete_registro($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_registros` SET `eliminado`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }
}

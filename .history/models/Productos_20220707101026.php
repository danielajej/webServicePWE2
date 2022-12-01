<?php
class Productos extends Conectar
{
    public function get_producto()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM producto;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = [];
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function get_productos_x_id($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_categoria WHERE est=1 AND cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_categoria(cat_id,cat_nom,cat_obs,est) VALUES (NULL,?,?,'1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_categoria set
                cat_nom = ?,
                cat_obs = ?
                WHERE
                cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_categoria set
                est = '0'
                WHERE
                cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
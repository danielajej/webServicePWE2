<?php
class Menu extends Conectar
{
    public function get_menu()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_menu WHERE eliminado = 0;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'descripcion' => $d->descripcion, 'precio' => $d->precio
            ];
        }
        return $Array;
    }
    public function get_pollo()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM pollo ;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'nombre' => $d->nombre,
                'descripcion' => $d->descripcion, 'precio' => $d->precio
            ];
        }
        return $Array;
    }

    public function get_50()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM precio50;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'nombre' => $d->nombre,
                'descripcion' => $d->descripcion, 'precio' => $d->precio
            ];
        }
        return $Array;
    }
    
    public function get_sin_carne()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM sincarne;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'nombre' => $d->nombre,
                'descripcion' => $d->descripcion, 'precio' => $d->precio
            ];
        }
        return $Array;
    }

    public function get_menu_x_id($id)
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
    }

    public function insert_menu($nombre, $descripcion, $precio)
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

    public function delete_menu($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_menu` SET `eliminado`= 1 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }

    public function update_menueliminado($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `tbl_menu` SET `eliminado`= 0 WHERE id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $resultado['estatus'] = $sql->execute();
        return $resultado;
    }

    public function get_menuEliminados()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_menu WHERE eliminado = 1;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'descripcion' => $d->descripcion, 'precio' => $d->precio
            ];
        }
        return $Array;
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

    public function get_clientes()
    {
        $db = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_clientes;";
        $sql = $db->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        $Array = [];
        foreach ($resultado as $d) {
            $Array[] = [
                'id' => (int)$d->id, 'nombre' => $d->nombre,
                'tarjeta' => $d->tarjeta, 'fecha' => $d->fecha, 'email'=> $d->email,
                'password'=> $d->password
            ];
        }
        return $Array;
    }
}

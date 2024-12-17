<?php
class Alimentos
{
    public static function getTodos()
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos";
        $resultado = $db->query($sql);
        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public static function getAlimento($id)
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos WHERE id=:id";
        $resultado = $db->prepare($sql);
        $resultado->bindParam(":id", $id);
        $resultado->execute();
        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public static function getBusqueda($nombre, $orden)
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos WHERE nombre LIKE :nombre ORDER BY nombre $orden";
        $resultado = $db->prepare($sql);
        $nombre = '%' . $nombre . '%';
        $resultado->bindParam(":nombre", $nombre);
        $resultado->execute();
        if ($resultado) {
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}

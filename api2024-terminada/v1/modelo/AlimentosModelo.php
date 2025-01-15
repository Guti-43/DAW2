<?php
class AlimentosModelo
{
    public static function getTodos($inicio = 0, $cantidad = PHP_INT_MAX)
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos LIMIT :cantidad OFFSET :inicio";

        $resultado = $db->prepare($sql);
        $resultado->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $resultado->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado ? $resultado->fetchAll(PDO::FETCH_ASSOC) : false;
    }
    public static function getAlimento($id)
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos WHERE id=:id";

        $resultado = $db->prepare($sql);
        $resultado->bindParam(":id", $id);
        $resultado->execute();
        return $resultado ? $resultado->fetch(PDO::FETCH_ASSOC) : false;
    }
    public static function getBusqueda($nombre, $orden)
    {
        $db = Conectar::conexion();
        $sql = "SELECT * FROM alimentos WHERE nombre LIKE :nombre ORDER BY nombre $orden";

        $resultado = $db->prepare($sql);
        //MUY IMPORTANTE: primero construir la cadena de búsqueda y luego asignarla al parámetro
        $nombre = '%' . $nombre . '%';
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->execute();
        return $resultado ? $resultado->fetchAll(PDO::FETCH_ASSOC) : false;

        //La siguiente instrucción genera un error puesto que no se puede asignar directamente
        // la cadena de búsqueda al parámetro ya que bindParam espera una variable
        //$resultado->bindParam(':nombre', "%$nombre%", PDO::PARAM_STR);
    }
    public static function getTotalRegistros()
    {
        $db = Conectar::conexion();
        $sql = "SELECT COUNT(*) FROM alimentos";

        $resultado = $db->query($sql);
        return $resultado ? $resultado->fetchColumn() : false;
    }

    public static function insertarRegistro($data)
    {
        $db = Conectar::conexion();
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal, imagen) 
                VALUES (:nombre, :energia, :proteina, :hidratocarbono, :fibra, :grasatotal, :imagen)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':energia', $data['energia'], PDO::PARAM_INT);
        $stmt->bindParam(':proteina', $data['proteina'], PDO::PARAM_INT);
        $stmt->bindParam(':hidratocarbono', $data['hidratocarbono'], PDO::PARAM_INT);
        $stmt->bindParam(':fibra', $data['fibra'], PDO::PARAM_INT);
        $stmt->bindParam(':grasatotal', $data['grasatotal'], PDO::PARAM_INT);
        $stmt->bindParam(':imagen', $data['imagen'], PDO::PARAM_STR);
        $stmt->execute();

        //Devolver el ID del nuevo registro
        return $idNuevoRegistro = $db->lastInsertId();
    }
    public static function existeNombre($nombre)
    {
        $db = Conectar::conexion();
        $sql = "SELECT COUNT(*) FROM alimentos WHERE nombre = :nombre";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public static function buscarRegistro($id)
    {
        $db = Conectar::conexion();
        $sql = "SELECT imagen FROM alimentos WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }
    public static function borrarRegistro($id)
    {
        $db = Conectar::conexion();
        $sql = "DELETE FROM alimentos WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function actualizarRegistro($id, $data)
    {
        $db = Conectar::conexion();

        // Construir la consulta de actualización de manera dinámica
        $clausula = [];

        //Recorrer los campos y construir la cláusula de actualización
        foreach ($data as $campo => $valor) {
            $clausula[] = "$campo = :$campo";
        }
        $clausulasCadena = implode(', ', $clausula);


        // Construir la consulta de actualización con los campos a actualizar
        $sql = "UPDATE alimentos SET $clausulasCadena WHERE id = :id";
        // var_dump($sql);
        // exit;
        $stmt = $db->prepare($sql);

        // Vincular los valores de los campos  usando bindParam
        foreach ($data as $campo => &$valor) {
            $stmt->bindParam(":$campo", $valor);
        }
        // Vincular el ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return true;
    }
}

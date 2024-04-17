<?php

require_once 'config/database.php';

class Noticia {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Listar todas las noticias
    public function listar() {
        $query = "SELECT n.id, n.titulo, n.fecha, u.nombre 
                  FROM noticia n 
                  INNER JOIN usuario u ON n.id_autor = u.id 
                  ORDER BY n.fecha DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una noticia por ID
    public function obtenerPorId($id) {
        $query = "SELECT * FROM noticia WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar una nueva noticia
    public function agregar($id_autor, $titulo, $cuerpo, $fecha) {
        $query = "INSERT INTO noticia (id_autor, titulo, cuerpo, fecha) 
                  VALUES (:id_autor, :titulo, :cuerpo, :fecha)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_autor', $id_autor, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':cuerpo', $cuerpo, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Editar una noticia
    public function editar($id, $titulo, $cuerpo, $fecha) {
        $query = "UPDATE noticia 
                  SET titulo = :titulo, cuerpo = :cuerpo, fecha = :fecha 
                  WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':cuerpo', $cuerpo, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar una noticia
    public function eliminar($id) {
        $query = "DELETE FROM noticia WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>

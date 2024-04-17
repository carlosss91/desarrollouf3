<?php
require_once 'config/database.php';

class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Obtener un usuario por email
    public function obtenerPorEmail($email) {
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar un nuevo usuario
    public function agregar($nombre, $email, $contrasena) {
        $query = "INSERT INTO usuario (nombre, email, contrasena) 
                  VALUES (:nombre, :email, :contrasena)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>

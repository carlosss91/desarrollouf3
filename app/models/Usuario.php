<?php

require_once CONFIG_PATH . 'database.php';  // Incluimos el archivo de configuración de la base de datos

class Usuario {
    private $pdo;  // Instancia de PDO para interactuar con la base de datos

    // Constructor que recibe una instancia de PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Función para obtener un usuario por email
    public function obtenerPorEmail($email) {
        $query = "SELECT * FROM usuario WHERE email = :email";  // Consulta SQL para obtener el usuario por email
        $stmt = $this->pdo->prepare($query);  // Preparamos la consulta
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);  // Asignamos el valor del parámetro
        $stmt->execute();  // Ejecutamos la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Devolvemos el resultado como un array asociativo
    }

    // Función para agregar un nuevo usuario
    public function agregar($nombre, $email, $contrasena) {
        $hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);  // Hash de la contraseña
        $query = "INSERT INTO usuario (nombre, email, contrasena) 
                  VALUES (:nombre, :email, :contrasena)";  // Consulta SQL para insertar un nuevo usuario
        $stmt = $this->pdo->prepare($query);  // Preparamos la consulta
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);  // Asignamos los valores a los parámetros
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $hashContraseña, PDO::PARAM_STR);  // Usamos la contraseña hasheada
        return $stmt->execute();  // Ejecutamos la consulta y devolvemos el resultado
    }
}
?>

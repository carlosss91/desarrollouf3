<?php
require_once 'app/models/Usuario.php';

class UsuariosController {
    private $pdo;  // $pdo es una instancia de PDO, se usa para interactuar con la base de datos

    public function __construct($pdo) {  // El constructor recibe una instancia de PDO
        $this->pdo = $pdo;  // Asignamos la instancia de PDO al atributo privado $pdo
    }

    // Función para registrar un nuevo usuario
    public function registrar($nombre, $email, $contrasena) {
        $usuarioModel = new Usuario($this->pdo);  // Creamos una instancia del modelo Usuario
        return $usuarioModel->agregar($nombre, $email, $contrasena);  // Llamamos al método agregar del modelo Usuario
    }

    // Función para iniciar sesión
    public function login($email, $contrasena) {
        $usuarioModel = new Usuario($this->pdo);  // Creamos una instancia del modelo Usuario
        $usuario = $usuarioModel->obtenerPorEmail($email);  // Obtenemos el usuario por su email

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {  // Verificamos la contraseña
            // Iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];  // Guardamos el ID del usuario en la sesión
            $_SESSION['usuario_nombre'] = $usuario['nombre'];  // Guardamos el nombre del usuario en la sesión
            return true;
        } else {
            return false;
        }
    }

    // Función para cerrar sesión
    public function logout() {
        // Cerrar sesión
        session_start();
        session_destroy();
    }
}
?>

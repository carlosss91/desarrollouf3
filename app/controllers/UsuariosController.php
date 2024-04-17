<?php

require_once MODELS_PATH . 'Usuario.php'; // Incluimos el modelo Usuario


class UsuariosController {
    private $pdo;  // $pdo es una instancia de PDO, se usa para interactuar con la base de datos

    // Constructor que recibe una instancia de PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;  // Asignamos la instancia de PDO al atributo privado $pdo
    }

    // Función para registrar un nuevo usuario
    public function registrar($nombre, $email, $contrasena) {
        $usuarioModel = new Usuario($this->pdo);  // Creamos una instancia del modelo Usuario

        // Llamamos al método agregar del modelo Usuario para registrar el nuevo usuario
        $registroExitoso = $usuarioModel->agregar($nombre, $email, $contrasena);

        if ($registroExitoso) {
            // Si el registro es exitoso, redirigimos al usuario al index con un mensaje de éxito
            header("Location: ../index.php?mensaje=Usuario registrado con éxito");
            exit();
        } else {
            // Si el registro falla, redirigimos al usuario al index con un mensaje de error
            header("Location: ../index.php?mensaje=Error al registrar el usuario");
            exit();
        }
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

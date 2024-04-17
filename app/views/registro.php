<?php
require_once '../controllers/UsuariosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $usuariosController = new UsuariosController($pdo);

    if ($usuariosController->registrar($nombre, $email, $contrasena)) {
        // Si el registro es exitoso, redirigimos al usuario al index con un mensaje de éxito
        header("Location: index.php?mensaje=Usuario registrado con éxito");
        exit();
    } else {
        // Si el registro falla, redirigimos al usuario al index con un mensaje de error
        header("Location: index.php?mensaje=Error al registrar el usuario");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS personalizado -->
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Registro</h2>
                <form action="registro.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                      <!-- Botón de cancelar o volver atrás -->
                    <a href="../../index.php" class="btn btn-secondary btn-cancelar">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Script de Bootstrap -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

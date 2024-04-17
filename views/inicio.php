<?php
require_once '../config/database.php';
require_once '../controllers/UsuariosController.php';
require_once '../controllers/NoticiasController.php';

$noticiasController = new NoticiasController($pdo);
$noticias = $noticiasController->listar(); // Obtener el listado de noticias
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico Online</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Periódico Online</h1>
            </div>
            <div class="col-md-4">
                <!-- Formulario de inicio de sesión -->
                <form action="login.php" method="post" class="form-inline">
                    <input type="email" name="email" class="form-control mr-2" placeholder="Email" required>
                    <input type="password" name="contrasena" class="form-control mr-2" placeholder="Contraseña" required>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
                <a href="registro.php" class="btn btn-secondary mt-2">Registrarse</a>
            </div>
        </div>

        <hr>

        <!-- Listado de noticias -->
        <?php foreach ($noticias as $noticia) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $noticia['titulo']; ?></h5>
                    <p class="card-text">Fecha: <?php echo $noticia['fecha']; ?> | Autor: <?php echo $noticia['nombre']; ?></p>
                    <a href="detalle.php?id=<?php echo $noticia['id']; ?>" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Botón para añadir noticia -->
        <div class="text-right">
            <a href="agregar_noticia.php" class="btn btn-success">Añadir noticia</a>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

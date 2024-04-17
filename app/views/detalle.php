<?php
// Aquí puedes implementar la lógica para obtener la noticia específica por su ID
$noticia = []; // Deberás obtener la noticia específica desde la base de datos
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Noticia</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2><?php echo $noticia['titulo']; ?></h2>
                <p class="text-muted">Fecha: <?php echo $noticia['fecha']; ?> | Autor: <?php echo $noticia['nombre']; ?></p>
                <p><?php echo $noticia['cuerpo']; ?></p>
                <a href="inicio.php" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

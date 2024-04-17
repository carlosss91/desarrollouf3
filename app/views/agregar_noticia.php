<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Noticia</title>
    <!-- Enlace a Bootstrap CSS en línea -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a Bootstrap Bundle (incluye Popper.js) en línea -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Incluye tu hoja de estilos personalizada -->
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Añadir Noticia</h2>
                    </div>
                    <div class="card-body">
                        <!-- Mostrar mensaje de éxito -->
                        <?php if (isset($mensaje)): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php endif; ?>
                        <form action="agregar_noticia.php" method="post">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cuerpo">Cuerpo:</label>
                                <textarea name="cuerpo" id="cuerpo" class="form-control" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <div class="form-group text-center">
                                <!-- Botón para añadir noticia -->
                                <button type="submit" name="agregar_noticia" class="btn btn-success">Añadir Noticia</button>
                            
                                <!-- Botón para cancelar -->
                                <a href="../../index.php" class="btn btn-secondary">Cancelar</a>




                            <?php if (isset($mensaje)) : ?>
                                <div class="alert alert-success mt-3" role="alert">
                                    <?php echo $mensaje; ?>
                                </div>
                            <?php endif; ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

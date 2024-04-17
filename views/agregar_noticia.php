<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Noticia</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Añadir Noticia</h2>
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
                    <button type="submit" class="btn btn-success">Añadir Noticia</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

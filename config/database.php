<?php
require_once 'config/config.php';  // Incluimos el archivo de configuración


define("DATABASE", "ilernoticias");
define("HOST", "localhost");  // Cambia a "localhost:3100" si usaste otro puerto en XAMPP
define("USER", "carlos");   // Nombre de usuario de la base de datos
define("PASSWORD", "carlos");  // Contraseña de acceso a la base de datos
?>

  <?php
   try {
      $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=utf8mb4", USER, PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      die("Error al conectar: " . $e->getMessage());
  }
  ?>
<?php
require_once 'app/models/Noticia.php';

class NoticiasController {
    private $pdo;  // $pdo es una instancia de PDO, se usa para interactuar con la base de datos

    public function __construct($pdo) {  // El constructor recibe una instancia de PDO
        $this->pdo = $pdo;  // Asignamos la instancia de PDO al atributo privado $pdo
    }

    // Función para listar todas las noticias
    public function listar() {
        $noticiaModel = new Noticia($this->pdo);  // Creamos una instancia del modelo Noticia
        return $noticiaModel->listar();  // Llamamos al método listar del modelo Noticia
    }

    // Función para obtener el detalle de una noticia por su ID
    public function detalle($id) {
        $noticiaModel = new Noticia($this->pdo);  // Creamos una instancia del modelo Noticia
        return $noticiaModel->obtenerPorId($id);  // Llamamos al método obtenerPorId del modelo Noticia
    }

    // Función para agregar una nueva noticia
    public function agregar($id_autor, $titulo, $cuerpo, $fecha) {
        $noticiaModel = new Noticia($this->pdo);  // Creamos una instancia del modelo Noticia
        return $noticiaModel->agregar($id_autor, $titulo, $cuerpo, $fecha);  // Llamamos al método agregar del modelo Noticia
    }

    // Función para editar una noticia existente
    public function editar($id, $titulo, $cuerpo, $fecha) {
        $noticiaModel = new Noticia($this->pdo);  // Creamos una instancia del modelo Noticia
        return $noticiaModel->editar($id, $titulo, $cuerpo, $fecha);  // Llamamos al método editar del modelo Noticia
    }

    // Función para borrar una noticia por su ID
    public function borrar($id) {
        $noticiaModel = new Noticia($this->pdo);  // Creamos una instancia del modelo Noticia
        return $noticiaModel->eliminar($id);  // Llamamos al método eliminar del modelo Noticia
    }
}
?>

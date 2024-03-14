<?php
require_once __DIR__ . '/../../models/Categoria.php';

if(isset($_POST['id']) && isset($_POST['nombreCategoria']) && isset($_POST['fechaCreacion']) && isset($_POST['fechaActualizacion'])) {
    $categoriaId = $_POST['id'];
    $nombreCategoria = $_POST['nombreCategoria'];
    $fechaCreacion = $_POST['fechaCreacion'];
    $fechaActualizacion = $_POST['fechaActualizacion'];

    $categoria = new Categoria($categoriaId, $nombreCategoria, $fechaCreacion, $fechaActualizacion);
    $categoria->editarCategorias();

    echo json_encode(array("mensaje" => "Categoría editada correctamente"));
} else {
    echo json_encode(array("error" => "Datos de categoría incompletos"));
}

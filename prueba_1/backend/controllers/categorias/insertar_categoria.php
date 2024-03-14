<?php
require_once __DIR__ . '/../../models/Categoria.php';

if(isset($_POST['nombreCategoria']) && isset($_POST['fechaCreacion']) && isset($_POST['fechaActualizacion'])) {
    $nombreCategoria = $_POST['nombreCategoria'];
    $fechaCreacion = $_POST['fechaCreacion'];
    $fechaActualizacion = $_POST['fechaActualizacion'];

    $categoria = new Categoria(0, $nombreCategoria, $fechaCreacion, $fechaActualizacion);
    $categoria->insertarCategorias();

    echo json_encode(array("mensaje" => "Categoría insertada correctamente"));
} else {
    echo json_encode(array("error" => "Datos de categoría incompletos"));
}


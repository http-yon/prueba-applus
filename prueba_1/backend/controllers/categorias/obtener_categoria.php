<?php
require_once __DIR__ . '/../../models/Categoria.php';

if(isset($_GET['id'])) {
    $categoriaId = $_GET['id'];
    $categoria = new Categoria($categoriaId);
    $categoria = $categoria->obtenerUnaCategoria();
    
    echo json_encode($categoria);
} else {
    echo json_encode(array("error" => "ID de categoría no proporcionado"));
}


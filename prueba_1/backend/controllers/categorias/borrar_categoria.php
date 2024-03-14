<?php
require_once __DIR__ . '/../../models/Categoria.php';

//controlador para borrar una categoria
if(isset($_POST['id'])) {
    $categoriaId = $_POST['id'];
    $categoria = new Categoria($categoriaId);
    $categoria->borrarCategorias();

    echo json_encode(array("mensaje" => "Categoría borrada correctamente"));
} else {
    echo json_encode(array("error" => "ID de categoría no proporcionado"));
}

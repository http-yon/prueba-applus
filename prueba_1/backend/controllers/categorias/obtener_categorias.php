

<?php
require_once __DIR__ . '/../../models/Categoria.php';

//controlador para traer todas las categoria
$categoria = new Categoria();
$categorias = $categoria->obtenerCategorias();

echo json_encode($categorias);


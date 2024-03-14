

<?php
require_once __DIR__ . '/../../models/Categoria.php';

$categoria = new Categoria();
$categorias = $categoria->obtenerCategorias();

echo json_encode($categorias);




<?php
require_once __DIR__ . '/../../models/Producto.php';

$producto = new Producto();
$productos = $producto->obtenerProductos();

echo json_encode($productos);




<?php
require_once __DIR__ . '/../../models/Producto.php';

//controlador para traer todos los productos
$producto = new Producto();
$productos = $producto->obtenerProductos();

echo json_encode($productos);


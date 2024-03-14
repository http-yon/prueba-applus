<?php
require_once __DIR__ . '/../../models/Producto.php';

//controlador para buscar un producto por su id
if(isset($_GET['id'])) {
    $productoId = $_GET['id'];
    $producto = new Producto($productoId);
    $producto = $producto->obtenerUnProducto();
    
    echo json_encode($producto); 
} else {
    echo json_encode(array("error" => "ID de producto no proporcionado"));
}


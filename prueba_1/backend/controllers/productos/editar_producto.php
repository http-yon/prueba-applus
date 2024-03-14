<?php
require_once __DIR__ . '/../../models/Producto.php';

if(isset($_POST['id']) && isset($_POST['code']) && isset($_POST['name']) && isset($_POST['category_id']) && isset($_POST['price'])) {
    $productoId = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    $producto = new Producto($productoId, $code, $name, $category_id, $price);
    $exito = $producto->editarProducto();

    if($exito) {
        echo json_encode(array("mensaje" => "Producto editado correctamente"));
    } else {
        echo json_encode(array("error" => "No se pudo editar el producto"));
    }
} else {
    echo json_encode(array("error" => "Datos de producto incompletos"));
}


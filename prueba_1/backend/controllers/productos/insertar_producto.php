<?php
require_once __DIR__ . '/../../models/Producto.php';

if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['category_id']) && isset($_POST['price'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    
    $createdAt = date("Y-m-d H:i:s");
    $updatedAt = $createdAt; 

    $producto = new Producto(0, $code, $name, $category_id, $price, $createdAt, $updatedAt);
    $producto->insertarProducto();

    echo json_encode(array("mensaje" => "Producto insertado correctamente"));
} else {
    echo json_encode(array("error" => "Datos de producto incompletos"));
}
?>

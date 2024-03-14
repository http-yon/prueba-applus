<?php
require_once __DIR__ . '/../../models/Producto.php';

if(isset($_POST['id'])) {
    $productoId = $_POST['id'];
    $producto = new Producto($productoId);
    $exito = $producto->borrarProducto();

    if($exito) {
        echo json_encode(array("mensaje" => "Producto borrado correctamente"));
    } else {
        echo json_encode(array("error" => "No se pudo borrar el producto"));
    }
} else {
    echo json_encode(array("error" => "ID de producto no proporcionado"));
}

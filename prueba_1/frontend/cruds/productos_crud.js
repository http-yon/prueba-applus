$(document).ready(function() {
    // Obtener todos los productos
    $(function() {
        $.ajax({
            url: '../backend/controllers/productos/obtener_productos.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Limpiar el contenido existente de la tabla
                $("#tablaProductos tbody").empty();
    
                // Iterar sobre los datos recibidos y agregar filas a la tabla
                $.each(response, function(index, producto) {
                    var newRow = "<tr>" +
                        "<th scope='row'>" + producto.id + "</th>" +
                        "<td>" + producto.code + "</td>" +
                        "<td>" + producto.name + "</td>" +
                        "<td>" + producto.category_id + "</td>" +
                        "<td>" + producto.price + "</td>" +
                        "<td><button type='button' class='btn btn-danger eliminar-producto' data-id='" + producto.id + "'>Eliminar</button></td>" +
                        "<td><button type='button' class='btn btn-info'>Info</button></td>" +
                        "</tr>";
                    $("#tablaProductos tbody").append(newRow);
                });
    
                // Agregar controlador de eventos click para los botones de eliminar
                $(".eliminar-producto").click(function() {
                    var idProducto = $(this).data('id');
                    confirmarEliminarProducto(idProducto);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí si es necesario
            }
        });
    });


    function confirmarEliminarProducto(idProducto) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            // Si el usuario confirma, llama a la función para eliminar el producto
            eliminarProducto(idProducto);
            window.location.reload();
        }
    }




    // Borrar un producto por su ID
    function eliminarProducto(idProducto) {
        $.ajax({
            url: '../backend/controllers/productos/borrar_producto.php',
            type: 'POST',
            data: { id: idProducto },
            success: function(response) {
                console.log(response);
                // Actualizar la tabla u otra lógica necesaria después de eliminar
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí si es necesario
            }
        });
    }

});

$(document).ready(function () {
    // Obtener todos los productos
    $(function () {
        $.ajax({
            url: '../backend/controllers/productos/obtener_productos.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#tablaProductos tbody").empty();

                // Iterar en tabla
                $.each(response, function (index, producto) {
                    let newRow = "<tr>" +
                        "<th scope='row'>" + producto.id + "</th>" +
                        "<td>" + producto.code + "</td>" +
                        "<td>" + producto.name + "</td>" +
                        "<td>" + producto.category_id + "</td>" +
                        "<td>" + producto.price + "</td>" +
                        "<td><button type='button' class='btn btn-danger eliminar-producto' data-id='" + producto.id + "'>Eliminar</button></td>" +
                        "<td><button type='button' class='btn btn-info'>Editar</button></td>" +
                        "</tr>";
                    $("#tablaProductos tbody").append(newRow);
                });

                //controlador de eventos
                $(".eliminar-producto").click(function () {
                    let idProducto = $(this).data('id');
                    confirmarEliminarProducto(idProducto);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    //confirma eliminacion
    function confirmarEliminarProducto(idProducto) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            eliminarProducto(idProducto);
            window.location.reload();
        }
    }


    // eliminar un producto por su ID
    function eliminarProducto(idProducto) {
        $.ajax({
            url: '../backend/controllers/productos/borrar_producto.php',
            type: 'POST',
            data: { id: idProducto },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }


    //mostrar categorias en el select del modal
    $(function () {
        $.ajax({
            url: '../backend/controllers/categorias/obtener_categorias.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                let selectCategoria = $("#categoriaId");

                $.each(response, function (index, categoria) {
                    let option = $("<option>").attr("value", categoria.id).text(categoria.name);
                    selectCategoria.append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    // Insertar nuevo producto
    $("#insertarProductoModalBtn").click(function () {
        let codigoProducto = $("#codigoProducto").val();
        let nombreProducto = $("#nombreProducto").val();
        let categoriaId = $("#categoriaId").val();
        let precioProducto = $("#precioProducto").val();

        if (codigoProducto !== "" && nombreProducto !== "" && categoriaId !== "" && precioProducto !== "") {
            $.ajax({
                url: '../backend/controllers/productos/insertar_producto.php',
                type: 'POST',
                data: {
                    code: codigoProducto,
                    name: nombreProducto,
                    category_id: categoriaId,
                    price: precioProducto
                },
                success: function (response) {
                    console.log(response);
                    alert("datos insertados correctamente")
                    window.location.reload()
                }
            });
        } else {
            alert("Por favor, complete todos los campos.");
        }
    });




});

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
                        "<td>" + producto.category_name  + "</td>" +
                        "<td>" + producto.price + "</td>" +
                        "<td><button type='button' class='btn btn-danger eliminar-producto'data-id='" + producto.id + "'>Eliminar</button></td>" +
                        "<td><button type='button' class='btn btn-primary editar-producto' data-bs-toggle='modal' data-bs-target='#editarProductoModal' data-id='" + producto.id + "'>Editar Producto</button></td>" +
                        "</tr>"


                    $("#tablaProductos tbody").append(newRow);
                });

                $(".editar-producto").click(function () {
                    let idProducto = $(this).data('id');
                    cargarDatosProducto(idProducto);
                    cargarCategorias();
                });

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


    //mostrar categorias en el modal POST
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

    //mostrar categorias en el modal UPDATE
    function cargarCategorias() {
        $.ajax({
            url: '../backend/controllers/categorias/obtener_categorias.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let selectCategoria = $("#editarCategoriaProducto");

                selectCategoria.empty();

                $.each(response, function (index, categoria) {
                    let option = $("<option>").attr("value", categoria.id).text(categoria.name);
                    selectCategoria.append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    //obtener producto por id y poder valores en inputs del modal Update
    //actualizar productos
    function cargarDatosProducto(idProducto) {
        $.ajax({
            url: '../backend/controllers/productos/obtener_producto.php?id=' + idProducto,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#editarCodigoProducto').val(response[0].code);
                $('#editarNombreProducto').val(response[0].name);
                $('#editarPrecioProducto').val(response[0].price);

                $("#guardarCambiosProducto").click(function () {
                    // Obtener los datos del formulario
                    let idProducto = $("#editarIdProducto").val();
                    let code = $("#editarCodigoProducto").val();
                    let name = $("#editarNombreProducto").val();
                    let category_id = $("#editarCategoriaProducto").val();
                    let price = $("#editarPrecioProducto").val();

                    let producto = {
                        id: response[0].id,
                        code: code,
                        name: name,
                        category_id: category_id,
                        price: price
                    };

                    $.ajax({
                        url: '../backend/controllers/productos/editar_producto.php',
                        type: 'POST',
                        dataType: 'json',
                        data: producto,
                        success: function (response) {
                            if (response.mensaje) {
                                alert("datos actualaizados correctamente")
                                window.location.reload()

                            } else if (response.error) {
                                console.error(response.error);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }





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

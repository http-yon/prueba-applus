<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | prueba Applus</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SCRIPTS -->
    <script src="./cruds/categorias_crud.js"></script>
    <script src="./cruds/productos_crud.js"></script>

</head>

<body>

    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertarProductoModal">
        Insertar Producto
    </button>

    <!-- Modal -->
    <div class="modal fade" id="insertarProductoModal" tabindex="-1" aria-labelledby="insertarProductoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertarProductoModalLabel">Insertar un nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="codigoProducto" class="form-label">Código del producto</label>
                        <input type="text" class="form-control" id="codigoProducto" placeholder="Código del producto">
                    </div>
                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombreProducto" placeholder="Nombre del producto">
                    </div>
                    <div class="mb-3">
                        <label for="categoriaId" class="form-label">Categoría del producto</label>
                        <select class="form-select" id="categoriaId" aria-label="Categoría del producto">
                            <option selected>Selecciona una categoría</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precioProducto" class="form-label">Precio del producto</label>
                        <input type="text" class="form-control" id="precioProducto" placeholder="Precio del producto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="insertarProductoModalBtn">Insertar
                        Producto</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>




    <table class="table" id="tablaProductos">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <!-- datos dinamicos -->
        </tbody>
    </table>



    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
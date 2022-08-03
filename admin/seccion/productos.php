<?php include("../template/header.php") ?>

<div class="col-md-5">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txtId">Id Producto</label>
            <input type="email" name="txtId" class="form-control" id="txtId" placeholder="Id del producto">
        </div>
        <div class="form-group">
            <label for="txtNombre">Nombre: </label>
            <input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre del producto">
        </div>
        <div class="form-group">
            <label for="txtNombre">Foto: </label>
            <input type="file" name="txtNombre" class="form-control" id="txtNombre">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="button" class="btn btn-success">Agregar</button>
            <button type="button" class="btn btn-warning">Modificar</button>
            <button type="button" class="btn btn-danger">Cancelar</button>
        </div>
    </form>


</div>
<div class="col-md-7">
    Tabla de los productos
</div>

<?php include("../template/footer.php") ?>
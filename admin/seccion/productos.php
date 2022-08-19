<?php include("../template/header.php") ?>
<?php

$image = (isset($_FILES['imgProd']['name'])) ? $_FILES['imgProd']['name'] : "";
$Id = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$nombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$proveedor = (isset($_POST['txtProveedor'])) ? $_POST['txtProveedor'] : "";
$stock = (isset($_POST['numStock'])) ? $_POST['numStock'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../config/base_datos.php");

switch($accion){
    case 'Agregar':

        // INSERT INTO `productos` (`imagen`, `id`, `nombre`, `proveedor`, `stock`) VALUES ('foto_producto.jpg', NULL, 'Marco bicicleta 27\"', 'Tour Colombia', '50');
        $consultaSQL = $conexion->prepare("INSERT INTO productos (imagen,nombre,proveedor,stock) VALUES (:imagen,:nombre,:proveedor,:stock)");
        $consultaSQL->bindParam(':imagen',$image);
        $consultaSQL->bindParam(':nombre',$nombre);
        $consultaSQL->bindParam(':proveedor',$proveedor);
        $consultaSQL->bindParam(':stock',$stock);
        $consultaSQL->execute();
        break;
    
    case 'Modificar':
        echo "presionado el botón modificar";
        break;
    
    case 'Cancelar':
        echo "presionado el botón cancelar";
        break;
    case 'Actualizar':
        // echo "presionado el botón Actualizar";
        break;
    case 'Borrar':
        $consultaSQL = $conexion->prepare("DELETE  FROM productos WHERE id=:id");
        $consultaSQL->bindParam(':id',$Id);
        $consultaSQL->execute();
        // echo "presionado el botón Borrar";
        break;
}

$consultaSQL = $conexion->prepare("SELECT * FROM productos");
$consultaSQL->execute();
$listaProductos = $consultaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Información de producto
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="imgProd">Foto: </label>
                    <input type="file" name="imgProd" class="form-control" id="imgProd">
                </div>
                <div class="form-group">
                    <label for="txtId">Id Producto</label>
                    <input type="number" name="txtId" class="form-control" id="txtId" placeholder="Id del producto">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                    <label for="txtProveedor">Proveedor: </label>
                    <input type="text" name="txtProveedor" class="form-control" id="txtProveedor" placeholder="Nombre del proveedor">
                </div>
                <div class="form-group">
                    <label for="numStock">Stock </label>
                    <input type="number" name="numStock" class="form-control" id="numStock" placeholder="Cantidad ingresada">
                </div>
        
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>

    </div>


</div>
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $producto) : ?>
            <tr>
                <td style="width: 15%;">
                    <img src="<?php echo $producto['imagen'] ?>" class="img_product" style="width: 100%">
                </td>
                <td style="width: 10%;"><?php echo $producto['id'] ?></td>
                <td style="width: 15%;"><?php echo $producto['nombre'] ?></td>
                <td style="width: 20%;"><?php echo $producto['proveedor'] ?></td>
                <td style="width: 15%;"><?php echo $producto['stock'] ?></td>
                <td style="width: 25%;">
                    <form method="post">
                        <input type="hidden" name="txtId" id="txtId" value="<?php echo $producto['id'] ?>"/>
                        <input type="submit" name="accion" value="Actualizar" class="btn btn-primary"/>
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form> <!-- seleccionar registros -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include("../template/footer.php") ?>
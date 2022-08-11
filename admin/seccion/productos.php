<?php include("../template/header.php") ?>
<?php

$image = (isset($_FILES['imgProd']['name'])) ? $_FILES['imgProd']['name'] : "";
$Id = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$nombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$proveedor = (isset($_POST['txtProveedor'])) ? $_POST['txtProveedor'] : "";
$stock = (isset($_POST['numStock'])) ? $_POST['numStock'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


$host="localhost";
$bd="inventario";
$user="root";
$password="qwerty";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$user,$password);
    if($conexion){
        echo "Conexión exitosa a la base de datos";
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

switch($accion){
    case 'Agregar':

        // INSERT INTO `productos` (`imagen`, `id`, `nombre`, `proveedor`, `stock`) VALUES ('foto_producto.jpg', NULL, 'Marco bicicleta 27\"', 'Tour Colombia', '50');
        echo "presionado el botón agregar";
        break;
    
    case 'Modificar':
        echo "presionado el botón modificar";
        break;
    
    case 'Cancelar':
        echo "presionado el botón cancelar";
        break;
}
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
            <tr>
                <td style="width: 15%;">
                    <img src="https://i.linio.com/p/558a42c6346dc388aadc965c06a72dee-product.jpg" class="img_product" style="width: 100%">
                </td>
                <td style="width: 10%;">1</td>
                <td style="width: 15%;">Casco sport</td>
                <td style="width: 20%;">Shimano group</td>
                <td style="width: 15%;">4</td>
                <td style="width: 25%;">Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include("../template/footer.php") ?>
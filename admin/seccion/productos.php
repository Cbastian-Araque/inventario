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

        $fecha = new DateTime();
        $fileName = ($image != '') ? $fecha->getTimestamp().'_'.$_FILES['imgProd']['name'] : 'imagen.jpg';

        $tmpImagen = $_FILES['imgProd']['tmp_name'];

        if($tmpImagen != ''){
            move_uploaded_file($tmpImagen, '../../media/products/'.$fileName);
        }

        $consultaSQL->bindParam(':imagen',$fileName);
        $consultaSQL->bindParam(':nombre',$nombre);
        $consultaSQL->bindParam(':proveedor',$proveedor);
        $consultaSQL->bindParam(':stock',$stock);
        $consultaSQL->execute();

        header("Location:productos.php");
        break;
    
    case 'Modificar':
        $consultaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre, proveedor=:proveedor, stock=:stock WHERE id=:id");
        $consultaSQL->bindParam(':id',$Id);
        $consultaSQL->bindParam(':nombre',$nombre);
        $consultaSQL->bindParam(':proveedor',$proveedor);
        $consultaSQL->bindParam(':stock',$stock);
        $consultaSQL->execute();

        if($image != ''){
            $fecha = new DateTime();
            $fileName = ($image != '') ? $fecha->getTimestamp().'_'.$_FILES['imgProd']['name'] : 'imagen.jpg';
            $tmpImagen = $_FILES['imgProd']['tmp_name'];

            move_uploaded_file($tmpImagen, '../../media/products/'.$fileName);

            $consultaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $consultaSQL->bindParam(':id',$Id);
            $consultaSQL->execute();
            $producto = $consultaSQL->fetch(PDO::FETCH_LAZY);
    
            if(isset($producto['imagen']) && ($producto['imagen'] != 'imagen.jpg') ){
                if(file_exists("../../media/products/" . $producto['imagen'])){
                    unlink("../../media/products/" . $producto['imagen']);
    
                }
            }

            $consultaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
            $consultaSQL->bindParam(':imagen',$$fileName);
            $consultaSQL->bindParam(':id',$Id);
            $consultaSQL->execute();
        }
        header("Location:productos.php");
        break;
    
    case 'Cancelar':
        header("Location:productos.php");
        break;
    case 'Actualizar':
        // echo "presionado el botón Actualizar";
        $consultaSQL = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $consultaSQL->bindParam(':id',$Id);
        $consultaSQL->execute();
        $producto = $consultaSQL->fetch(PDO::FETCH_LAZY);

        $nombre=$producto['nombre'];
        $image=$producto['imagen'];
        $proveedor=$producto['proveedor'];
        $stock=$producto['stock'];
        break;
    case 'Borrar':

        $consultaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $consultaSQL->bindParam(':id',$Id);
        $consultaSQL->execute();
        $producto = $consultaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($producto['imagen']) && ($producto['imagen'] != 'imagen.jpg') ){
            if(file_exists("../../media/products/" . $producto['imagen'])){
                unlink("../../media/products/" . $producto['imagen']);

            }
        }

        $consultaSQL = $conexion->prepare("DELETE  FROM productos WHERE id=:id");
        $consultaSQL->bindParam(':id',$Id);
        $consultaSQL->execute();
        
        header("Location:productos.php");
        break;
}

$consultaSQL = $conexion->prepare("SELECT * FROM productos");
$consultaSQL->execute();
$listaProductos = $consultaSQL->fetchAll(PDO::FETCH_ASSOC);

?> 

<div class="col-md-4">

    <div class="card">
        <div class="card-header">
            <!-- estilos del cuerpo de productos.php   -->
            <style>
                body {
    font-family: 'Dosis', sans-serif;
    
  }
  body {
    background-color: #20ad9b;
  width: 100%;
}
.card-body {
    background-color: #0c072c;
    color: #fff;
   
   }
   .col-md-8 {
    background-color: #0c072c;
    color: #fff;
   
   }
   .table {
    color: #fff;
    
}
 </style>

            Información de producto
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtId">Id Producto</label>
                    <input type="text" required readonly name="txtId" class="form-control" value="<?php echo $Id ?>" id="txtId" placeholder="Id del producto">
                </div>
                <div class="form-group">
                    <label for="imgProd">Foto: </label>

                    <br/>

                    <?php if($image != '') : ?>
                        <img class="img-thumbnail rounded" src="/bicicleteria/media/products/<?php echo $image ?>" width="100" alt="">
                    <?php endif; ?>

                    <input type="file" name="imgProd" class="form-control" id="imgProd">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" required name="txtNombre" class="form-control" value="<?php echo $nombre ?>" id="txtNombre" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                    <label for="txtProveedor">Proveedor: </label>
                    <input type="text" required name="txtProveedor" class="form-control" value="<?php echo $proveedor ?>" id="txtProveedor" placeholder="Nombre del proveedor">
                </div>
                <div class="form-group">
                    <label for="numStock">Stock </label>
                    <input type="number" required name="numStock" class="form-control" value="<?php echo $stock ?>" id="numStock" placeholder="Cantidad ingresada">
                </div>
        
                <div class="btn-group" role="group" aria-label="">
                    
                    <button type="submit" name="accion" <?php echo ($accion === "Actualizar") ? "disabled" : "" ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion !== "Actualizar") ? "disabled" : "" ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo ($accion !== "Actualizar") ? "disabled" : "" ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>

    </div>


</div>
<div class="col-md-8">
<img src="../assent/cuerpoproducto.jpeg" alt="imagen fondo" width="100">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $producto) : ?>
            <tr>
                <td style="width: 10%;"><?php echo $producto['id'] ?></td>
                <td style="width: 15%;">
                    <img class="img-thumbnail rounded" src="/bicicleteria/media/products/<?php echo $producto['imagen'] ?>" width="100" alt="<?php echo $producto['nombre'] ?>">
                </td>
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
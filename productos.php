<?php 
include('template/header.php');

//  archivo de conexión a la BBDD
include ('admin/config/base_datos.php'); 

$consultaSQL = $conexion->prepare("SELECT * FROM productos");
$consultaSQL->execute();
$listaProductos = $consultaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
    
<div class="cnt_cards_products">
    <?php foreach($listaProductos as $producto) : ?>
    <article class=" card-product">
        <img class="card-img-top" src="/bicicleteria/media/products/<?php echo $producto['imagen']?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['nombre'] ?></h4>
            <p>Cantidad: <?php echo $producto['stock'] ?></p>
            <p>Proveedor: <?php echo $producto['proveedor']; ?></p>
        </div>
    </article>
    <?php endforeach; ?>
</div>


<?php include('template/footer.php') ?>
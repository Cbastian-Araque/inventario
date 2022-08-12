<?php 
$host="127.0.0.1:33065"; // nombre del servidor
$bd="inventario"; // nombre de la base de datos
$user="root"; // nombre de usuario (del gestor de base de datos)
$password="";  // contraseña de el gestor de base de datos

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$user,$password);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<?php
include 'db.php';

$titulo = $_POST['titulo'];
$imagen = $_POST['imagen'];
$tallas = $_POST['tallas'];
$colores = $_POST['colores'];
$precio = $_POST['precio'];
$categoria_id = $_POST['categoria'];

$sql = "INSERT INTO productos (titulo, imagen, tallas, colores, precio, categoria_id) 
        VALUES ('$titulo', '$imagen', '$tallas', '$colores', '$precio', '$categoria_id')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: /html/admin.html");
exit();
?>

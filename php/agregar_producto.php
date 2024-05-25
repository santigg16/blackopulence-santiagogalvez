<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blackopulence";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$imagen = $_POST['imagen'];
$tallas = $_POST['tallas'];
$colores = $_POST['colores'];
$precio = $_POST['precio'];
$categoria_id = $_POST['categoria'];

$sql = "INSERT INTO productos (nombre, imagen, talla, color, precio, categoria_id) 
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

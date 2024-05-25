<?php
include 'db.php'; 

$titulo = $_POST['titulo'];
$imagen = $_POST['imagen'];
$tallas = $_POST['tallas'];
$colores = $_POST['colores'];
$precio = $_POST['precio'];
$categoria_id = $_POST['categoria']; 

$sql = "INSERT INTO productos (nombre, imagen, talla, color, precio, categoria_id) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdi", $titulo, $imagen, $tallas, $colores, $precio, $categoria_id);

if ($stmt->execute() === TRUE) {
    echo "Producto agregado correctamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

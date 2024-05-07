<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$database = "blackopulence";

// Crear conexión
$conn = new mysqli($servername, $username, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

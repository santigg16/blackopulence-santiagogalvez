<?php
$servername = "localhost";
$username = "root";
$database = "blackopulence";

$conn = new mysqli($servername, $username, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

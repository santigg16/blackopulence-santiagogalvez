<?php
$servername = "localhost";
$username = "root";
$pass= "";
$database = "blackopulence";

$conn = new mysqli($servername, $username, $pass, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

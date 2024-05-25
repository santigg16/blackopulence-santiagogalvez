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

// Verificar si se ha enviado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $producto_id = $_GET['id'];
    
    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = $producto_id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "ID de producto no válido.";
}

// Cerrar la conexión a la base de datos
$conn->close();
header("Location: /html/admin.html");
exit();
?>

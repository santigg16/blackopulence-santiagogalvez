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
    
    // Preparar la consulta SQL
    $sql = "DELETE FROM productos WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);

    if ($stmt->execute() === TRUE) {
        echo "Producto eliminado correctamente.";
        header("Location: /html/admin.html");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de producto no válido.";
}

$conn->close();
?>

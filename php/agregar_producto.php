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

// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $tallas = $_POST['tallas'];
    $colores = $_POST['colores'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO productos (nombre, imagen, talla, color, precio, categoria_id) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $titulo, $imagen, $tallas, $colores, $precio, $categoria_id);

    if ($stmt->execute() === TRUE) {
        echo "Producto agregado correctamente";
        header("Location: /html/admin.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

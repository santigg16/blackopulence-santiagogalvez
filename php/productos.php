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

// Verificar si se ha pasado una categoría por GET, si no, por defecto es 'camisetas'
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'camisetas';

// Preparar y ejecutar la consulta SQL para obtener productos de la categoría especificada
$sql = "SELECT p.nombre, p.imagen, p.precio FROM productos p 
        JOIN categorias c ON p.categoria_id = c.id 
        WHERE c.nombre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $categoria);
$stmt->execute();
$result = $stmt->get_result();

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = array(
            'nombre' => htmlspecialchars($row['nombre']),
            'imagen' => htmlspecialchars($row['imagen']),
            'precio' => htmlspecialchars($row['precio'])
        );
    }
}

$stmt->close();
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($products);
?>

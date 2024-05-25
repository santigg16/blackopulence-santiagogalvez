<?php
include 'db.php';

// Sanitizar el nombre de la categoría
$nombre_categoria = 'camisetas';

// Preparar la consulta SQL
$sql = "SELECT * FROM productos
        JOIN categorias ON productos.categoria_id = categorias.id
        WHERE categorias.nombre = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombre_categoria);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nombre: " . htmlspecialchars($row["nombre"]) . " - Precio: " . htmlspecialchars($row["precio"]) . " - Talla: " . htmlspecialchars($row["talla"]) . " - Color: " . htmlspecialchars($row["color"]) . "<br>";
    }
} else {
    echo "0 resultados";
}

$stmt->close();
$conn->close();
?>

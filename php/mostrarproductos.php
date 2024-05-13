<?php
include 'db.php';

$nombre_categoria = 'camisetas';

$sql = "SELECT * FROM productos
        JOIN categorias ON productos.categoria_id = categorias.id
        WHERE categorias.nombre = '$nombre_categoria'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row["nombre"]. " - Precio: " . $row["precio"]. " - Talla: " . $row["talla"]. " - Color: " . $row["color"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>

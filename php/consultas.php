<?php
include 'conexion.php';

// Consulta para obtener todas las sudaderas
$sql = "SELECT * FROM sudaderas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrar los datos
    while($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row["nombre"]. " - Color: " . $row["color"]. " - Talla: " . $row["talla"]. " - Precio: " . $row["precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>

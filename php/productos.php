<?php
include 'db.php';

if(isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
} else {
    $categoria = 'camisetas';
}

$sql = "SELECT * FROM PRODUCTOS WHERE categoria_id = (
            SELECT id FROM CATEGORIAS WHERE nombre = '$categoria'
        )";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>

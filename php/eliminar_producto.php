<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM productos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: /html/admin.html");
exit();
?>

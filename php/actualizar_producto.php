<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Black Opulence</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Editar Producto</h2>
    <form action="/php/actualizar_producto.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo $product['titulo']; ?>" required><br>
        <label for="imagen">URL de la Imagen:</label><br>
        <input type="text" id="imagen" name="imagen" value="<?php echo $product['imagen']; ?>" required><br>
        <label for="tallas">Tallas:</label><br>
        <input type="text" id="tallas" name="tallas" value="<?php echo $product['tallas']; ?>" required><br>
        <label for="colores">Colores:</label><br>
        <input type="text" id="colores" name="colores" value="<?php echo $product['colores']; ?>" required><br>
        <label for="precio">Precio:</label><br>
        <input type="text" id="precio" name="precio" value="<?php echo $product['precio']; ?>" required><br><br>
        <label for="categoria">Categoría:</label><br>
        <select id="categoria" name="categoria" required>
            <option value="1" <?php if($product['categoria_id'] == 1) echo 'selected'; ?>>Camisetas</option>
            <option value="2" <?php if($product['categoria_id'] == 2) echo 'selected'; ?>>Gorras</option>
            <option value="3" <?php if($product['categoria_id'] == 3) echo 'selected'; ?>>Sudaderas</option>
        </select><br><br>
        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
<?php
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $tallas = $_POST['tallas'];
    $colores = $_POST['colores'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria'];

    $sql = "UPDATE productos SET 
            titulo = '$titulo', 
            imagen = '$imagen', 
            tallas = '$tallas', 
            colores = '$colores', 
            precio = '$precio', 
            categoria_id = '$categoria_id'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: /html/admin.html");
    exit();
}
?>

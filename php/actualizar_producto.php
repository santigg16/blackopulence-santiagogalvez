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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $producto_id = $_POST['id'];

    // Obtener los datos enviados por el formulario
    $nombre = $_POST['titulo'];
    $precio = $_POST['precio'];
    $talla = $_POST['tallas'];
    $color = $_POST['colores'];
    $imagen = $_POST['imagen'];

    // Preparar la consulta para actualizar el producto
    $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', talla='$talla', color='$color', imagen='$imagen' WHERE id=$producto_id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado correctamente.";
        header("Location: /html/admin.html");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}

// Mostrar el formulario de actualización con los datos del producto
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $producto_id = $_GET['id'];

    $sql = "SELECT * FROM productos WHERE id = $producto_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
?>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 bg-light">
                    <img src="../imagenes/CAMISETAS/CATALOGO-CAMISETAS/<?php echo $producto['imagen']; ?>" alt="Imagen del Producto" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input class="form-control" type="text" name="titulo" value="<?php echo $producto['nombre']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="imagen">URL Imagen:</label>
                            <input class="form-control" type="text" name="imagen" value="<?php echo $producto['imagen']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tallas">Talla:</label>
                            <select class="form-control" id="tallas" name="tallas" required>
                                <option value="S" <?php if (isset($producto['talla']) && $producto['talla'] == "S") echo "selected"; ?>>S</option>
                                <option value="M" <?php if (isset($producto['talla']) && $producto['talla'] == "M") echo "selected"; ?>>M</option>
                                <option value="L" <?php if (isset($producto['talla']) && $producto['talla'] == "L") echo "selected"; ?>>L</option>
                                <option value="XL" <?php if (isset($producto['talla']) && $producto['talla'] == "XL") echo "selected"; ?>>XL</option>
                                <option value="EG" <?php if (isset($producto['talla']) && $producto['talla'] == "EG") echo "selected"; ?>>EG</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="colores">Color:</label>
                            <input class="form-control" type="text" name="colores" value="<?php echo $producto['color']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input class="form-control" type="number" name="precio" value="<?php echo $producto['precio']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <select class="form-control" id="categoria" name="categoria" required>
                                <option value="1" <?php if (isset($producto['categoria']) && $producto['categoria'] == "1") echo "selected"; ?>>Camiseta</option>
                                <option value="2" <?php if (isset($producto['categoria']) && $producto['categoria'] == "2") echo "selected"; ?>>Gorras</option>
                                <option value="3" <?php if (isset($producto['categoria']) && $producto['categoria'] == "3") echo "selected"; ?>>Zapatillas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "No se encontró el producto.";
    }
} else {
    echo "ID de producto no válido.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
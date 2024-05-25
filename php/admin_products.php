<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blackopulence";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL sin término de búsqueda
$sql = "SELECT * FROM productos";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo '
        <input type="text" class="form-control" placeholder="Buscar artículos..." aria-label="Search" id="buscador" onkeyup="buscar()">
        <table class="table text-light" id="tabla-productos">
         <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Talla</th>
                <th scope="col">Color</th>
                <th scope="col"></th>
            </tr>
         </thead>
         <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
            <th scope="row">' . $row["id"] . '</th>
            <td><img src="../imagenes/CAMISETAS/' . $row["imagen"] . '" alt="' . $row["imagen"] . '" style="max-width:50px;"></td>
            <td class="article-name">' . $row["nombre"] . '</td>
            <td>' . $row["precio"] . '</td>
            <td>' . $row["talla"] . '</td>
            <td>' . $row["color"] . '</td>
            <td>
            <a href="/php/actualizar_producto.php?id=' . $row["id"] . '" class="btn btn-warning mr-2"><i class="fas fa-pencil-alt"></i></a>
            <button class="btn btn-danger" onclick="abrirModal(' . $row["id"] . ')"><i class="fas fa-trash-alt"></i></button>
            </td>
            </tr>';
        }

        echo '</tbody>
            </table>';
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
} else {
    echo "<p>Error en la consulta: " . $conn->error . "</p>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- Modal de Bootstrap -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="confirmModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                ¿Estás seguro de que deseas eliminar este artículo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirmarEliminar">Sí</button>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar() {
        // Obtener el valor del campo de búsqueda
        var input = document.getElementById("buscador");
        var filtro = input.value.toUpperCase();
        var tabla = document.getElementById("tabla-productos");
        var filas = tabla.getElementsByTagName("tr");

        // Iterar sobre todas las filas de la tabla y ocultar aquellas que no coincidan con el filtro
        for (var i = 0; i < filas.length; i++) {
            var nombreProducto = filas[i].getElementsByClassName("article-name")[0];
            if (nombreProducto) {
                var textoNombre = nombreProducto.textContent || nombreProducto.innerText;
                if (textoNombre.toUpperCase().indexOf(filtro) > -1) {
                    filas[i].style.display = "";
                } else {
                    filas[i].style.display = "none";
                }
            }
        }
    }

    var productoId;

    function abrirModal(id) {
        productoId = id;
        $('#confirmModal').modal('show');
    }

    document.getElementById('confirmarEliminar').onclick = function() {
        window.location.href = "/php/eliminar_producto.php?id=" + productoId;
    }
</script>

<!-- Incluye los archivos JS y CSS de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
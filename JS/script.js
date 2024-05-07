// Ejemplo de solicitud AJAX para obtener datos de la base de datos
$.ajax({
  url: 'consultas.php',
  type: 'GET',
  success: function(data) {
      // Manipular los datos recibidos y actualizar el DOM
      console.log(data);
  },
  error: function(xhr, status, error) {
      // Manejar errores
      console.error(error);
  }
});

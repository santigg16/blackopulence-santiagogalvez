

const camisetas = [
{ nombre: "Camiseta 1", imagen: "/imagenes/CAMISETAS/CATALOGO-CAMISETAS/camiseta1.png", precio: "$20.00" },
{ nombre: "Camiseta 2", imagen: "imagen_camiseta_2.jpg", precio: "$25.00" },
{ nombre: "Camiseta 3", imagen: "imagen_camiseta_3.jpg", precio: "$22.00" },
{ nombre: "Camiseta 4", imagen: "imagen_camiseta_4.jpg", precio: "$30.00" },
{ nombre: "Camiseta 5", imagen: "imagen_camiseta_5.jpg", precio: "$28.00" },
  ];


// Datos de las sudaderas
const sudaderas = [
    { nombre: "Sudadera 1", imagen: "imagen_sudadera_1.jpg", precio: "$40.00" },
    { nombre: "Sudadera 2", imagen: "imagen_sudadera_2.jpg", precio: "$45.00" },
    { nombre: "Sudadera 3", imagen: "imagen_sudadera_3.jpg", precio: "$50.00" },
    { nombre: "Sudadera 4", imagen: "imagen_sudadera_4.jpg", precio: "$35.00" },
    { nombre: "Sudadera 5", imagen: "imagen_sudadera_5.jpg", precio: "$30.00" },
  ];
  
  // Datos de las mochilas
  const mochilas = [
    { nombre: "Mochila 1", imagen: "imagen_mochila_1.jpg", precio: "$60.00" },
    { nombre: "Mochila 2", imagen: "imagen_mochila_2.jpg", precio: "$55.00" },
    { nombre: "Mochila 3", imagen: "imagen_mochila_3.jpg", precio: "$70.00" },
    { nombre: "Mochila 4", imagen: "imagen_mochila_4.jpg", precio: "$65.00" },
    { nombre: "Mochila 5", imagen: "imagen_mochila_5.jpg", precio: "$75.00" },
  ];
  
  // Datos de las gorras
  const gorras = [
    { nombre: "Gorra 1", imagen: "imagen_gorra_1.jpg", precio: "$20.00" },
    { nombre: "Gorra 2", imagen: "imagen_gorra_2.jpg", precio: "$18.00" },
    { nombre: "Gorra 3", imagen: "imagen_gorra_3.jpg", precio: "$22.00" },
    { nombre: "Gorra 4", imagen: "imagen_gorra_4.jpg", precio: "$25.00" },
    { nombre: "Gorra 5", imagen: "imagen_gorra_5.jpg", precio: "$30.00" },
  ];
  
  // Función para renderizar las prendas
  function renderizarPrendas(tipoPrenda, datosPrenda, idCatalogo) {
    const catalogoPrendas = document.getElementById(idCatalogo);
  
    // Limpiar el contenido previo del catálogo
    catalogoPrendas.innerHTML = "";
  
    // Iterar sobre los datos de las prendas y generar el HTML dinámicamente
    datosPrenda.forEach((prenda) => {
      const prendaHTML = `
        <div class="${tipoPrenda.toLowerCase()}">
          <img src="${prenda.imagen}" alt="${prenda.nombre}">
          <h3>${prenda.nombre}</h3>
          <p>${prenda.precio}</p>
        </div>
      `;
      catalogoPrendas.innerHTML += prendaHTML;
    });
  }
  
  // Llamar a la función de renderizado para cada tipo de prenda
  document.addEventListener("DOMContentLoaded", () => {
    renderizarPrendas("CAMISETAS", camisetas, "catalogo-camisetas");
    renderizarPrendas("SUDADERAS", sudaderas, "catalogo-sudaderas");
    renderizarPrendas("MOCHILAS", mochilas, "catalogo-mochilas");
    renderizarPrendas("GORRAS", gorras, "catalogo-gorras");
  });
  
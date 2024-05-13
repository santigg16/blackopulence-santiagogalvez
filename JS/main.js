document.addEventListener('DOMContentLoaded', function() {
  fetch('productos.php')
     .then(response => response.json())
     .then(data => {
          data.forEach(producto => {
              const card = document.createElement('div');
              card.className = 'card';
              card.innerHTML = `
                  <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                  <div class="card-body">
                      <h5 class="card-title">${producto.nombre}</h5>
                      <p class="card-text">${producto.descripcion}</p>
                      <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
              `;
              document.querySelector('#productos').appendChild(card);
          });
      })
     .catch(error => console.error('Error:', error));
});

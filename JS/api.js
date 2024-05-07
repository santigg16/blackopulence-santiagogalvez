// script.js

// Replace 'YOUR_API_KEY' with your actual Printful API key
const API_KEY = 'YOUR_API_KEY';

// Function to fetch products from Printful API
async function fetchProducts() {
    try {
        const response = await axios.get('https://api.printful.com/', {
            headers: {
                'Authorization': `Bearer ${API_KEY}`
            }
        });
        return response.data.result;
    } catch (error) {
        console.error('Error fetching products:', error);
        return [];
    }
}

// Function to display products on the page
function displayProducts(products) {
    const productsContainer = document.getElementById('products-container');
    products.forEach(product => {
        const productElement = document.createElement('div');
        productElement.innerHTML = `
            <h2>${product.name}</h2>
            <img src="${product.thumbnail_url}" alt="${product.name}">
            <p>${product.description}</p>
            <p>Price: $${product.price}</p>
        `;
        productsContainer.appendChild(productElement);
    });
}

// Fetch products and display them on page load
window.addEventListener('load', async () => {
    const products = await fetchProducts();
    displayProducts(products);
});

document.addEventListener('DOMContentLoaded', function () {
    console.log("Website Ready!");

    // Fungsi untuk mengambil data produk dari server dan menampilkannya
    const loadProducts = async () => {
        try {
            // Ambil data produk dari server (endpoint GET)
            const response = await fetch('../php/product.php');
            const products = await response.json();

            // Ambil elemen container untuk menampilkan produk
            const productsContainer = document.getElementById('products-container');

            // Looping melalui produk dan menampilkannya di HTML
            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
                    <img src="../images/${product.image}" alt="${product.name}" style="max-width:100px; max-height:100px;">
                    <h3>${product.name}</h3>
                    <p>Harga: Rp${product.price}</p>
                    <p><strong>Deskripsi:</strong> ${product.description}</p>
                    <button onclick="likeProduct(${product.id})">Like</button>
                    <button onclick="checkoutProduct(${product.id})">Checkout</button>
                `;
                productsContainer.appendChild(productCard);
            });
        } catch (error) {
            console.error('Error loading products:', error);
        }
    };

    // Panggil fungsi untuk memuat produk saat halaman dimuat
    loadProducts();
});

// Fitur Like produk
let likedProducts = [];

const likeProduct = (productId) => {
    // Cek apakah produk sudah disukai
    if (likedProducts.includes(productId)) {
        alert("Produk sudah disukai!");
    } else {
        likedProducts.push(productId);
        alert("Produk disukai!");
    }
};

// Fitur Checkout
const checkoutProduct = (productId) => {
    alert(`Anda memilih produk ID: ${productId} untuk checkout!`);
    // Anda bisa melanjutkan ke halaman checkout atau menyimpan produk yang dipilih untuk proses checkout
    // Misalnya, redirect ke halaman checkout dengan produk yang dipilih
    // window.location.href = 'checkout.html';
};

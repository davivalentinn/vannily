// Dados dos produtos
const products_destaque_products = [
    {
        title: "Ticket to Ride",
        description: "Ticket to Ride é uma aventura de trem rail através dos Estados Unidos e Canadá, onde alguns velhos amigos se reuniram para celebrar a aposta ousada e lucrativa de Fogg. A nova aposta onde é tudo ou nada, com objetivo de ver quem consegue viajar de trem pelo maior número de cidades nos EUA em apenas 7 dias.",
        price: "R$ 329,99",
        originalPrice: "R$ 399,99",
        installments: "ou 6x de 54,99 sem juros",
        image: "../assets/images/destaque-board-games/ticket-to-ride.png"
    },
    {
        title: "Kelp",
        description: "Kelp é um jogo de estratégia marinha onde os jogadores competem para criar o ecossistema submarino mais próspero. Cultive algas marinhas, gerencie recursos e proteja seu habitat contra predadores e poluição.",
        price: "R$ 259,90",
        originalPrice: "R$ 299,90",
        installments: "ou 5x de 51,98 sem juros",
        image: "../assets/images/destaque-board-games/kelp.png"
    },
    {
        title: "Coup",
        description: "Você é um chefe de uma família em uma cidade-estado italiana administrada por uma corte fraca, corrupta e repleta de intrigas. Você está tentando controlar a cidade através de manipulação, blefe e suborno para chegar ao poder. Seu objetivo é destruir a influência de todas as outras famílias forçando-as ao exílio. Apenas uma família sobreviverá.",
        price: "R$ 104,90",
        originalPrice: "R$ 129,90",
        installments: "ou 2x de 58,32 sem juros",
        image: "../assets/images/destaque-board-games/coup.jpg"
    },
    {
        title: "Marvel United",
        description: "Em Marvel United, os jogadores assumem o papel de super-heróis icônicos e unem forças para derrotar vilões poderosos. Um jogo cooperativo com miniaturas de alta qualidade e mecânicas únicas que trazem o universo Marvel para sua mesa.",
        price: "R$ 289,90",
        originalPrice: "R$ 349,90",
        installments: "ou 5x de 57,98 sem juros",
        image: "../assets/images/destaque-board-games/marvel-united.png"
    }
];

// Elementos do DOM
const prevButton_destaque_products = document.querySelector('.nav-button-prev-destaque-products');
const nextButton_destaque_products = document.querySelector('.nav-button-next-destaque-products');
const prevImage_destaque_products = document.getElementById('prev-image-destaque-products').querySelector('img');
const currentImage_destaque_products = document.getElementById('current-image-destaque-products').querySelector('img');
const nextImage_destaque_products = document.getElementById('next-image-destaque-products').querySelector('img');
const productTitle_destaque_products = document.getElementById('product-title-destaque-products');
const productDescription_destaque_products = document.getElementById('product-description-destaque-products');
const productPrice_destaque_products = document.getElementById('product-price-destaque-products');
const productInstallments_destaque_products = document.getElementById('product-installments-destaque-products');

// Estado atual
let currentIndex_destaque_products = 0;
const totalProducts_destaque_products = products_destaque_products.length;

// Atualizar informações do produto
function updateProductInfo_destaque_products(index) {
    const product_destaque_products = products_destaque_products[index];
    productTitle_destaque_products.textContent = product_destaque_products.title;
    productDescription_destaque_products.textContent = product_destaque_products.description;
    productPrice_destaque_products.innerHTML = `${product_destaque_products.price} <span class="product-original-price-destaque-products">${product_destaque_products.originalPrice}</span>`;
    productInstallments_destaque_products.textContent = product_destaque_products.installments;
}

// Atualizar as imagens do carrossel
function updateCarouselImages_destaque_products() {
    const prevIndex = (currentIndex_destaque_products - 1 + totalProducts_destaque_products) % totalProducts_destaque_products;
    const nextIndex = (currentIndex_destaque_products + 1) % totalProducts_destaque_products;
    
    prevImage_destaque_products.src = products_destaque_products[prevIndex].image;
    prevImage_destaque_products.alt = products_destaque_products[prevIndex].title;
    
    currentImage_destaque_products.src = products_destaque_products[currentIndex_destaque_products].image;
    currentImage_destaque_products.alt = products_destaque_products[currentIndex_destaque_products].title;
    
    nextImage_destaque_products.src = products_destaque_products[nextIndex].image;
    nextImage_destaque_products.alt = products_destaque_products[nextIndex].title;
}

// Manipuladores de eventos
prevButton_destaque_products.addEventListener('click', () => {
    currentIndex_destaque_products = (currentIndex_destaque_products - 1 + totalProducts_destaque_products) % totalProducts_destaque_products;
    updateCarouselImages_destaque_products();
    updateProductInfo_destaque_products(currentIndex_destaque_products);
});

nextButton_destaque_products.addEventListener('click', () => {
    currentIndex_destaque_products = (currentIndex_destaque_products + 1) % totalProducts_destaque_products;
    updateCarouselImages_destaque_products();
    updateProductInfo_destaque_products(currentIndex_destaque_products);
});

// Inicializar
updateProductInfo_destaque_products(currentIndex_destaque_products);
updateCarouselImages_destaque_products();
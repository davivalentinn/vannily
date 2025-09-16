document.addEventListener('DOMContentLoaded', function () {
    const productForm = document.getElementById('productForm');
    const productId = document.getElementById('productId');
    const productName = document.getElementById('productName');
    const productPrice = document.getElementById('productPrice');
    const productCategory = document.getElementById('productCategory');
    const productDescription = document.getElementById('productDescription');
    const productStock = document.getElementById('productStock');

    const jogosFields = document.getElementById('jogosFields');
    const gameType = document.getElementById('gameType');
    const players = document.getElementById('players');
    const gameTime = document.getElementById('gameTime');

    const roupasFields = document.getElementById('roupasFields');
    const clothingType = document.getElementById('clothingType');
    const size = document.getElementById('size');
    const color = document.getElementById('color');

    const cartasFields = document.getElementById('cartasFields');
    const tabuleiroFields = document.getElementById('tabuleiroFields');
    const camisaFields = document.getElementById('camisaFields');
    const moletomFields = document.getElementById('moletomFields');

    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const productsTableBody = document.getElementById('productsTableBody');

    let products = JSON.parse(localStorage.getItem('products')) || [];

    function hideAllFields() {
        jogosFields.classList.add('hidden');
        roupasFields.classList.add('hidden');
        cartasFields?.classList.add('hidden');
        tabuleiroFields?.classList.add('hidden');
        camisaFields?.classList.add('hidden');
        moletomFields?.classList.add('hidden');
    }

    function showSubfields() {
        if (productCategory.value === 'jogos') {
            if (gameType.value === 'cartas') {
                cartasFields?.classList.remove('hidden');
                tabuleiroFields?.classList.add('hidden');
            } else if (gameType.value === 'tabuleiro') {
                tabuleiroFields?.classList.remove('hidden');
                cartasFields?.classList.add('hidden');
            }
        } else if (productCategory.value === 'roupas') {
            if (clothingType.value === 'camisa') {
                camisaFields?.classList.remove('hidden');
                moletomFields?.classList.add('hidden');
            } else if (clothingType.value === 'moletom') {
                moletomFields?.classList.remove('hidden');
                camisaFields?.classList.add('hidden');
            }
        }
    }

    productCategory.addEventListener('change', function () {
        hideAllFields();
        if (this.value === 'jogos') {
            jogosFields.classList.remove('hidden');
            showSubfields();
        } else if (this.value === 'roupas') {
            roupasFields.classList.remove('hidden');
            showSubfields();
        }
    });

    gameType.addEventListener('change', showSubfields);
    clothingType.addEventListener('change', showSubfields);

    // productForm.addEventListener('submit', function (e) {
    //     e.preventDefault();

    //     const productData = {
    //         id: productId.value || Date.now().toString(),
    //         name: productName.value,
    //         price: parseFloat(productPrice.value),
    //         category: productCategory.value,
    //         description: productDescription.value,
    //         stock: parseInt(productStock.value),
    //         details: {}
    //     };

    //     if (productCategory.value === 'jogos') {
    //         productData.details = {
    //             type: gameType.value,
    //             players: players.value,
    //             gameTime: gameTime.value
    //         };
    //     } else if (productCategory.value === 'roupas') {
    //         productData.details = {
    //             type: clothingType.value,
    //             size: size.value,
    //             color: color.value
    //         };
    //     }

    //     const existingIndex = products.findIndex(p => p.id === productData.id);
    //     if (existingIndex >= 0) {
    //         products[existingIndex] = productData;
    //         saveBtn.textContent = 'Adicionar Produto';
    //         cancelBtn.classList.add('hidden');
    //     } else {
    //         products.push(productData);
    //     }

    //     localStorage.setItem('products', JSON.stringify(products));
    //     productForm.reset();
    //     productId.value = '';
    //     hideAllFields();
    //     renderProducts();
    // });

    // cancelBtn.addEventListener('click', function () {
    //     productForm.reset();
    //     productId.value = '';
    //     saveBtn.textContent = 'Adicionar Produto';
    //     cancelBtn.classList.add('hidden');
    //     hideAllFields();
    // });

    // function renderProducts() {
    //     productsTableBody.innerHTML = '';
    //     if (products.length === 0) {
    //         productsTableBody.innerHTML = '<tr><td colspan="6">Nenhum produto cadastrado</td></tr>';
    //         return;
    //     }

    //     products.forEach(product => {
    //         const row = document.createElement('tr');
    //         let typeDisplay = '';
    //         if (product.category === 'jogos') {
    //             typeDisplay = product.details.type === 'tabuleiro' ? 'Tabuleiro' : 'Cartas';
    //         } else if (product.category === 'roupas') {
    //             typeDisplay = product.details.type === 'camisa' ? 'Camisa' : 'Moletom';
    //         }

    //         row.innerHTML = `
    //             <td>${product.name}</td>
    //             <td>R$ ${product.price.toFixed(2)}</td>
    //             <td>${product.category === 'jogos' ? 'Jogos' : 'Roupas'}</td>
    //             <td>${typeDisplay}</td>
    //             <td>${product.stock}</td>
    //             <td class="actions">
    //                 <button class="btn btn-secondary" onclick="editProduct('${product.id}')">Editar</button>
    //                 <button class="btn btn-danger" onclick="deleteProduct('${product.id}')">Excluir</button>
    //             </td>
    //         `;
    //         productsTableBody.appendChild(row);
    //     });
    // }

    // window.editProduct = function (id) {
    //     const product = products.find(p => p.id === id);
    //     if (!product) return;

    //     productId.value = product.id;
    //     productName.value = product.name;
    //     productPrice.value = product.price;
    //     productCategory.value = product.category;
    //     productDescription.value = product.description;
    //     productStock.value = product.stock;

    //     if (product.category === 'jogos') {
    //         jogosFields.classList.remove('hidden');
    //         gameType.value = product.details.type;
    //         players.value = product.details.players || '';
    //         gameTime.value = product.details.gameTime || '';
    //     } else if (product.category === 'roupas') {
    //         roupasFields.classList.remove('hidden');
    //         clothingType.value = product.details.type;
    //         size.value = product.details.size || 'M';
    //         color.value = product.details.color || '';
    //     }

    //     showSubfields();
    //     saveBtn.textContent = 'Atualizar Produto';
    //     cancelBtn.classList.remove('hidden');
    //     productForm.scrollIntoView({ behavior: 'smooth' });
    // };

    window.deleteProduct = function (id) {
        if (confirm('Tem certeza que deseja excluir este produto?')) {
            products = products.filter(p => p.id !== id);
            localStorage.setItem('products', JSON.stringify(products));
            renderProducts();
        }
    };

    renderProducts();
});

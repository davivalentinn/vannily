document.addEventListener('DOMContentLoaded', function() {
    // Elementos do formulário
    const productForm = document.getElementById('productForm');
    const productId = document.getElementById('productId');
    const productName = document.getElementById('productName');
    const productPrice = document.getElementById('productPrice');
    const productCategory = document.getElementById('productCategory');
    const productDescription = document.getElementById('productDescription');
    const productStock = document.getElementById('productStock');
    
    // Campos específicos de categoria
    const jogosFields = document.getElementById('jogosFields');
    const gameType = document.getElementById('gameType');
    const players = document.getElementById('players');
    const gameTime = document.getElementById('gameTime');
    
    const roupasFields = document.getElementById('roupasFields');
    const clothingType = document.getElementById('clothingType');
    const size = document.getElementById('size');
    const color = document.getElementById('color');
    
    // Botões
    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    
    // Tabela de produtos
    const productsTableBody = document.getElementById('productsTableBody');
    
    // Array para armazenar os produtos
    let products = JSON.parse(localStorage.getItem('products')) || [];
    
    // Mostrar/ocultar campos específicos da categoria
    productCategory.addEventListener('change', function() {
        jogosFields.classList.add('hidden');
        roupasFields.classList.add('hidden');
        
        if (this.value === 'jogos') {
            jogosFields.classList.remove('hidden');
        } else if (this.value === 'roupas') {
            roupasFields.classList.remove('hidden');
        }
    });
    
    // Salvar produto (adicionar ou editar)
    productForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const productData = {
            id: productId.value || Date.now().toString(),
            name: productName.value,
            price: parseFloat(productPrice.value),
            category: productCategory.value,
            description: productDescription.value,
            stock: parseInt(productStock.value),
            details: {}
        };
        
        if (productCategory.value === 'jogos') {
            productData.details = {
                type: gameType.value,
                players: players.value,
                gameTime: gameTime.value
            };
        } else if (productCategory.value === 'roupas') {
            productData.details = {
                type: clothingType.value,
                size: size.value,
                color: color.value
            };
        }
        
        // Verificar se é edição ou novo produto
        const existingIndex = products.findIndex(p => p.id === productData.id);
        
        if (existingIndex >= 0) {
            // Editar produto existente
            products[existingIndex] = productData;
            saveBtn.textContent = 'Adicionar Produto';
            cancelBtn.classList.add('hidden');
        } else {
            // Adicionar novo produto
            products.push(productData);
        }
        
        // Salvar no localStorage
        localStorage.setItem('products', JSON.stringify(products));
        
        // Limpar formulário e atualizar tabela
        productForm.reset();
        productId.value = '';
        jogosFields.classList.add('hidden');
        roupasFields.classList.add('hidden');
        renderProducts();
    });
    
    // Cancelar edição
    cancelBtn.addEventListener('click', function() {
        productForm.reset();
        productId.value = '';
        saveBtn.textContent = 'Adicionar Produto';
        cancelBtn.classList.add('hidden');
        jogosFields.classList.add('hidden');
        roupasFields.classList.add('hidden');
    });
    
    // Renderizar produtos na tabela
    function renderProducts() {
        productsTableBody.innerHTML = '';
        
        if (products.length === 0) {
            productsTableBody.innerHTML = '<tr><td colspan="6">Nenhum produto cadastrado</td></tr>';
            return;
        }
        
        products.forEach(product => {
            const row = document.createElement('tr');
            
            // Determinar o tipo específico para exibição
            let typeDisplay = '';
            if (product.category === 'jogos') {
                typeDisplay = product.details.type === 'tabuleiro' ? 'Tabuleiro' : 'Cartas';
            } else if (product.category === 'roupas') {
                typeDisplay = product.details.type === 'camisa' ? 'Camisa' : 'Moletom';
            }
            
            row.innerHTML = `
                <td>${product.name}</td>
                <td>R$ ${product.price.toFixed(2)}</td>
                <td>${product.category === 'jogos' ? 'Jogos' : 'Roupas'}</td>
                <td>${typeDisplay}</td>
                <td>${product.stock}</td>
                <td class="actions">
                    <button class="btn btn-secondary" onclick="editProduct('${product.id}')">Editar</button>
                    <button class="btn btn-danger" onclick="deleteProduct('${product.id}')">Excluir</button>
                </td>
            `;
            
            productsTableBody.appendChild(row);
        });
    }
    
    // Função para editar produto
    window.editProduct = function(id) {
        const product = products.find(p => p.id === id);
        if (!product) return;
        
        // Preencher formulário com os dados do produto
        productId.value = product.id;
        productName.value = product.name;
        productPrice.value = product.price;
        productCategory.value = product.category;
        productDescription.value = product.description;
        productStock.value = product.stock;
        
        // Preencher campos específicos da categoria
        if (product.category === 'jogos') {
            jogosFields.classList.remove('hidden');
            gameType.value = product.details.type;
            players.value = product.details.players || '';
            gameTime.value = product.details.gameTime || '';
        } else if (product.category === 'roupas') {
            roupasFields.classList.remove('hidden');
            clothingType.value = product.details.type;
            size.value = product.details.size || 'M';
            color.value = product.details.color || '';
        }
        
        // Alterar texto do botão e mostrar botão de cancelar
        saveBtn.textContent = 'Atualizar Produto';
        cancelBtn.classList.remove('hidden');
        
        // Rolagem suave para o formulário
        productForm.scrollIntoView({ behavior: 'smooth' });
    };
    
    // Função para excluir produto
    window.deleteProduct = function(id) {
        if (confirm('Tem certeza que deseja excluir este produto?')) {
            products = products.filter(p => p.id !== id);
            localStorage.setItem('products', JSON.stringify(products));
            renderProducts();
        }
    };
    
    // Renderizar produtos ao carregar a página
    renderProducts();
});
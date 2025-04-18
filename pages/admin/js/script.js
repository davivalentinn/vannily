document.addEventListener('DOMContentLoaded', function() {
    // Elementos da interface
    const botaoGrade = document.getElementById('grid-view');
    const botaoLista = document.getElementById('list-view');
    const gradeProdutos = document.getElementById('products-grid');
    const tabelaProdutos = document.getElementById('products-table');
    const modal = document.getElementById('product-modal');
    const botaoFecharModal = document.getElementById('close-modal');
    const conteudoModal = document.getElementById('product-detail');
    const formularioFiltros = document.querySelector('.filters-section');
    const filtroCategoria = document.getElementById('category');
    const areaFiltrosDinamicos = document.getElementById('dynamic-filters');
    const botaoAplicarFiltros = document.querySelector('.apply-filters');
    const campoBusca = document.querySelector('.search-bar input');
    const botoesFiltroRapido = document.querySelectorAll('.filter-btn');

    // Alternar entre visualização em grade e lista
    botaoGrade.addEventListener('click', function() {
        this.classList.add('active');
        botaoLista.classList.remove('active');
        gradeProdutos.style.display = 'grid';
        tabelaProdutos.style.display = 'none';
    });

    botaoLista.addEventListener('click', function() {
        this.classList.add('active');
        botaoGrade.classList.remove('active');
        gradeProdutos.style.display = 'none';
        tabelaProdutos.style.display = 'table';
    });

    // Modal de detalhes do produto
    function abrirModalProduto(produtoId) {
        // Esta função será implementada quando houver integração com o backend
        console.log('Abrindo modal para o produto ID:', produtoId);
        modal.style.display = 'flex';
    }

    botaoFecharModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Fechar modal ao clicar fora do conteúdo
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Filtros dinâmicos baseados na categoria selecionada
    filtroCategoria.addEventListener('change', function() {
        const categoriaSelecionada = this.value;
        areaFiltrosDinamicos.innerHTML = '';

        if (categoriaSelecionada === 'jogos') {
            areaFiltrosDinamicos.innerHTML = `
                <div class="filter-group">
                    <label for="complexidade">Complexidade</label>
                    <select id="complexidade">
                        <option value="">Qualquer</option>
                        <option value="1">Iniciante</option>
                        <option value="2">Intermediário</option>
                        <option value="3">Avançado</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="jogadores">Número de Jogadores</label>
                    <select id="jogadores">
                        <option value="">Qualquer</option>
                        <option value="1-2">1-2</option>
                        <option value="2-4">2-4</option>
                        <option value="4+">4+</option>
                    </select>
                </div>
            `;
        } else if (categoriaSelecionada === 'roupas') {
            areaFiltrosDinamicos.innerHTML = `
                <div class="filter-group">
                    <label for="tamanho">Tamanho</label>
                    <select id="tamanho">
                        <option value="">Qualquer</option>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="cor">Cor</label>
                    <select id="cor">
                        <option value="">Qualquer</option>
                        <option value="preto">Preto</option>
                        <option value="branco">Branco</option>
                        <option value="azul">Azul</option>
                        <option value="vermelho">Vermelho</option>
                    </select>
                </div>
            `;
        }
    });

    // Aplicar filtros
    botaoAplicarFiltros.addEventListener('click', function(e) {
        e.preventDefault();
        const filtros = obterFiltrosSelecionados();
        console.log('Filtros aplicados:', filtros);
        // Aqui seria feita uma requisição AJAX para buscar os produtos filtrados
    });

    function obterFiltrosSelecionados() {
        return {
            categoria: filtroCategoria.value,
            subcategoria: document.getElementById('subcategory').value,
            precoMin: document.getElementById('min-price').value,
            precoMax: document.getElementById('max-price').value,
            estoque: document.getElementById('stock').value,
            complexidade: document.getElementById('complexidade')?.value,
            jogadores: document.getElementById('jogadores')?.value,
            tamanho: document.getElementById('tamanho')?.value,
            cor: document.getElementById('cor')?.value
        };
    }

    // Busca rápida
    campoBusca.addEventListener('input', function() {
        const termoBusca = this.value.toLowerCase();
        console.log('Buscando por:', termoBusca);
        // Aqui seria feita a filtragem dos produtos ou uma requisição AJAX
    });

    // Filtros rápidos
    botoesFiltroRapido.forEach(botao => {
        botao.addEventListener('click', function() {
            const filtro = this.textContent.trim();
            console.log('Filtro rápido aplicado:', filtro);
            // Aqui seria aplicado o filtro rápido correspondente
        });
    });

    // Inicializar gráficos
    function inicializarGraficos() {
        // Gráfico de distribuição por categoria
        const graficoCategoria = new Chart(
            document.getElementById('categoryChart').getContext('2d'),
            {
                type: 'doughnut',
                data: {
                    labels: ['Jogos', 'Roupas'],
                    datasets: [{
                        data: [0, 0], // Será atualizado via AJAX
                        backgroundColor: ['#1E8449', '#8E44AD'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            }
        );

        // Gráfico de distribuição por subcategoria
        const graficoSubcategoria = new Chart(
            document.getElementById('subcategoryChart').getContext('2d'),
            {
                type: 'bar',
                data: {
                    labels: ['Jogos de Cartas', 'Jogos de Tabuleiro', 'Camisas', 'Moletons'],
                    datasets: [{
                        label: 'Quantidade',
                        data: [0, 0, 0, 0], // Será atualizado via AJAX
                        backgroundColor: ['#1E8449', '#27AE60', '#8E44AD', '#9B59B6'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            }
        );

        // Funções para atualizar os gráficos (serão chamadas via AJAX)
        window.atualizarGraficoCategoria = function(dados) {
            graficoCategoria.data.datasets[0].data = dados;
            graficoCategoria.update();
        };

        window.atualizarGraficoSubcategoria = function(dados) {
            graficoSubcategoria.data.datasets[0].data = dados;
            graficoSubcategoria.update();
        };
    }

    // Inicializar a dashboard
    inicializarGraficos();

    // Função para carregar produtos (será implementada com AJAX)
    function carregarProdutos() {
        console.log('Carregando produtos...');
        // Esta função faria uma requisição AJAX para buscar os produtos
    }

    // Chamada inicial para carregar os produtos
    carregarProdutos();

    // Exemplo de como os produtos seriam renderizados
    function renderizarProdutos(produtos) {
        // Limpar grade e tabela
        gradeProdutos.innerHTML = '';
        const corpoTabela = tabelaProdutos.querySelector('tbody');
        corpoTabela.innerHTML = '';

        // Esta função seria implementada quando houver integração com o backend
        console.log('Renderizando produtos:', produtos);
    }
});
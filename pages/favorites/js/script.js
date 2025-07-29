document.addEventListener('DOMContentLoaded', () => {
    const gridBtn = document.querySelector('.ri-grid-fill');
    const listBtn = document.querySelector('.ri-menu-line');
    const caixaProdutos = document.querySelector('.display-grid');
    const produtos = document.querySelectorAll('.produto');
  
    // Alternância entre visualização em grade e lista
    gridBtn.addEventListener('click', () => {
        caixaProdutos.classList.add('grid-view');
        caixaProdutos.classList.remove('list-view');
        produtos.forEach(produto => {
            produto.classList.add('compacto');
        });
    });
  
    listBtn.addEventListener('click', () => {
        caixaProdutos.classList.add('list-view');
        caixaProdutos.classList.remove('grid-view');
        produtos.forEach(produto => {
            produto.classList.remove('compacto');
        });
    });
  
    // --- FUNCIONALIDADE DE BUSCAR NOS FAVORITOS ---
    const campoBusca = document.querySelector('.campo-busca');
    campoBusca.addEventListener('input', () => {
      const termo = campoBusca.value.trim().toLowerCase();
  
      produtos.forEach(produto => {
        const titulo = produto.querySelector('.titulo-produto').textContent.toLowerCase();
        if (titulo.includes(termo)) {
          produto.parentElement.style.display = 'flex'; // Exibe a caixa-produtos
        } else {
          produto.parentElement.style.display = 'none'; // Oculta a caixa-produtos
        }
      });
    });
  });
  
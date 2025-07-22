document.addEventListener('DOMContentLoaded', () => {
  const gridBtn = document.querySelector('.ri-grid-fill');
  const listBtn = document.querySelector('.ri-menu-line');
  const caixaProdutos = document.querySelector('.display-grid');
  const produtos = document.querySelectorAll('.produto');

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
});

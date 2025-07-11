//Modificador do Grid
document.addEventListener('DOMContentLoaded', () => {
    const gridBtn = document.querySelector('.ri-grid-fill');
    const listBtn = document.querySelector('.ri-menu-line');
    const caixaProdutos = document.querySelector('.caixa-produtos');

    gridBtn.addEventListener('click', () => {
      caixaProdutos.classList.add('grid-view');
      caixaProdutos.classList.remove('list-view');
    });

    listBtn.addEventListener('click', () => {
      caixaProdutos.classList.add('list-view');
      caixaProdutos.classList.remove('grid-view');
    });
  });
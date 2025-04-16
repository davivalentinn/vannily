class ProductSlider {
    constructor(container) {
      this.container = container;
      this.sliderWrapper = container.querySelector('.slider-wrapper');
      this.currentPageEl = container.querySelector('.current-page');
      this.totalPagesEl = container.querySelector('.total-pages');
      this.prevBtn = container.querySelector('.prev-btn');
      this.nextBtn = container.querySelector('.next-btn');
      this.productGroups = container.querySelectorAll('.product-group');
  
      this.totalPages = this.productGroups.length;
      this.currentPage = 1;
  
      this.init();
    }
  
    updatePagination() {
      this.currentPageEl.textContent = String(this.currentPage).padStart(2, '0');
      this.totalPagesEl.textContent = String(this.totalPages).padStart(2, '0');
    }
  
    updateSliderPosition() {
      const offsetX = (this.currentPage - 1) * 50; // Usa 100% para cada grupo
      this.sliderWrapper.style.transform = `translateX(-${offsetX}%)`;
    }
  
    addEventListeners() {
      this.prevBtn.addEventListener('click', () => {
        this.currentPage = this.currentPage > 1 ? this.currentPage - 1 : this.totalPages;
        this.updatePagination();
        this.updateSliderPosition();
      });
  
      this.nextBtn.addEventListener('click', () => {
        this.currentPage = this.currentPage < this.totalPages ? this.currentPage + 1 : 1;
        this.updatePagination();
        this.updateSliderPosition();
      });
  
      window.addEventListener('resize', () => this.updateSliderPosition());
    }
  
    init() {
      this.updatePagination();
      this.updateSliderPosition();
      this.addEventListeners();
    }
  }
  
  // Inicializa para todos os sliders da página
  document.querySelectorAll('.container-products').forEach(container => {
    new ProductSlider(container);
  });
  
// Variáveis para o slider
const productsSlider = {
    currentPage: 1,
    totalPages: 2, // Número total de grupos de produtos
    sliderWrapper: document.getElementById('slider-wrapper'),
    currentPageEl: document.getElementById('current-page'),
    totalPagesEl: document.getElementById('total-pages'),
    prevBtn: document.getElementById('prev-btn'),
    nextBtn: document.getElementById('next-btn'),
    
    init: function() {
        this.updatePagination();
        this.attachEventListeners();
        this.updateSliderPosition();
        
        // Adiciona listener para redimensionamento da tela
        window.addEventListener('resize', () => {
            this.updateSliderPosition();
        });
    },
    
    updatePagination: function() {
        // Formata o número da página para ter sempre 2 dígitos
        this.currentPageEl.textContent = String(this.currentPage).padStart(2, '0');
        this.totalPagesEl.textContent = String(this.totalPages).padStart(2, '0');
    },
    
    attachEventListeners: function() {
        this.prevBtn.addEventListener('click', () => this.goToPrevPage());
        this.nextBtn.addEventListener('click', () => this.goToNextPage());
    },
    
    goToPrevPage: function() {
        if (this.currentPage > 1) {
            this.currentPage--;
        } else {
            this.currentPage = this.totalPages;
        }
        this.updatePagination();
        this.updateSliderPosition();
    },
    
    goToNextPage: function() {
        if (this.currentPage < this.totalPages) {
            this.currentPage++;
        } else {
            this.currentPage = 1;
        }
        this.updatePagination();
        this.updateSliderPosition();
    },
    
    updateSliderPosition: function() {
        const offsetX = (this.currentPage - 1) * 50; // 50% da largura do wrapper
        this.sliderWrapper.style.transform = `translateX(-${offsetX}%)`;
    }
};

// Inicializar o slider quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    productsSlider.init();
});
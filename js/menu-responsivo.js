 // Variáveis específicas para evitar conflitos
        const menuHamburgerToggleBtn = document.getElementById('menuHamburgerToggleBtn');
        const menuDropdownContent = document.getElementById('menuDropdownContent');
        const menuHamburgerIcon = document.getElementById('menuHamburgerIcon');

        // Toggle do menu hambúrguer
        menuHamburgerToggleBtn.addEventListener('click', function() {
            menuDropdownContent.classList.toggle('show-dropdown');
            
            // Muda o ícone
            if (menuDropdownContent.classList.contains('show-dropdown')) {
                menuHamburgerIcon.className = 'ri-close-line';
            } else {
                menuHamburgerIcon.className = 'ri-menu-line';
            }
        });

        // Fecha o menu ao clicar fora
        document.addEventListener('click', function(event) {
            if (!menuDropdownContent.contains(event.target) && !menuHamburgerToggleBtn.contains(event.target)) {
                menuDropdownContent.classList.remove('show-dropdown');
                menuHamburgerIcon.className = 'ri-menu-line';
            }
        });

        // Função para o menu do usuário (mantendo a original)
        function toggleMenuUser() {
            const subMenuUser = document.getElementById('subMenuUser');
            subMenuUser.classList.toggle('open-menu');
        }

        // Fecha menu do usuário ao clicar fora
        document.addEventListener('click', function(event) {
            const userButton = document.getElementById('userAccountButton');
            const subMenuUser = document.getElementById('subMenuUser');
            
            if (!userButton.contains(event.target)) {
                subMenuUser.classList.remove('open-menu');
            }
        });
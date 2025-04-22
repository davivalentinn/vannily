<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404 - Acesso Negado | Vannily</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #353535;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background-color: rgba(139, 22, 137, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 650px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(139, 22, 137, 0.2);
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(139, 22, 137, 0.1);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(139, 22, 137, 0.3);
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #8B1689;
            line-height: 1;
            margin-bottom: 20px;
            position: relative;
            text-shadow: 3px 3px 0 rgba(139, 22, 137, 0.2);
            transition: transform 0.3s ease;
        }
        
        .error-code:hover {
            transform: scale(1.05);
        }

        .glitch-animation {
            animation: glitch 1s infinite;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #8B1689;
        }

        p {
            margin-bottom: 25px;
            line-height: 1.6;
            color: #353535;
            font-size: 16px;
            font-weight: 400;
        }

        .security-icon {
            font-size: 60px;
            margin-bottom: 20px;
            color: #8B1689;
            transition: transform 0.5s ease;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        .return-link {
            display: inline-block;
            margin-top: 30px;
            color: #353535;
            text-decoration: none;
            font-weight: 500;
            padding: 12px 25px;
            border: 2px solid #8B1689;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .return-link:before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: #8B1689;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .return-link:hover {
            color: #ffffff;
        }

        .return-link:hover:before {
            left: 0;
        }

        .decorative-line {
            height: 3px;
            width: 50%;
            margin: 20px auto;
            background: linear-gradient(90deg, transparent, #8B1689, transparent);
        }

        .restricted-area {
            margin-top: 20px;
            padding: 15px;
            border: 1px dashed #8B1689;
            display: inline-block;
            border-radius: 5px;
            position: relative;
            transition: all 0.3s ease;
        }

        .restricted-area:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(139, 22, 137, 0.2);
        }

        .restricted-area::before, .restricted-area::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #8B1689;
            opacity: 0.5;
        }

        .restricted-area::before {
            top: -5px;
            left: -5px;
            border-right: none;
            border-bottom: none;
        }

        .restricted-area::after {
            bottom: -5px;
            right: -5px;
            border-left: none;
            border-top: none;
        }

        .animated-text span {
            display: inline-block;
            animation: bounce 1s infinite;
            animation-delay: calc(0.1s * var(--i));
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes glitch {
            0% {
                text-shadow: 3px 3px 0 rgba(139, 22, 137, 0.2);
            }
            25% {
                text-shadow: -3px -3px 0 rgba(139, 22, 137, 0.4);
            }
            50% {
                text-shadow: 3px -3px 0 rgba(139, 22, 137, 0.2);
            }
            75% {
                text-shadow: -3px 3px 0 rgba(139, 22, 137, 0.4);
            }
            100% {
                text-shadow: 3px 3px 0 rgba(139, 22, 137, 0.2);
            }
        }

        .scanner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, transparent, #8B1689, transparent);
            animation: scanning 3s linear infinite;
            opacity: 0;
        }

        @keyframes scanning {
            0% {
                top: 0;
                opacity: 0.8;
            }
            50% {
                top: 100%;
                opacity: 0.5;
            }
            100% {
                top: 0;
                opacity: 0.8;
            }
        }

        .message-box {
            margin-top: 20px;
            position: relative;
            padding: 15px;
            background-color: rgba(139, 22, 137, 0.05);
            border-radius: 5px;
            transform-origin: center;
            transform: perspective(800px) rotateX(0deg);
            transition: transform 0.5s ease;
        }

        .message-box:hover {
            transform: perspective(800px) rotateX(5deg);
        }

        .hover-effect {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .hover-effect:hover {
            color: #8B1689;
            font-weight: 600;
        }

        #counter {
            font-size: 18px;
            font-weight: 600;
            margin-top: 20px;
            color: #8B1689;
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    <div class="container" id="errorContainer">
        <div class="scanner" id="scanner"></div>
        <div class="error-code" id="errorCode">404</div>
        <i class="fas fa-lock security-icon pulse" id="securityIcon"></i>
        <h1>Acesso Negado</h1>
        <div class="decorative-line"></div>
        <p>Esta página é exclusiva para administradores da Vannily!</p>
        
        <div class="restricted-area">
            <div class="animated-text">
                <span style="--i:1">Á</span>
                <span style="--i:2">r</span>
                <span style="--i:3">e</span>
                <span style="--i:4">a</span>
                <span style="--i:5">&nbsp;</span>
                <span style="--i:6">R</span>
                <span style="--i:7">e</span>
                <span style="--i:8">s</span>
                <span style="--i:9">t</span>
                <span style="--i:10">r</span>
                <span style="--i:11">i</span>
                <span style="--i:12">t</span>
                <span style="--i:13">a</span>
            </div>
        </div>

        <div class="message-box">
            <p>Você não tem permissão para acessar este conteúdo. Por favor, entre em contato com um administrador se precisar de acesso.</p>
        </div>
        
        <div id="counter">Você será redirecionado em <span id="countdown">10</span> segundos</div>
        
        <a href="../../index.php" class="return-link" id="return-link">Voltar para a página inicial</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorContainer = document.getElementById('errorContainer');
            const errorCode = document.getElementById('errorCode');
            const securityIcon = document.getElementById('securityIcon');
            const scanner = document.getElementById('scanner');
            const returnLink = document.getElementById('return-link');
            const countdownElement = document.getElementById('countdown');
            
            // Criar partículas
            createParticles();

            // Animação do scanner
            scanner.style.opacity = '1';
            
            // Contador regressivo
            let countdownValue = 10;
            const countdownInterval = setInterval(() => {
                countdownValue--;
                countdownElement.textContent = countdownValue;
                
                if (countdownValue <= 0) {
                    clearInterval(countdownInterval);
                    // Redirecionar para a página inicial (simulado)
                    window.location.href = '../../index.php';
                    // countdownElement.parentElement.textContent = "Redirecionamento pausado para demonstração";
                }
            }, 1000);
            
            // Efeito de hover no error code
            errorCode.addEventListener('mouseover', function() {
                this.classList.add('glitch-animation');
            });
            
            errorCode.addEventListener('mouseout', function() {
                this.classList.remove('glitch-animation');
            });
            
            // Movimentação de fundo com o mouse
            document.addEventListener('mousemove', function(e) {
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;
                
                // Movimento suave do container
                errorContainer.style.transform = `perspective(1000px) rotateY(${(x - 0.5) * 5}deg) rotateX(${(y - 0.5) * -5}deg)`;
                
                // Mover o ícone de segurança
                securityIcon.style.transform = `translateX(${(x - 0.5) * 15}px) translateY(${(y - 0.5) * 15}px)`;
            });
            
            // Link para voltar
            returnLink.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Efeito de saída
                errorContainer.style.transform = 'scale(0.9)';
                errorContainer.style.opacity = '0';
                
                setTimeout(() => {
                    window.location.href = '/';
                }, 500);
            });
            
            // Easter egg: código Konami
            let konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
            let konamiPosition = 0;
            
            document.addEventListener('keydown', function(e) {
                if (e.key === konamiCode[konamiPosition]) {
                    konamiPosition++;
                    
                    if (konamiPosition === konamiCode.length) {
                        // Código Konami ativado
                        document.body.style.backgroundColor = '#f9f0f9';
                        errorCode.textContent = '200';
                        errorCode.style.color = '#22a45d';
                        securityIcon.className = 'fas fa-check-circle security-icon pulse';
                        securityIcon.style.color = '#22a45d';
                        
                        const restrictedArea = document.querySelector('.restricted-area');
                        restrictedArea.innerHTML = '<div class="animated-text"><span style="--i:1">A</span><span style="--i:2">c</span><span style="--i:3">e</span><span style="--i:4">s</span><span style="--i:5">s</span><span style="--i:6">o</span><span style="--i:7">&nbsp;</span><span style="--i:8">L</span><span style="--i:9">i</span><span style="--i:10">b</span><span style="--i:11">e</span><span style="--i:12">r</span><span style="--i:13">a</span><span style="--i:14">d</span><span style="--i:15">o</span></div>';
                        
                        const messageBox = document.querySelector('.message-box p');
                        messageBox.textContent = 'Modo administrador ativado! Bem-vindo ao painel Vannily.';
                        
                        konamiPosition = 0;
                    }
                } else {
                    konamiPosition = 0;
                }
            });
            
            // Adicionar elementos com hover effect
            const paragraphs = document.querySelectorAll('p');
            paragraphs.forEach(p => {
                p.classList.add('hover-effect');
            });
            
            // Criar partículas de fundo
            function createParticles() {
                const particlesContainer = document.getElementById('particles');
                const particleCount = 30;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');
                    
                    // Propriedades aleatórias
                    const size = Math.random() * 15 + 5;
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    const opacity = Math.random() * 0.3 + 0.1;
                    const duration = Math.random() * 20 + 10;
                    const delay = Math.random() * 5;
                    
                    // Aplicar estilos
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}%`;
                    particle.style.top = `${posY}%`;
                    particle.style.opacity = opacity;
                    particle.style.animation = `float ${duration}s ease-in-out ${delay}s infinite`;
                    
                    particlesContainer.appendChild(particle);
                }
                
                // Adicionar animação
                const style = document.createElement('style');
                style.innerHTML = `
                    @keyframes float {
                        0%, 100% {
                            transform: translate(0, 0);
                        }
                        25% {
                            transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 50 - 25}px);
                        }
                        50% {
                            transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 50 - 25}px);
                        }
                        75% {
                            transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 50 - 25}px);
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            // Efeito de clique no container
            errorContainer.addEventListener('click', function(e) {
                if (e.target === errorContainer) {
                    const ripple = document.createElement('div');
                    ripple.classList.add('ripple');
                    
                    const rect = errorContainer.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                }
            });
            
            // Adicionar estilo para efeito ripple
            const rippleStyle = document.createElement('style');
            rippleStyle.innerHTML = `
                .ripple {
                    position: absolute;
                    background-color: rgba(139, 22, 137, 0.2);
                    border-radius: 50%;
                    pointer-events: none;
                    width: 10px;
                    height: 10px;
                    animation: ripple 0.6s linear;
                    transform: scale(0);
                }
                
                @keyframes ripple {
                    to {
                        transform: scale(20);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);
            
            // Interatividade extra com toque
            if ('ontouchstart' in window) {
                document.addEventListener('touchmove', function(e) {
                    if (e.touches.length > 0) {
                        const touch = e.touches[0];
                        const x = touch.clientX / window.innerWidth;
                        const y = touch.clientY / window.innerHeight;
                        
                        errorContainer.style.transform = `perspective(1000px) rotateY(${(x - 0.5) * 10}deg) rotateX(${(y - 0.5) * -10}deg)`;
                    }
                });
            }
        });
    </script>
</body>
</html>
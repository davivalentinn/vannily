function validar() {
    let senha = document.getElementById("senha").value;
    let confirmSenha = document.getElementById("senha-confirm").value;
    let spanSenha = document.getElementById("nao-enviado-form");
  
    // Esconder o spanSenha com display: none
  
    if (senha === confirmSenha) {
        
        return true;
    }
    else{
        spanSenha.style.display = 'block';
        return false; // Senhas não coincidem e bloqueia o envio
    }
  }
  
  function mostrarSenha() {
    let senha = document.getElementById("senha");
    let eyeIcon = document.getElementById("toggleEye");
  
    if (senha.type === "password") {
        senha.type = "text"; // Mostra a senha
        eyeIcon.classList.remove("ri-eye-line");
        eyeIcon.classList.add("ri-eye-off-line"); // Muda para ícone de olho fechado
    } else {
        senha.type = "password"; // Oculta a senha
        eyeIcon.classList.remove("ri-eye-off-line");
        eyeIcon.classList.add("ri-eye-line"); // Muda para ícone de olho aberto
    }
  }
  
  function mostrarSenhaConfirm() {
    let senha = document.getElementById("senha-confirm");
    let eyeIcon = document.getElementById("toggleEyeConfirm");
  
    if (senha.type === "password") {
        senha.type = "text"; // Mostra a senha
        eyeIcon.classList.remove("ri-eye-line");
        eyeIcon.classList.add("ri-eye-off-line"); // Muda para ícone de olho fechado
    } else {
        senha.type = "password"; // Oculta a senha
        eyeIcon.classList.remove("ri-eye-off-line");
        eyeIcon.classList.add("ri-eye-line"); // Muda para ícone de olho aberto
    }
  }

  
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cadastroForm');
    const emailErro = document.getElementById('email-erro');
    const successModal = document.getElementById('success-modal');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validação das senhas antes do envio
        const senha = document.getElementById('senha').value;
        const senhaConfirm = document.getElementById('senha-confirm').value;
        const mensagemSenha = document.getElementById('nao-enviado-form');
        
        if (senha !== senhaConfirm) {
            mensagemSenha.style.display = 'block';
            return;
        }
        mensagemSenha.style.display = 'none';
        
        const formData = new FormData(form);
        
        fetch('../../../backend/account/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            try {
                const result = JSON.parse(data);
                
                if (result.sucesso) {
                    emailErro.style.display = 'none';
                    form.reset();
                    // Mostra o modal de sucesso
                    successModal.style.display = 'flex';
                    setTimeout(() => {
                        successModal.classList.add('show');
                    }, 10);
                } else {
                    emailErro.textContent = result.erro;
                    emailErro.style.display = 'block';
                }
            } catch (e) {
                console.error('Erro ao processar resposta:', e);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            emailErro.textContent = 'Erro de conexão. Tente novamente.';
            emailErro.style.display = 'block';
        });
    });
  });
  
  function closeModal() {
    const successModal = document.getElementById('success-modal');
    successModal.classList.remove('show');
    setTimeout(() => {
        successModal.style.display = 'none';
        // Redireciona para a página de login
        window.location.href = '../login/index.php'; // Altere para o caminho correto da sua página de login
    }, 300);
  }
  
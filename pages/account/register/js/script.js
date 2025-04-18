
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
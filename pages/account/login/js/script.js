
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
  
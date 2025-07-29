
const btnsIncrementar = document.querySelectorAll(".btn-incrementar");
const btnsDecrementar = document.querySelectorAll(".btn-decrementar");

btnsIncrementar.forEach((btn) => {
  btn.addEventListener("click", () => {
    const contador = btn.closest(".contador");
    const input = contador.querySelector(".quantidade");
    input.value = parseInt(input.value) + 1;
  });
});

btnsDecrementar.forEach((btn) => {
  btn.addEventListener("click", () => {
    const contador = btn.closest(".contador");
    const input = contador.querySelector(".quantidade");
    if (parseInt(input.value) > 1) {
      input.value = parseInt(input.value) - 1;
    }
  });
});

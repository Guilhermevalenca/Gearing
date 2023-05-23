const formUser = document.getElementById("formularioUser");
const formEmail = document.getElementById("formularioEmail");
const editarUser = document.getElementById("editarUser");
const editarEmail = document.getElementById("editarEmail");

function executeTeste(editar, indice) {
  const validandoRecurso = new XMLHttpRequest();
  validandoRecurso.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      if (this.responseText == "naoProssiga") {
        alert("email ou usuario ja existente, tente novamente!");
      } else if (this.responseText == "prossiga") {
        alert("ola, voce editou suas informações");
      }
    }
  };

  const dados = new FormData();
  dados.append("edicao", editar.value);
  dados.append("indice", indice);
  validandoRecurso.open("POST", "/php/user/checkEditability.php", true);
  validandoRecurso.send(dados);
}

formUser.addEventListener("submit", (event) => {
  event.preventDefault();
  executeTeste(editarUser, 0);
});
formEmail.addEventListener("submit", (event) => {
  event.preventDefault();
  executeTeste(editarEmail, 2);
});

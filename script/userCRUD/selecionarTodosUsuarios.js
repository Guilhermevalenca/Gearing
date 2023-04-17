const selecionarTodos = document.getElementById("selecionarTodos");
const nomes = document.querySelectorAll('input[type="checkbox"]:not(#select-all)');

selecionarTodos.addEventListener('click', () => {
	nomes.forEach(nome => {
      nome.checked = selecionarTodos.checked;
    });
});
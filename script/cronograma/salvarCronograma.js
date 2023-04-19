const button = document.getElementById("salvarCronograma");
const horario = document.getElementById("horario");
const materia = document.getElementById("materia");
const dias = document.getElementById("dias");
const selecionar = document.querySelectorAll('input[type="hidden"]');
button.addEventListener("click", (event) => {
    const enviarDados = new XMLHttpRequest();
    enviarDados.onreadystatechange = () => {
        if(this.readyState === 4 && this.status === 200){
            if(this.reponseText === "dadosSalvos"){
                alert("Seu cronograma foi salvo!");
            }
        }
    }
    const dados = new FormData();
    dados.append("horario",horario.value);
    dados.append("materia",materia.value);
    dados.append("dias",dias.value);
    enviarDados.open("POST",'/php/cronograma/adicionarDadosCronograma.php',true);
    enviarDados.send(dados);
})
formulario = document.getElementById(form);
const perguntas = document.querySelectorAll('.pergunta');
perguntas.forEach( (pergunta,indice) =>{
const respostas = pergunta.querySelectorAll('.opcao');
if(respostas[0].value == respostas[1].value || respostas[0].value == respostas[2].value || respostas[0].value == respostas[3].value){
}
else if(respostas[1].value == respostas[2].value || respostas[1].value == respostas[3].value){
}
});
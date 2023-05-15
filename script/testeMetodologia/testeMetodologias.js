 /*
                 - Entendendo como funcionam as somas dos resultados: -

-Experiência concreta: EC = 1A + 2C + 3D + 4A + 5A + 6C + 7B + 8D + 9B + 10B + 11A + 12B;

-Conceituação Abstrata: CA = 1B + 2B + 3A + 4D + 5C + 6D + 7C + 8B + 9D + 10D + 11C + 12A;

-Observação Reflexiva: OR = 1D + 2A + 3C + 4C + 5B + 6A + 7A + 8C + 9A + 10A + 11B + 12C;

-Experimentação Ativa: EA = 1C + 2D + 3B + 4B + 5D + 6B + 7D + 8A + 9C + 10C + 11D + 12D; 
*/
//Variaveis para armazenar as somas dos pesos das repostas;
let resultadoEC = 0;
let resultadoCA = 0;
let resultadoOR = 0;
let resultadoEA = 0;
//Esses são os arrays de combinações de respostas;
let respostasEC = [0,2,3,0,0,2,1,3,1,1,0,1];
let respostasCA = [1,1,0,3,2,3,2,1,3,3,2,0];
let respostasOR = [3,0,2,2,1,0,0,2,0,0,1,2];
let respostasEA = [2,3,1,1,3,1,3,0,2,2,3,3];

form.addEventListener('submit', (event) => {
    event.preventDefault()

//Importando as variaveis do formulario.
const perguntas = document.querySelectorAll('.pergunta');
perguntas.forEach( (pergunta,indice) =>{
    const respostas = pergunta.querySelectorAll('.opcao');
//Computando as somas dos pesos.

    resultadoEC += parseInt(respostas[respostasEC[indice]].value)
    resultadoCA += parseInt(respostas[respostasCA[indice]].value)
    resultadoOR += parseInt(respostas[respostasOR[indice]].value)
    resultadoEA += parseInt(respostas[respostasEA[indice]].value)
});
//Definindo os quadrantes.
let eixoY = (resultadoCA - resultadoEC);
let eixoX = (resultadoEA - resultadoOR);
//Tratando as informações.
if(eixoX < 0 && eixoY < 0){ //convergente
    alert("tu és convergente")
}
else if(eixoX > 0 && eixoY > 0){ //divergente
 alert("tu és divergente")
}
else if(eixoX < 0 && eixoY > 0){ // acomodador
alert("tu és acomodador")
}
else if(eixoX > 0 && eixoY < 0){ //assimilador
alert("tu és assimilador")
}

});
//ec = 32
//ca = 30
//or = 18
//ea = 40

form = document.getElementById("form");
const perguntas = document.querySelectorAll('.pergunta');
perguntas.forEach( (pergunta) =>{
const respostas = pergunta.querySelectorAll('.opcao');
    function inputRangeCor(indiceRespostaPrimaria){
        respostas[indiceRespostaPrimaria].addEventListener('click', (event) => {
            event.preventDefault();
            respostas.forEach( (resposta, indiceOutrasRespostas) => {
                if(indiceRespostaPrimaria != indiceOutrasRespostas){
                    if(resposta.value == respostas[indiceRespostaPrimaria].value){
                        resposta.style="background: red;";
                        respostas[indiceRespostaPrimaria].style="background: red;";
                    }else{
                        resposta.style="";
                        respostas[indiceRespostaPrimaria].style="";
                    }
                }
            })
        });
    }
    respostas.forEach( (resposta, indice) => {
        resposta.addEventListener('click', (event) => {
            event.preventDefault();
            inputRangeCor(indice);
        })
    })
});
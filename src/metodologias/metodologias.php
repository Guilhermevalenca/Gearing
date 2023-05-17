<?php
    require("../verificacaoExistSession.php") 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>metodologias</title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/metodologias.css">
    <script src="/bibliotecas/sortable.js"></script>
    <script defer src="/script/cabecalho.js"></script>
    <style>
        .opcao {
        -webkit-appearance: none;
        background: #d3d3d3;
        outline: none;
        border-radius: 9px;   
        }
        .pergunta{
            display: grid;
        }
        label{
            border-style: solid;
        }
    </style>
</head>
<body>
    <div id="cabecalho"></div><br><br><br>
    <h1> Questionário de Metodologias de Aprendizagem </h1>
    <form id="form" method="GET" action="./suaMetodologia.php">

    <h2>1. Enquanto estou estudando gosto de:</h2>

    <div class="pergunta">

        <!-- <input id="" type="checkbox" name="fazer[]" value="sentimentos">
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem -->
            <label>
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem 
            <br>
            <input class="opcao" type="hidden" id="1A" name="um[]">
        </label>

            <label>
            Desenvolver idéias 
            <br>
            <input class="opcao" type="hidden" id="1B" name="um[]">
        </label>
        
            <label>
            Práticar 
            <br>
            <input class="opcao" type="hidden" id="1C" name="um[]">
        </label>
        
            <label>
            Observar e ouvir 
            <br>
            <input class="opcao" type="hidden" id="1D" name="um[]">
        </label>

        </div>

        <h2>2. Costumo ter facilidade em aprender, principalmente quando: </h2>

        <div class="pergunta">
        
            <label>
            Ouço e observo com atenção 
            <br>
            <input class="opcao" type="hidden" id="2A" name="dois[]">
        </label>
        
            <label>
            Utlizo de raciocínio lógico 
            <br>
            <input class="opcao" type="hidden" id="2B" name="dois[]">
        </label>
        
            <label>
            Me baseio em meus palpites e impressões 
            <br>
            <input class="opcao" type="hidden" id="2C" name="dois[]">
        </label>
        
            <label>
            Executando o que aprendi 
            <br>
            <input class="opcao" type="hidden" id="2D" name="dois[]">
        </label>

        </div>

        <h2>3. Quando estou aprendendo costumo: </h2>

        <div class="pergunta">
        
            <label>
            Buscar explicações para os tópicos estudados 
            <br>
            <input class="opcao"type="hidden" id="3A" name="tres[]">
        </label>
       
            <label>
            Ser responsável acerca das coisas (Disciplinado) 
            <br>
            <input class="opcao" type="hidden" id="3B" name="tres[]">
        </label>
       
            <label>
            Ficar quieto(a) e me concentrar  
            <br>
            <input class="opcao" type="hidden" id="3C" name="tres[]">
        </label>

            <label>
            Ter sentimentos e reações fortes 
            <br>
            <input class="opcao" type="hidden" id="3D" name="tres[]">
        </label>

        </div>

        <h2>4. Aprendo: </h2>

       <div class="pergunta">
            
            <label>
            Sentindo (Tristeza, raiva, admiração, curiosidade, etc.) 
            <br>
            <input class="opcao" type="hidden" id="4A" name="quatro[]">
        </label>
    
            <label>
            Fazendo 
            <br>
            <input class="opcao" type="hidden" id="4B" name="quatro[]">
        </label>
         
            <label>
            Observando 
            <br>
            <input class="opcao" type="hidden" id="4C" name="quatro[]">
        </label>
            
            <label>
            Pensando 
            <br>
            <input class="opcao" type="hidden" id="4D" name="quatro[]">
        </label>

        </div>

        <h2>5. Enquanto aprendo gosto de: </h2>

        <div class="pergunta">

         <label>
            Me abrir a novas experiências 
         <br>
            <input class="opcao" type="hidden" id="5A" name="cinco[]">
        </label>

        <label>
            Examinar todos os ângulos da questão 
        <br>
            <input class="opcao" type="hidden" id="5B" name="cinco[]">
        </label>

            <label>
            Analisar as coisas (Desdobrá-las em partes para entendê-las/resolvê-las) 
            <br>
            <input class="opcao" type="hidden" id="5C" name="cinco[]">
        </label>

            <label>
            Testar as coisas (Métodos, práticas, etc.) 
            <br>
            <input class="opcao" type="hidden" id="5D" name="cinco[]">
        </label>
    
        </div>

        <h2>6. Enquanto estudo sou: </h2>

        <div class="pergunta">
        
            <label>
            Alguém que prefere observar 
            <br>
            <input class="opcao" type="hidden" id="6A" name="seis[]">
        </label>
        
            <label>
            Ativo(a) (Utilizo mais de um método de estudo) 
            <br>
            <input class="opcao" type="hidden" id="6B" name="seis[]">
        </label>
        
            <label>
            Intuitivo(a) (Entender quais são suas dificuldades e conseguir identificar o que se encaixa melhor para seu processo de aprendizagem) 
            <br>
            <input class="opcao" type="hidden" id="6C" name="seis[]">
        </label>
    
        
            <label>
            Lógico(a) (Utilizar a lógica e a razão para entender os temas abordados) 
            <br>
            <input class="opcao" type="hidden" id="6D" name="seis[]">
        </label>
        
        </div>

        <h2>7. Aprendo melhor através de: </h2>

        <div class="pergunta">
        
            <label>
            Observação 
            <br>
            <input class="opcao" type="hidden" id="7A" name="sete[]">
        </label>
        
            <label>
            Interações pessoais (Adquirir conheço por meio de interações com outros individuos) 
            <br>
            <input class="opcao" type="hidden" id="7B" name="sete[]">
        </label>

           <label>
            Teorias racionais (Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo) 
           <br>
            <input class="opcao" type="hidden" id="7C" name="sete[]">
        </label>

           <label>
            Oportunidades para experimentar e praticar 
           <br>
            <input class="opcao" type="hidden" id="7D" name="sete[]">
        </label>

        </div>

        <h2>8. Enquanto aprendo:</h2>

        <div class="pergunta">
        
            <label>
            Gosto de ver o resultado do meu trabalho 
            <br>
            <input class="opcao" type="hidden" id="8A" name="oito[]">
        </label>

            <label>
            Me interesso em ter/conhecer ideias e teorias 
            <br>
            <input class="opcao" type="hidden" id="8B" name="oito[]">
        </label>

            <label>
            Penso antes de agir (planejar-se) 
            <br>
            <input class="opcao" type="hidden" id="8C" name="oito[]">
        </label>

            <label>
            Sinto-me pessoalmente envolvido nos assuntos 
            <br>
            <input class="opcao" type="hidden" id="8D" name="oito[]">
        </label>

        </div>

        <h2>9. Aprendo melhor quando me apoio em: </h2>

        <div class="pergunta">
        
            <label>
            Minhas observações 
            <br>
            <input class="opcao" type="hidden" id="9A" name="nove[]">
        </label>

            <label>
            Minhas impressões 
            <br>
            <input class="opcao" type="hidden" id="9B" name="nove[]">
        </label>

            <label>Posso experimentar coisas por mim mesmo(a) 
            <input class="opcao" type="hidden" id="9C" name="nove[]">
        </<br>
        label>

            <label>
            Me apoio em minhas ideias(a) 
            <br>
            <input class="opcao" type="hidden" id="9D" name="nove[]">
        </label>

        </div>

        <h2>10. Quando estou aprendendo costumo ser: </h2>

        <div class="pergunta">
        
            <label>
            Compenetrado - Atento, concentrado 
            <br>
            <input class="opcao" type="hidden" id="10A" name="dez[]">
        </label>

            <label>
            Flexível 
            <br>
            <input class="opcao" type="hidden" id="10B" name="dez[]">
        </label>

            <label>
            Responsável 
            <br>
            <input class="opcao" type="hidden" id="10C" name="dez[]">
        </label>

            <label>
            Racional 
            <br>
            <input class="opcao" type="hidden" id="10D" name="dez[]">
        </label>

        </div>

        <h2>11. Enquanto aprendo costumo: </h2>

        <div class="pergunta">
        
            <label>
            Me envolver totalmente 
            <br>
            <input class="opcao" type="hidden" id="11A" name="onze[]">
        </label>

            <label>
            Gostar de observar 
            <br>
            <input class="opcao" type="hidden" id="11B" name="onze[]">
        </label>

            <label>
            Avaliar as coisas 
            <br>
            <input class="opcao" type="hidden" id="11C" name="onze[]">
        </label>

            <label>
            Estar ativo 
            <br>
            <input class="opcao" type="hidden" id="11D" name="onze[]">
        </label>

        </div>

        <h2>12. Aprendo melhor quando: </h2>

        <div class="pergunta">
        
            <label>
            Analiso as ideias 
            <br>
            <input class="opcao" type="hidden" id="12A" name="doze[]">
        </label>

            <label>
            Sou receptivo e mente aberta 
            <br>
            <input class="opcao" type="hidden" id="12B" name="doze[]">
        </label>

            <label>
            Sou cuidadoso (Tomar medidas para garantir que a aprendizagem seja realizada de forma precisa, sem erros) 
            <br>
            <input class="opcao" type="hidden" id="12C" name="doze[]">
        </label>

            <label>
            Sou prático (Busco formas de tornar o aprendizado mais significativo e relevante, e aplicar o que está sendo estudado na prática) 
            <br>
            <input class="opcao" type="hidden" id="12D" name="doze[]">
            </label> 

        </div>
            <button>Calcular resultado</button>
            </form>
            <script>
            const form = document.querySelector('#form');
            const perguntas = form.querySelectorAll('.pergunta');
            perguntas.forEach(pergunta => {
                new Sortable(pergunta, {
                    animation: 150,
                    ghostClass: 'blue-background-class'
                })
            })
        </script>
            <!-- <script defer src="/script/testeMetodologia/testeMetodologias.js"></script>
            <script defer src="/script/testeMetodologia/testeNoValueRepeat.js"></script> -->
</body>
</html>
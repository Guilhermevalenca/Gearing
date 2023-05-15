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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script defer src="/script/cabecalho.js"></script>
    <style>
        .opcao {
        -webkit-appearance: none;
        background: #d3d3d3;
        outline: none;
        border-radius: 9px;   
        }
    </style>
</head>
<body>
    <div id="cabecalho"></div><br><br><br>
    <h1> Questionário de Metodologias de Aprendizagem </h1>
    <form id="form" method="GET" action="./suaMetodologia.php">

        <div class="pergunta">

        <h2>1. Enquanto estou estudando gosto de:</h2>
        <!-- <input id="" type="checkbox" name="fazer[]" value="sentimentos">
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem -->
            <label>
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem <br>
            <input class="opcao" type="range" id="1A" name="um[]" min='1' max="4">
        </label><br>

            <label>
            Desenvolver idéias <br>
            <input class="opcao" type="range" id="1B" name="um[]" min='1' max="4">
        </label><br>
        
            <label>
            Práticar <br>
            <input class="opcao" type="range" id="1C" name="um[]" min='1' max="4">
        </label><br>
        
            <label>
            Observar e ouvir <br>
            <input class="opcao" type="range" id="1D" name="um[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>2. Costumo ter facilidade em aprender, principalmente quando: </h2>
        
            <label>
            Ouço e observo com atenção <br>
            <input class="opcao" type="range" id="2A" name="dois[]" min='1' max="4">
        </label><br>
        
            <label>
            Utlizo de raciocínio lógico <br>
            <input class="opcao" type="range" id="2B" name="dois[]" min='1' max="4">
        </label><br>
        
            <label>
            Me baseio em meus palpites e impressões <br>
            <input class="opcao" type="range" id="2C" name="dois[]" min='1' max="4">
        </label><br>
        
            <label>
            Executando o que aprendi <br>
            <input class="opcao" type="range" id="2D" name="dois[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">
        
        <h2>3. Quando estou aprendendo costumo: </h2>
        
            <label>
            Buscar explicações para os tópicos estudados <br>
            <input class="opcao"type="range" id="3A" name="tres[]" min='1' max="4">
        </label><br>
       
            <label>
            Ser responsável acerca das coisas (Disciplinado) <br>
            <input class="opcao" type="range" id="3B" name="tres[]" min='1' max="4">
        </label><br>
       
            <label>
            Ficar quieto(a) e me concentrar <br> 
            <input class="opcao" type="range" id="3C" name="tres[]" min='1' max="4">
        </label><br>

            <label>
            Ter sentimentos e reações fortes <br>
            <input class="opcao" type="range" id="3D" name="tres[]" min='1' max="4">
        </label><br>

        </div>

       <div class="pergunta">

        <h2>4. Aprendo: </h2>
            
            <label>
            Sentindo (Tristeza, raiva, admiração, curiosidade, etc.) <br>
            <input class="opcao" type="range" id="4A" name="quatro[]" min='1' max="4">
        </label><br>
    
            <label>
            Fazendo <br>
            <input class="opcao" type="range" id="4B" name="quatro[]" min='1' max="4">
        </label><br>
         
            <label>
            Observando <br>
            <input class="opcao" type="range" id="4C" name="quatro[]" min='1' max="4">
        </label><br>
            
            <label>
            Pensando <br>
            <input class="opcao" type="range" id="4D" name="quatro[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>5. Enquanto aprendo gosto de: </h2>

         <label>
            Me abrir a novas experiências <br>
            <input class="opcao" type="range" id="5A" name="cinco[]" min='1' max="4">
        </label><br>

        <label>
            Examinar todos os ângulos da questão <br>
            <input class="opcao" type="range" id="5B" name="cinco[]" min='1' max="4">
        </label><br>

            <label>
            Analisar as coisas (Desdobrá-las em partes para entendê-las/resolvê-las) <br>
            <input class="opcao" type="range" id="5C" name="cinco[]" min='1' max="4">
        </label><br>

            <label>
            Testar as coisas (Métodos, práticas, etc.) <br>
            <input class="opcao" type="range" id="5D" name="cinco[]" min='1' max="4">
        </label><br>
    
        </div>

        <div class="pergunta">

        <h2>6. Enquanto estudo sou: </h2>
        
            <label>
            Alguém que prefere observar <br>
            <input class="opcao" type="range" id="6A" name="seis[]" min='1' max="4">
        </label><br>
        
            <label>
            Ativo(a) (Utilizo mais de um método de estudo) <br>
            <input class="opcao" type="range" id="6B" name="seis[]" min='1' max="4">
        </label><br>
        
            <label>
            Intuitivo(a) (Entender quais são suas dificuldades e conseguir identificar o que se encaixa melhor para seu processo de aprendizagem) <br>
            <input class="opcao" type="range" id="6C" name="seis[]" min='1' max="4">
        </label><br>
    
        
            <label>
            Lógico(a) (Utilizar a lógica e a razão para entender os temas abordados) <br>
            <input class="opcao" type="range" id="6D" name="seis[]" min='1' max="4">
        </label><br>
        
        </div>

        <div class="pergunta">

        <h2>7. Aprendo melhor através de: </h2>
        
            <label>
            Observação <br>
            <input class="opcao" type="range" id="7A" name="sete[]" min='1' max="4">
        </label><br>
        
            <label>
            Interações pessoais (Adquirir conheço por meio de interações com outros individuos) <br>
            <input class="opcao" type="range" id="7B" name="sete[]" min='1' max="4">
        </label><br>

           <label>
            Teorias racionais (Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo) <br>
            <input class="opcao" type="range" id="7C" name="sete[]" min='1' max="4">
        </label><br>

           <label>
            Oportunidades para experimentar e praticar <br>
            <input class="opcao" type="range" id="7D" name="sete[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>8. Enquanto aprendo:</h2>
        
            <label>
            Gosto de ver o resultado do meu trabalho <br>
            <input class="opcao" type="range" id="8A" name="oito[]" min='1' max="4">
        </label><br>

            <label>
            Me interesso em ter/conhecer ideias e teorias <br>
            <input class="opcao" type="range" id="8B" name="oito[]" min='1' max="4">
        </label><br>

            <label>
            Penso antes de agir (planejar-se) <br>
            <input class="opcao" type="range" id="8C" name="oito[]" min='1' max="4">
        </label><br>

            <label>
            Sinto-me pessoalmente envolvido nos assuntos <br>
            <input class="opcao" type="range" id="8D" name="oito[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>9. Aprendo melhor quando me apoio em: </h2>
        
            <label>
            Minhas observações <br>
            <input class="opcao" type="range" id="9A" name="nove[]" min='1' max="4">
        </label><br>

            <label>
            Minhas impressões <br>
            <input class="opcao" type="range" id="9B" name="nove[]" min='1' max="4">
        </label><br>

            <label>Posso experimentar coisas por mim mesmo(a) <br>
            <input class="opcao" type="range" id="9C" name="nove[]" min='1' max="4">
        </label><br>

            <label>
            Me apoio em minhas ideias(a) <br>
            <input class="opcao" type="range" id="9D" name="nove[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>10. Quando estou aprendendo costumo ser: </h2>
        
            <label>
            Compenetrado - Atento, concentrado <br>
            <input class="opcao" type="range" id="10A" name="dez[]" min='1' max="4">
        </label><br>

            <label>
            Flexível <br>
            <input class="opcao" type="range" id="10B" name="dez[]" min='1' max="4">
        </label><br>

            <label>
            Responsável <br>
            <input class="opcao" type="range" id="10C" name="dez[]" min='1' max="4">
        </label><br>

            <label>
            Racional <br>
            <input class="opcao" type="range" id="10D" name="dez[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>11. Enquanto aprendo costumo: </h2>
        
            <label>
            Me envolver totalmente <br>
            <input class="opcao" type="range" id="11A" name="onze[]" min='1' max="4">
        </label><br>

            <label>
            Gostar de observar <br>
            <input class="opcao" type="range" id="11B" name="onze[]" min='1' max="4">
        </label><br>

            <label>
            Avaliar as coisas <br>
            <input class="opcao" type="range" id="11C" name="onze[]" min='1' max="4">
        </label><br>

            <label>
            Estar ativo <br>
            <input class="opcao" type="range" id="11D" name="onze[]" min='1' max="4">
        </label><br>

        </div>

        <div class="pergunta">

        <h2>12. Aprendo melhor quando: </h2>
        
            <label>
            Analiso as ideias <br>
            <input class="opcao" type="range" id="12A" name="doze[]" min='1' max="4">
        </label><br>

            <label>
            Sou receptivo e mente aberta <br>
            <input class="opcao" type="range" id="12B" name="doze[]" min='1' max="4">
        </label><br>

            <label>
            Sou cuidadoso (Tomar medidas para garantir que a aprendizagem seja realizada de forma precisa, sem erros) <br>
            <input class="opcao" type="range" id="12C" name="doze[]" min='1' max="4">
        </label><br>

            <label>
            Sou prático (Busco formas de tornar o aprendizado mais significativo e relevante, e aplicar o que está sendo estudado na prática) <br>
            <input class="opcao" type="range" id="12D" name="doze[]" min='1' max="4">
            </label><br> 

        </div><br>
            <button>Calcular resultado</button>
            </form>
            <script defer src="/script/testeMetodologia/testeMetodologias.js"></script>
            <script defer src="/script/testeMetodologia/testeNoValueRepeat.js"></script>

</body>
</html>
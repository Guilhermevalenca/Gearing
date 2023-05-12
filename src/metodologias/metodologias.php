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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script>

    </script>
    <script defer src="/script/cabecalho.js"></script>

</head>
<body>
    <div id="cabecalho"></div><br><br><br>
    <h1> Questionário de Metodologias de Aprendizagem </h1>
    <form id="form" method="GET" action="./suaMetodologia.php">

        <label class="pergunta">

        <h2>1. Enquanto estou estudando gosto de:</h2>
        <!-- <input id="" type="checkbox" name="fazer[]" value="sentimentos">
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem -->
            <label>Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem
        </label><br>
            <input class="opcao" type="range" id="1A" name="um[]" min='1' max="4">

            <label><br>Desenvolver idéias
        </label><br>
            <input class="opcao" type="range" id="1B" name="um[]" min='1' max="4">
        
            <label><br>Práticar
        </label><br>
            <input class="opcao" type="range" id="1C" name="um[]" min='1' max="4">
        
            <label><br>Observar e ouvir
        </label><br>
            <input class="opcao" type="range" id="1D" name="um[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>2. Costumo ter facilidade em aprender, principalmente quando: </h2>
        
            <label><br>Ouço e observo com atenção
        </label><br>
            <input class="opcao" type="range" id="2A" name="dois[]" min='1' max="4">
            
            <label><br>Utlizo de raciocínio lógico
        </label><br>
            <input class="opcao" type="range" id="2B" name="dois[]" min='1' max="4">
        
            <label><br>Me baseio em meus palpites e impressões
        </label><br>
            <input class="opcao" type="range" id="2C" name="dois[]" min='1' max="4">
        
            <label><br>Executando o que aprendi
        </label><br>
            <input class="opcao" type="range" id="2D" name="dois[]" min='1' max="4">

        </label>

        <label class="pergunta">
        
        <h2>3. Quando estou aprendendo costumo: </h2>
        
            <label><br>Buscar explicações para os tópicos estudados
        </label><br>
            <input class="opcao"type="range" id="3A" name="tres[]" min='1' max="4">
       
            <label><br>Ser responsável acerca das coisas (Disciplinado)
        </label><br>
            <input class="opcao" type="range" id="3B" name="tres[]" min='1' max="4">
       
            <label><br>Ficar quieto(a) e me concentrar 
        </label><br>
            <input class="opcao" type="range" id="3C" name="tres[]" min='1' max="4">

            <label><br>Ter sentimentos e reações fortes
        </label><br>
            <input class="opcao" type="range" id="3D" name="tres[]" min='1' max="4">

        </label>

       <label class="pergunta">

        <h2>4. Aprendo: </h2>
            
            <label><br>Sentindo (Tristeza, raiva, admiração, curiosidade, etc.)
        </label><br>
            <input class="opcao" type="range" id="4A" name="quatro[]" min='1' max="4">
    
            <label><br>Fazendo
        </label><br>
            <input class="opcao" type="range" id="4B" name="quatro[]" min='1' max="4">
         
            <label><br>Observando
        </label><br>
            <input class="opcao" type="range" id="4C" name="quatro[]" min='1' max="4">
            
            <label><br>Pensando
        </label><br>
            <input class="opcao" type="range" id="4D" name="quatro[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>5. Enquanto aprendo gosto de: </h2>

         <label><br> Me abrir a novas experiências
        </label><br>
            <input class="opcao" type="range" id="5A" name="cinco[]" min='1' max="4">

            <label><br>Examinar todos os ângulos da questão
        </label><br>
            <input class="opcao" type="range" id="5B" name="cinco[]" min='1' max="4">

            <label><br>Analisar as coisas (Desdobrá-las em partes para entendê-las/resolvê-las)
        </label><br>
            <input class="opcao" type="range" id="5C" name="cinco[]" min='1' max="4">

            <label><br>Testar as coisas (Métodos, práticas, etc.)
        </label><br>
            <input class="opcao" type="range" id="5D" name="cinco[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>6. Enquanto estudo sou: </h2>
        
            <label><br>Alguém que prefere observar
        </label><br>
            <input class="opcao" type="range" id="6A" name="seis[]" min='1' max="4">
        
            <label><br>Ativo(a) (Utilizo mais de um método de estudo)
        </label><br>
            <input class="opcao" type="range" id="6B" name="seis[]" min='1' max="4">
        
            <label><br>Intuitivo(a) (Entender quais são suas dificuldades e conseguir identificar o que se encaixa melhor para seu processo de aprendizagem)
        </label><br>
            <input class="opcao" type="range" id="6C" name="seis[]" min='1' max="4">
        
            <label><br> Lógico(a) (Utilizar a lógica e a razão para entender os temas abordados)
        </label><br>
            <input class="opcao" type="range" id="6D" name="seis[]" min='1' max="4">
        
        </label>

        <label class="pergunta">

        <h2>7. Aprendo melhor através de: </h2>
        
            <label><br>Observação
        </label><br>
            <input class="opcao" type="range" id="7A" name="sete[]" min='1' max="4">
        
            <label><br>Interações pessoais (Adquirir conheço por meio de interações com outros individuos)
        </label><br>
            <input class="opcao" type="range" id="7B" name="sete[]" min='1' max="4">

           <label><br>Teorias racionais (Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo)
        </label><br>
            <input class="opcao" type="range" id="7C" name="sete[]" min='1' max="4">

           <label><br>Oportunidades para experimentar e praticar
        </label><br>
            <input class="opcao" type="range" id="7D" name="sete[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>8. Enquanto aprendo:</h2>
        
            <label><br>Gosto de ver o resultado do meu trabalho
        </label><br>
            <input class="opcao" type="range" id="8A" name="oito[]" min='1' max="4">

            <label><br>Me interesso em ter/conhecer ideias e teorias
        </label><br>
            <input class="opcao" type="range" id="8B" name="oito[]" min='1' max="4">

            <label><br>Penso antes de agir (planejar-se)
        </label><br>
            <input class="opcao" type="range" id="8C" name="oito[]" min='1' max="4">

            <label><br>Sinto-me pessoalmente envolvido nos assuntos
        </label><br>
            <input class="opcao" type="range" id="8D" name="oito[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>9. Aprendo melhor quando me apoio em: </h2>
        
            <label><br>Minhas observações
        </label><br>
            <input class="opcao" type="range" id="9A" name="nove[]" min='1' max="4">

            <label><br>Minhas impressões
        </label><br>
            <input class="opcao" type="range" id="9B" name="nove[]" min='1' max="4">

            <label><br>Posso experimentar coisas por mim mesmo(a)
        </label><br>
            <input class="opcao" type="range" id="9C" name="nove[]" min='1' max="4">

            <label><br>Me apoio em minhas ideias(a)
        </label><br>
            <input class="opcao" type="range" id="9D" name="nove[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>10. Quando estou aprendendo costumo ser: </h2>
        
            <label><br>Compenetrada
        </label><br>
            <input class="opcao" type="range" id="10A" name="dez[]" min='1' max="4">

            <label><br>Flexível
        </label><br>
            <input class="opcao" type="range" id="10B" name="dez[]" min='1' max="4">

            <label><br>Responsável
        </label><br>
            <input class="opcao" type="range" id="10C" name="dez[]" min='1' max="4">

            <label><br>Racional
        </label><br>
            <input class="opcao" type="range" id="10D" name="dez[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>11. Enquanto aprendo costumo: </h2>
        
            <label><br>Me envolver totalmente
        </label><br>
            <input class="opcao" type="range" id="11A" name="onze[]" min='1' max="4">

            <label><br>Gostar de observar
        </label><br>
            <input class="opcao" type="range" id="11B" name="onze[]" min='1' max="4">

            <label><br>Avaliar as coisas
        </label><br>
            <input class="opcao" type="range" id="11C" name="onze[]" min='1' max="4">

            <label><br>Estar ativo
        </label><br>
            <input class="opcao" type="range" id="11D" name="onze[]" min='1' max="4">

        </label>

        <label class="pergunta">

        <h2>12. Aprendo melhor quando: </h2>
        
            <label><br>Analiso as ideias
        </label><br>
            <input class="opcao" type="range" id="12A" name="doze[]" min='1' max="4">

            <label><br>Sou receptivo e mente aberta
        </label><br>
            <input class="opcao" type="range" id="12B" name="doze[]" min='1' max="4">

            <label><br>Sou cuidadoso (Tomar medidas para garantir que a aprendizagem seja realizada de forma precisa, sem erros)
        </label><br>
            <input class="opcao" type="range" id="12C" name="doze[]" min='1' max="4">

            <label><br> Sou prático (Busco formas de tornar o aprendizado mais significativo e relevante, e aplicar o que está sendo estudado na prática)
            </label><br>
            <input class="opcao" type="range" id="12D" name="doze[]" min='1' max="4"> 

            </label><br>
            <button>Calcular resultado</button>
            </form>
            <script defer src="/script/testeMetodologia/testeMetodologias.js"></script>

</body>
</html>
<?php
    require("../verificacaoExistSession.php") 
?>
<!DOCTYPE html>
<html lang="en">
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
<div id="expandir"></div>
    <div id="cabecalho"></div><br><br><br>
    <h1> Questionário de Metodologias de Aprendizagem </h1>
    <form id="form" method="GET" action="./suaMetodologia.php">

        <h2>Enquanto estou estudando gosto de:</h2>
        <!-- <input id="" type="checkbox" name="fazer[]" value="sentimentos">
            Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem -->
            <label for="input1">Lidar com meus sentimentos - Gerenciar e compreender as emoções que surgem durante o processo de aprendizagem
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Desenvolver idéias
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Práticar
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Observar e ouvir
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        

        <h2> Costumo ter facilidade em aprender, principalmente quando: </h2>
        
            <label for="input1"><br>Ouço e observo com atenção
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
            
            <label for="input1"><br>Utlizo de raciocínio lógico
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Me baseio em meus palpites e impressões
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Executando o que aprendi
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
        <h2> Quando estou aprendendo costumo: </h2>
        
            <label for="input1"><br>Buscar explicações para os tópicos estudados
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
       
            <label for="input1"><br>Ser responsável acerca das coisas (Disciplinado)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
       
            <label for="input1"><br>Ficar quieto(a) e me concentrar 
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Ter sentimentos e reações fortes
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
       
        <h2> Aprendo: </h2>
            
            <label for="input1"><br>Sentindo (Tristeza, raiva, admiração, curiosidade, etc.)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
    
            <label for="input1"><br>Fazendo
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
         
            <label for="input1"><br>Observando
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
            
            <label for="input1"><br>Pensando
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2> Enquanto aprendo gosto de: </h2>

         <label for="input1"><br> Me abrir a novas experiências
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Examinar todos os ângulos da questão
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Analisar as coisas (Desdobrá-las em partes para entendê-las/resolvê-las)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Testar as coisas (Métodos, práticas, etc.)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2> Enquanto estudo sou: </h2>
        
            <label for="input1"><br>Alguém que prefere observar
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Ativo(a) (Utilizo mais de um método de estudo)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Intuitivo(a) (Entender quais são suas dificuldades e conseguir identificar o que se encaixa melhor para seu processo de aprendizagem)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br> Lógico(a) (Utilizar a lógica e a razão para entender os temas abordados)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
        <h2> Aprendo melhor atrvés de: </h2>
        
            <label for="input1"><br>Observação
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
            <label for="input1"><br>Interações pessoais (Adquirir conheço por meio de interações com outros individuos)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

           <label for="input1"><br>Teorias racionais (Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

           <label for="input1"><br>Oportunidades para experimentar e praticar
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2>Enquanto aprendo:</h2>
        
            <label for="input1"><br>Gosto de ver o resultado do meu trabalho
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Me interesso em ter/conhecer ideias e teorias
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Penso antes de agir (planejar-se)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Sinto-me pessoalmente envolvido nos assuntos
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2> Aprendo melhor quando me apoio em: </h2>
        
            <label for="input1"><br>Minhas observações
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Minhas impressões
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Posso experimentar coisas por mim mesmo(a)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Me apoio em minhas ideias(a)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">
        
        <h2> Quando estou aprendendo costumo ser: </h2>
        
            <label for="input1"><br>Compenetrada
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Flexível
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Responsável
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Racional
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2> Enquanto aprendo costumo: </h2>
        
            <label for="input1"><br>Me envolver totalmente
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Gostar de observar
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Avaliar as coisas
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Estar ativo
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

        <h2> Aprendo melhor quando: </h2>
        
            <label for="input1"><br>Analiso as ideias
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Sou receptivo e mente aberta
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br>Sou cuidadoso (Tomar medidas para garantir que a aprendizagem seja realizada de forma precisa, sem erros)
        </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4">

            <label for="input1"><br> Sou prático (Busco formas de tornar o aprendizado mais significativo e relevante, e aplicar o que está sendo estudado na prática)
            </label><br>
            <input type="range" id="input1" name="inputRange" min='1' max="4"> <br>
            <input type="submit">
            </form>

</body>
</html>
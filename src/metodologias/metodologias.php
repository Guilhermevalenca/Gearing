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
</head>
<body>
    <h1> Questionário de Metodologias de Aprendizagem </h1>
    <button onclick="window.location.href='/src/menu.php'">Voltar para o menu</button>
    <form id="form" method="GET" action="./suaMetodologia.php">
        <h2>Enquanto estou estudando gosto de:</h2>
        <label>
           <input type="checkbox" name="aprender[]" value="sentimentos">
            Lidar com meus sentimentos
        </label>
        <br>
        <label>
            <input type="checkbox" name="aprender[]" value="ideias">
            Desenvolver idéias
        </label>
        <br>
        <label>
            <input type="checkbox" name="aprender[]" value="pratica">
            Práticar
        </label>
        <br>
        <label>
            <input type="checkbox" name="aprender[]" value="observar">
            Observar e ouvir 
        </label>
        <br>

        <h2> Tenho facilidade em aprender quando: </h2>
        <label>
            <input type="checkbox" name="metodos[]" value="ouvir">
            Ouço e observo com atenção
        </label>
        <br>
        <label>
            <input type="checkbox" name="metodos[]" value="logica">
            Utlizando pensamento lógico
        </label>
        <br>
        <label>
            <input type="checkbox" name="metodos[]" value="palpites">
            Confio em meus palpites e impressões
        </label>
        <br>
        <label>
            <input type="checkbox" name="metodos[]" value="praticando">
            Executando o que aprendi
        </label>
        <br>

        <h2> Quando estou aprendendo costumo: </h2>
        <label>
            <input type="checkbox" name="estudos[]" value="explicacao">
            Buscar explicação para os assuntos
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="responsavel">
            Ser responsável acerca das coisas 
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="concentrar">
            Ficar quieto e concentrado
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="reacoes">
            Ter sentimentos e reações fortes
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="explicacao">

        <h2> Aprendo quando: </h2>
        <label>
            <input type="checkbox" name="estudar[]" value="sinto">
            Sinto
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudar[]" value="faco">
            Faço
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudar[]" value="observo">
            Observo 
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudar[]" value="penso">
            Penso
        </label>
        <br>
        <label>

        <h2> Enquanto aprendo gosto de: </h2>
        <label>
            <input type="checkbox" name="durante[]" value="experiencias">
            Me abrir a novas experiências
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="examino">
            Examinar todos os ângulos da questão
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="analisar">
            Analisar as coisas, desdobrá-las em partes
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="testar">
            Testar as coisas
        </label>
        <br>

        <h2> Enquanto estudo sou: </h2>
        <label>
            <input type="checkbox" name="durante[]" value="testar">
            Alguém que prefere observar
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="testar">
            Ativo(a)
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="testar">
            Intuitivo(a)
        </label>
        <br>
        <label>
            <input type="checkbox" name="durante[]" value="testar">
            Lógico(a)
        </label>
        <br>
        
        <h2> Aprendo melhor atrvés de: </h2>

</body>
</html>
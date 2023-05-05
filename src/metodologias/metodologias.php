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
    <link rel="stylesheet" href="/css/metodologias.css">
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

        <h2> Costumo ter facilidade em aprender, principalmente quando: </h2>
        <label>
            <input type="checkbox" name="metodos[]" value="ouvir">
            Ouço e observo com atenção
        </label>
        <br>
        <label>
            <input type="checkbox" name="metodos[]" value="logica">
            Utlizo de raciocínio lógico
        </label>
        <br>
        <label>
            <input type="checkbox" name="metodos[]" value="palpites">
            Me baseio em meus palpites e impressões
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
            Buscar explicações para os tópicos estudados
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="responsavel">
            Ser responsável acerca das coisas (Disciplinado)
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="concentrar">
            Ficar quieto(a) e me concentrar 
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudos[]" value="reacoes">
            Ter sentimentos e reações fortes
        </label>
        <br>
       
        <h2> Aprendo: </h2>
        <label>
            <input type="checkbox" name="estudar[]" value="sinto">
            Sentindo (Tristeza, raiva, admiração, curiosidade, etc.)
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudar[]" value="faco">
            Fazendo
        </label>
        <br>
        <label>
            <input type="checkbox" name="estudar[]" value="observo">
            Observando
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Pensando
        </label>
        <br>
        <label>

        <h2> Enquanto aprendo gosto de: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Me abrir a novas experiências
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Examinar todos os ângulos da questão
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Analisar as coisas (Desdobrá-las em partes para entendê-las/resolvê-las)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Testar as coisas (Métodos, práticas, etc.)
        </label>
        <br>

        <h2> Enquanto estudo sou: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Alguém que prefere observar
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Ativo(a) (Utilizo mais de um método de estudo)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Intuitivo(a) (Entender quais são suas dificuldades e conseguir identificar o que se encaixa melhor para seu processo de aprendizagem)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Lógico(a) (Utilizar a lógica e a razão para entender os temas abordados)
        </label>
        <br>
        
        <h2> Aprendo melhor atrvés de: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Observação 
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Interações pessoais (Adquirir conheço por meio de interações com outros individuos)
        </label>
        <br>
        <label>
           <input type="checkbox" name="[]" value="">
           Teorias racionais (Modelos conceituais baseados em princípios lógicos e raciocínio dedutivo)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Oportunidades para experimentar e praticar
        </label>
        <br>

        <h2>Enquanto aprendo:</h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Gosto de ver o resultado do meu trabalho
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Me interesso em ter/conhecer ideias e teorias 
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Penso antes de agir (planejar-se)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Sinto-me pessoalmente envolvido nos assuntos
        </label>
        <br>

        <h2> Aprendo melhor quando me apoio em: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Minhas observações
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Minhas impressões
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Posso experimentar coisas por mim mesmo(a)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Me apoio em minhas ideias(a)
        </label>
        <br>
        
        <h2> Quando estou aprendendo costumo ser: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Compenetrada
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Flexível
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Responsável 
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Racional
        </label>
        <br>

        <h2> Enquanto aprendo costumo: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Me envolver totalmente
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Gostar de observar
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Avaliar as coisas 
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Estar ativo 
        </label>
        <br>

        <h2> Aprendo melhor quando: </h2>
        <label>
            <input type="checkbox" name="[]" value="">
            Analiso as ideias
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Sou receptivo e mente aberta
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Sou cuidadoso (Tomar medidas para garantir que a aprendizagem seja realizada de forma precisa, sem erros)
        </label>
        <br>
        <label>
            <input type="checkbox" name="[]" value="">
            Sou prático (Busco formas de tornar o aprendizado mais significativo e relevante, e aplicar o que está sendo estudado na prática)
        </label>
        <br>

</body>
</html>
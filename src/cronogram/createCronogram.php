<?php 
require("../verifyUserAuthentication.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cronograma</title>

    <link rel="stylesheet" href="/css/newCronogram.css">
    <link rel="stylesheet" href="/css/global.css">
    <script defer src="/script/header.js"></script>

</head>
<body>
    <header id="cabecalho"></header><br><br><br>
    
    <!-- formulario do cronograma -->
    <div class="div">
    <h1>Aqui você irá criar seu cronograma</h1><br>

    <form id="form" method="GET" action="./viewNewCronogram.php">
       
        <h2>Em quais matérias você sente ter mais dificuldade?</h2>
        <label>
            <input type="checkbox" name="materia[]" value='matematica'>
            Matemática
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='fisica'>
            Física
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='quimica'>
            Química
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='biologia'>
            Biologia
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='portugues'>
            Português
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='historia'>
            História
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='geografia'>
            Geografia
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='filosofia'>
            Filosofia
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='sociologia'>
            Sociologia
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='artes'>
            Artes
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='Ingles'>
            Inglês
        </label>
        <br><br>
        <label>
        Outras materias:
        </label>
        <label id="gerarInputs">
        <button id="outrasMaterias" type="text" onclick="novoInput()">Adicionar uma nova materia</button>
         <button id="apagarNovaMateria" onclick="deletarInput()">Apagar Materia</button><br>

        </label>
        <label class="novosInput"></label>

        <h2>Qual turno você tem disponivel para estudar?</h2>
        <label>
            <input type="checkbox" name="turnos[]" value='Manhã'>
            Manhã
        </label>
        <label>
            <input type="checkbox" name="turnos[]" value='Tarde'>
            Tarde
        </label>
        <label>
            <input type="checkbox" name="turnos[]" value='Noite'>
            Noite
        </label>
        <label>
            <input type="checkbox" name="turnos[]" value='Madrugada'>
            Madrugada
        </label><br><br>
        <button type="submit">Pronto</button>
    </form>
    </div>
    <script defer src="/script/cronogram/checkValidCronogram.js"></script>
    <script defer src="/script/cronogram/addOthersSubjects.js"></script>
</body>
</html>

<!--
    Dica de Rômulo é fazer uma página para cada pergunta
    -->
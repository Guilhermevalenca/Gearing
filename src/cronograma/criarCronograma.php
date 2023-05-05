<?php 
    require( "../verificacaoExistSession.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cronograma</title>

    <script defer src="/script/cabecalho.js"></script>
</head>
<body>
<button id="expandir"><i>opções</i></button><br>
    <div id="cabecalho"></div>
    <h1>Aqui você irá criar seu cronograma</h1>

    <!-- formulario do cronograma -->
    <form id="form" method="GET" action="./visualizarNovoCronograma.php">
        <h2 >Quais são os  dias da semana que você tem disponíveis para estudar?:</h2>
        <label>
            <input type="checkbox" name="dias[]" value="segunda">
            Segunda
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="terca">
            Terça
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="quarta">
            Quarta
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="quinta">
            Quinta
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="sexta">
            Sexta
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="sabado">
            Sábado
        </label>
        <label>
            <input type="checkbox" name="dias[]" value="domingo">
            Domingo
        </label>

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
        <br>
        <label id="gerarInputs">
            Outras materias:
         <button id="outrasMaterias" onclick="novoInput()">Adicionar uma nova materia</button>
         <button id="apagarNovaMateria" onclick="deletarInput()">Retirar uma nova materia</button><br>
        </label>
        <label>
        
        </label>
        <h2>Quanto tempo você pretende estudar para cada materia?</h2>
        <label>
            <input type="number" name="tempoMateria[]" min="15" max="60" step="5" required>
            minutos
        </label>
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
        <input type="submit">
    </form>
    <script defer src="/script/cronograma/verificarCronogramaValido.js"></script>
    <script defer src="/script/cronograma/adicionarOutrasMaterias.js"></script>
</body>
</html>

<!--
    Dica de Rômulo é fazer uma página para cada pergunta
    -->
<?php 
    include 'verificacaoExistUser.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cronograma</title>
</head>
<body>
    <?php session_start(); ?>
    <h1>Aqui você ira criar seu cronograma</h1>
    <form id="form" method="POST" action="./cronograma.php">
        <h2>Quais são os seus horários disponíveis para estudar em cada dia da semana?:</h2>
        <label>
            <input type="checkbox" name="horario[]" value="manha">
            manha
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="tarde">
            tarde
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="noite">
            noite
        </label>

        <h2>Quantas horas por dia você pode dedicar aos seus estudos?:</h2>
        <label>
            <input type="checkbox" name="tempo[]" value="umaH">
            Uma horas
        </label>
        <label>    
            <input type="checkbox" name="tempo[]" value="duasH">
            Duas horas
        </label>
        <label>
            <input type="checkbox" name="tempo[]" value="tresH">
            Tres horas
        </label>

        <h2>Qual materia voce sente ter mais dificuldade:</h2>
        <label>
            <input type="checkbox" name="materia[]" value='matematica'>
            matematica
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='portugues'>
            portugues
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='geografia'>
            geografia
        </label>
        <h2></h2>
            <input type="submit">
    </form>
    <script>
        var form = document.getElementById("form");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
            var tempoEstudar = form.elements["tempo[]"];
            function testehorario(){
                for (let i = 0; i < horarios.length; i++) {
                    if(horarios[i].checked) {
                        return true;
                    }
                }
            }
            function testeMateria(){
                for (let i = 0; i < materias.length; i++) {
                    if(materias[i].checked) {
                        return true;
                    }
                }
            }
            function testeTempo(){
                for (let i = 0; i < tempoEstudar.length; i++) {
                    if(tempoEstudar[i].checked) {
                        return true;
                    }
                }
            }
            if(!testeHorario){
                alert("Por favor, escolha uma disponibilidade");
            }if else(!testeMateria){
                alert("Por favor, escolha uma materia");
            }if else(!testeTempo){
                alert("Por favor, escolha um horario");
            }else{
                alert("conseguiu");
            }
        });
</script>
    <button onclick="window.location.href='./menu.php'">Voltar para o menu</button>
</body>
</html>
<!--
Quantas horas por dia você pode dedicar aos seus estudos?
Quais são os dias da semana em que você pode estudar?
Quais são os seus horários disponíveis para estudar em cada dia da semana?
Você precisa incluir algum tempo extra para revisões ou exercícios práticos?
Você possui algum prazo específico para concluir esses estudos?
Qual é o método de estudo que você costuma usar (ex: leitura, prática, resumos, etc.)?
-->
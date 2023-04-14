<?php 
    include "../verificacaoExistUser.php";
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
    <h1>Aqui você ira criar seu cronograma</h1>
    <!-- formulario do cronograma -->
    <form id="form" method="POST" action="./cronograma.php">
        <h2>Quais são seus dias e horários disponíveis para estudar na semana?:</h2>
        <label>
            <input type="checkbox" name="dia[]" value="segunda">
            Segunda
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="terca">
            Terça
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="quarta">
            Quarta
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="quinta">
            Quinta
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="sexta">
            Sexta
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="sabado">
            Sábado
        </label>
        <label>
            <input type="checkbox" name="dia[]" value="domingo">
            Domingo
        </label>

        <h2>Qual carga horária diária você pode disponibilizar para seus estudos?:</h2>
        <label>
            <input type="checkbox" name="horario[]" value="a">
            30min - 1h
        </label>
        <label>    
            <input type="checkbox" name="horario[]" value="b">
            2h 
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="c">
            3h
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="d">
            4h
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="e">
            5h +
        </label>

        <h2>Qual matéria voce sente ter mais dificuldade:</h2>
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

        <h2>Você precisa incluir algum tempo extra para revisões ou exercícios práticos?</h2>
        <label>
            <input type="checkbox" name="tempo[]" value='sim'>
            Sim <!-- adicionar a opção revisões e exercícios -->
        </label>
        <label>
            <input type="checkbox" name="tempo[]" value='nao'>
            Não
        </label><br>
        <input type="submit">
    </form>
    <script>
        //script para verificar se todas as perguntas tiveram ao menos uma resposta
        var form = document.getElementById("form");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            var horarios = form.elements["horario[]"];
            var materias = form.elements["materia[]"];
            var tempoEstudar = form.elements["tempo[]"];
            function teste(parametro){
                for (let i = 0; i < parametro.length; i++) {
                    if(parametro[i].checked) {
                        return true;
                    }
                }
            }
            if(!teste(horarios)){
                alert("Por favor, escolha uma disponibilidade");
            }else if(!teste(materias)){
                alert("Por favor, escolha uma materia");
            }else if(!teste(tempoEstudar)){
                alert("Por favor, escolha um horario");
            }else{
                form.submit();
            }
        });
</script>
    <button onclick="window.location.href='/src/menu.php'">Voltar para o menu</button>
</body>
</html>

<!--
    Dica de Rômulo é fazer uma página para cada pergunta
    -->
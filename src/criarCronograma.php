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
    <h1>Aqui você ira criar seu cronograma</h1>
    <!-- formulario do cronograma -->
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
            <input type="checkbox" name="tempo[]" value="a">
            a
        </label>
        <label>    
            <input type="checkbox" name="tempo[]" value="b">
            b
        </label>
        <label>
            <input type="checkbox" name="tempo[]" value="c">
            c
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
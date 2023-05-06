<?php 
    require( '../verificacaoExistSession.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/novoCronograma.css">
    <script defer src="/script/cabecalho.js"></script>
    <script src="/bibliotecas/sortable.js"></script>
</head>
<body>
<div id="expandir"></div>
    <div id="cabecalho"></div><br><br><br>
<h1>Termine de organizar seu cronograma:</h1>
<h2>Aqui estão suas materias:</h2>
<div id="origemMateria">
    <?php 
        foreach($_GET['materia'] as $materia):
    ?>
        <label class="materias"> 
        <?= $materia ?>
        <input type="hidden" name="materia[]" value="<?= $materia ?>">
        <input class="diaSemana" type="hidden" name="diaSemana[]">
        <input class="horario" type="hidden" name="horario[]">    
        </label>
    <?php endforeach ?>
</div>
<h2>Adicione suas materias a tabela</h2>
<form id="form" action="addCronograma.php" method="POST" >
<table id="table">
    <thead>
        <tr>
        <?php 
            foreach($_GET['turnos'] as $turnos):
        ?>
        <input type="hidden" name="turnos[]" value="<?= $turnos ?>">
        <?php endforeach ?>
        <?php 
            $diasDaSemana = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
            $turnoMadrugada = ["00:00","01:00","02:00","03:00","04:00","05:00"];
            $turnoManha= ["06:00","07:00","08:00","09:00","10:00","11:00"];
            $turnoTarde= ["12:00","13:00","14:00","15:00","16:00","17:00"];
            $turnoNoite= ["18:00","19:00","20:00","21:00","22:00","23:00"];
        ?>
        </tr>
        <tr>
            <th></th>
            <?php foreach($diasDaSemana as $dia): ?>
                <th><?= $dia ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_GET['turnos'] as $turno): ?>

        <?php if($turno == "Manhã"): ?>
            <?php foreach($turnoManha as $horas): ?>
                <tr>
                    <th><?= $horas ?></th>
                    <?php foreach($diasDaSemana as $dia): ?>
                        <td><div class="destinoMateria"></div></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

        <?php if($turno == "Tarde"): ?>
            <?php foreach($turnoTarde as $horas): ?>
                <tr>
                    <th><?= $horas ?></th>
                    <?php foreach($diasDaSemana as $dia): ?>
                        <td><div class="destinoMateria"></div></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

        <?php if($turno == "Noite"): ?>
            <?php foreach($turnoNoite as $horas): ?>
                <tr>
                    <th><?= $horas ?></th>
                    <?php foreach($diasDaSemana as $dia): ?>
                        <td><div class="destinoMateria"></div></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

        <?php if($turno == "Madrugada"): ?>
            <?php foreach($turnoMadrugada as $horas): ?>
                <tr>
                    <th><?= $horas ?></th>
                    <?php foreach($diasDaSemana as $dia): ?>
                        <td><div class="destinoMateria"></div></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

        <?php endforeach ?>
    </tbody>
</table>
<input type="submit" value="Salvar cronograma">
</form>
<script>
    const origemMateria = document.getElementById('origemMateria');
    const destinoMateria = document.querySelectorAll('.destinoMateria');
    new Sortable(origemMateria, {
        group: 'shared',
        animation: 150
    })
    destinoMateria.forEach(destino => {
        new Sortable(destino, {
            group: 'shared',
            animation: 150
        })
    })
    const form = document.getElementById('form');
    const table = document.getElementById('table');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let linha = 0;
        let coluna = 0;
        destinoMateria.forEach(divUnica =>{
            const diaSemana = divUnica.querySelectorAll('.diaSemana');
            const horario = divUnica.querySelectorAll('.horario');
            
            diaSemana.forEach(dia => {
                if(dia){
                    dia.value = coluna;
                    console.log(dia.value)
                }
            })
            horario.forEach(hora => {
                if(hora){
                    hora.value = linha;
                    console.log(hora.value)
                }
            })

            coluna++;
            if(coluna == 7){
                coluna = 0;
                linha++;
            }
        })
        form.submit();
    })

</script>
</body>
</html>
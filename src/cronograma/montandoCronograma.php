<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="/script/cabecalho.js"></script>
<style>
    .alojamento{
        border-style: solid;
        width: 9em;
        height: 1.5em;
    }
    .origemMateria{
        font-size: 0px;
        width: 0px;
    }
</style>
</head>
<body>
<div id="expandir"></div>
<div id="cabecalho"></div><br><br><br>
<?php
    $diasDaSemana = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
    $turnoMadrugada = ["00:00","01:00","02:00","03:00","04:00","05:00"];
    $turnoManha= ["06:00","07:00","08:00","09:00","10:00","11:00"];
    $turnoTarde= ["12:00","13:00","14:00","15:00","16:00","17:00"];
    $turnoNoite= ["18:00","19:00","20:00","21:00","22:00","23:00"];
?>
<?php $fp = fopen('cronograma.csv','r') ?>
<div class="origemMateria">
    <?php while( ($linha = fgetcsv($fp)) !== false): ?>
        <?php if($linha[1] == $_GET['id'] && $linha[0] == $_SESSION['username']): ?>
            <?php if($linha[2] == 'materia'): ?>
            <?php for($i = 3; $i < sizeof($linha); $i+=3): ?>
                <label class="materias">
                    <?= $linha[$i] ?>
                    <input class="horario" type="hidden" name="horario[]" value="<?= $linha[$i+1] ?>">
                    <input class="dia" type="hidden" name="dia[]" value="<?= $linha[$i+2] ?>">
                </label>
            <?php endfor ?>
            <?php endif ?>
        <?php endif ?>
    <?php endwhile ?>
</div>
<?php fclose($fp) ?>
<h2>Seu cronograma:</h2>
<table>
    <thead>
        <th></th>
    <?php foreach($diasDaSemana as $dia): ?>
        <th><?= $dia ?></th>
    <?php endforeach ?>
    </thead>
    <tbody>
        <?php $fp = fopen('cronograma.csv','r'); ?>
            <?php while( ($linha = fgetcsv($fp)) !== false): ?>
                <?php if($linha[0] == $_SESSION['username'] && $linha[1] == $_GET['id']): ?>
                    <?php if($linha[2] == "turnos"): ?>

                        <?php for($i = 3; $i < sizeof($linha); $i++): ?>
                        <?php if($linha[$i] == "Manhã"): ?>
                            <?php foreach($turnoManha as $hora): ?>
                                <tr>
                                    <th><?= $hora ?></th>
                                    <?php foreach($diasDaSemana as $dia): ?>
                                        <td class="alojamento"><div class="recebendoMaterias"></div></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>

                        <?php if($linha[$i] == "Tarde"): ?>
                            <?php foreach($turnoTarde as $hora): ?>
                                <tr>
                                    <th><?= $hora ?></th>
                                    <?php foreach($diasDaSemana as $dia): ?>
                                        <td class="alojamento"><div class="recebendoMaterias"></div></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>

                        <?php if($linha[$i] == "Noite"): ?>
                            <?php foreach($turnoNoite as $hora): ?>
                                <tr>
                                    <th><?= $hora ?></th>
                                    <?php foreach($diasDaSemana as $dia): ?>
                                        <td class="alojamento"><div class="recebendoMaterias"></div></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>

                        <?php if($linha[$i] == "Madrugada"): ?>
                            <?php foreach($turnoMadrugada as $hora): ?>
                                <tr>
                                    <th><?= $hora ?></th>
                                    <?php foreach($diasDaSemana as $dia): ?>
                                        <td class="alojamento"><div class="recebendoMaterias"></div></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php endfor ?>

                    <?php endif ?>
                <?php endif ?>
            <?php endwhile ?>
        <?php  fclose($fp) ?>
    </tbody>
</table>

<script>
const materias = document.querySelectorAll('.materias');
const recebendo = document.querySelectorAll('.recebendoMaterias');
materias.forEach(materia => {
    const horario = materia.querySelector('.horario');
    const diaSemana = materia.querySelector('.dia');
    let i = 0;
    let j = 0;
    recebendo.forEach( (valor) => {
        if(horario.value == i && diaSemana.value == j){ 
            valor.appendChild(materia);
        }
        j++;
        if(j == 7){
            j = 0;
            i++;
        }
    })
})
</script>
</body>
</html>

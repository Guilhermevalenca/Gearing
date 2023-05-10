<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    td{
        border-style: solid;
        width: 9em;
        height: 1.5em;
    }
</style>
</head>
<body>
<?php
    $diasDaSemana = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
    $turnoMadrugada = ["00:00","01:00","02:00","03:00","04:00","05:00"];
    $turnoManha= ["06:00","07:00","08:00","09:00","10:00","11:00"];
    $turnoTarde= ["12:00","13:00","14:00","15:00","16:00","17:00"];
    $turnoNoite= ["18:00","19:00","20:00","21:00","22:00","23:00"];
    $data = [];
    $fp = fopen('cronograma.csv','r');
    while( ($linha = fgetcsv($fp)) !== false){
        if($linha[1] == "materia"){
            for($indice = 1; $indice < sizeof($linha);$indice+=3){
                array_push($data,[$linha[$indice+1],$linha[$indice+2],$linha[$indice+3]]);
            }
        }
    }
    print_r($data);
?>
<h2>Seu cronograma:</h2>
<table>
    <thead>
        <th></th>
    <?php foreach($diasDaSemana as $dia): ?>
        <th><?= $dia ?></th>
    <?php endforeach ?>
    </thead>
    <tbody>
        <?php foreach($turnoManha as $linha => $manha): ?>
            <tr>
                <th><?= $manha ?></th>
                <?php foreach($diasDaSemana as $coluna => $dia): ?>
                    <?php foreach($data as $materia): ?>
                        <?php if($materia[1] == $linha && $materia[2] == $coluna): ?>
                            <td><?= $materia[0] ?></td>
                            <?php $boolean = false; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php if($boolean): ?>
                        <td></td>
                    <?php else: 
                        $boolean = true;    
                    ?>
                    <?php endif ?>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>
</html>

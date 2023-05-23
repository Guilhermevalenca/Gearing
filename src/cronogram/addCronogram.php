<?php 
    session_start();
    $horario = $_POST['horario'];
    $dia = $_POST['diaSemana'];
    //descobrindo nova id:
    $fp = fopen('cronogram.csv','r');
    $id = 0;
    while( ($linha = fgetcsv($fp)) !== false){
        if($_SESSION['username'] == $linha[0] && $id == $linha[1]){
            $id++;
        }
    }
    fclose($fp);
    //reunindo dados para materias:
    $dataMateria = [];
    $dataMateria[0] = $_SESSION['username'];
    $dataMateria[1] = $id;
    $dataMateria[2] = 'materia';
    foreach($_POST['materia'] as $indice => $materia){
        array_push($dataMateria,$materia,$horario[$indice],$dia[$indice]);
    }
    //reunindo dados para turnos:
    $dataTurnos = [];
    $dataTurnos[0] = $_SESSION['username'];
    $dataTurnos[1] = $id;
    $dataTurnos[2] = "turnos";
    foreach($_POST['turnos'] as $turnos){
        array_push($dataTurnos,$turnos);
    }
    //adicionando todos os dados:
    $fp = fopen('cronogram.csv','a');
    fputcsv($fp,$dataMateria);
    fputcsv($fp,$dataTurnos);
    fclose($fp);
    header('location: /src/cronogram/viewCronogram.php');
    ?>
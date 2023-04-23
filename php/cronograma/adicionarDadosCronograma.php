<?php
require("../dataSource.php");
session_start();
$user = $_SESSION['username'];
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location:/');
        exit();
    }
    //function para adicionar dados:
    function addUsersDados($dadosAlocacao,$alocacao){
        $user = $_SESSION['username'];
        $dados = [];
        array_push($dados,$user);
        $id = 1;
        $fp = fopen(cronograma,'r');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[0] == $user && $linha[1] == $id && $linha[2] == $alocacao){
                $id++;
            }
        }
        fclose($fp);
        array_push($dados,$id);
        array_push($dados,$alocacao);
        foreach ($dadosAlocacao as $novosElementos) {
            array_push($dados,$novosElementos);
        }
        $fp = fopen(cronograma,'a');
        fputcsv($fp,$dados);
        fclose($fp);
    }
    //adicionar dados:
    addUsersDados($_POST['disponibilidade'],"disponibilidade");
    addUsersDados($_POST['materia'],"materia");
    addUsersDados($_POST['dias'],"dias");
    addUsersDados($_POST['tempoMateria'],"tempoMateria");
    echo "dadosSalvos";
    header("location: /src/cronograma/visualizarCronogramas.php");
?>
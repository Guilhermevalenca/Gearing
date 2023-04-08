<?php
    session_start();
    function alterarDados($dadoDesejado){
        if($dadoDesejado == $_POST['userAtual']){

            $i = 0;
            $alteracao = $_POST['userNovo'];

        }else if($dadoDesejado == $_POST['nomeAtual']){

            $i = 1;
            $alteracao = $_POST['nomeNovo'];

        }else if($dadoDesejado == $_POST['emailAtual']){

            $i = 2;
            $alteracao = $_POST['emailNovo'];

        }
        $fp = fopen('usuarios.csv','r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false ){
            if($linha[$i] != $dadoDesejado){
                fputcsv($backup,$linha);
            }else{
                $dadosAlterados = $linha;
                $dadosAlterados[$i] = $alteracao;
                fputcsv($backup,$dadosAlterados);
            }
        }
        fclose($fp);
        fclose($backup);
        rename('backup.csv','usuarios.csv');
        $_SESSION['mensagem'] = "Seus dados foram alterados";
    }
    if(isset($_POST['userNovo'])){

        alterarDados($_POST['userAtual']);
    
    }else if(isset($_POST['nomeNovo'])){

        alterarDados($_POST['nomeAtual']);

    }else if(isset($_POST['emailNovo'])){

        alterarDados($_POST['emailAtual']);

    }
    header('location: /src/menu.php');
?>
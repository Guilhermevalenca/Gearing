<?php
    session_start();
    function alterarDados($dadoDesejado,$i,$alteracao){
        
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
    function verificacao($dado,$indice){
        $fp = fopen('usuarios.csv','r');
        while( ($linha = fgetcsv($fp)) !== false ){
            if($linha[$indice] == $dado){
                if($indice = 0){
                    $_SESSION['mensagem'] = "Este usuario ja está cadastrado, tente outro usuario";
                }else if($indice = 2){
                    $_SESSION['mensagem'] = "Este email ja estar em uso, tente outro email";
                }
                $_SESSION['user'] = $_POST['userAtual'];
                header('location: ./mostrarDados.php');
                exit();
            }
        }
    }
    if(isset($_POST['userNovo'])){

        verificacao($_POST['userNovo'],0);
        alterarDados($_POST['userAtual'],0,$_POST['userNovo']);
        $fp = fopen('dadosUsers.csv','r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false ){
            if($linha[0] != $_POST['userAtual']){
                fputcsv($backup,$linha);
            }else{
                $dadosAlterados = $linha;
                $dadosAlterados[0] = $_POST['userNovo'];
                fputcsv($backup,$dadosAlterados);
            }
        }
        fclose($fp);
        fclose($backup);
        rename('backup.csv','dadosUsers.csv');
        $_SESSION['username'] = $_POST['userNovo'];
    
    }else if(isset($_POST['nomeNovo'])){

        alterarDados($_POST['nomeAtual'],1,$_POST['nomeNovo']);

    }else if(isset($_POST['emailNovo'])){

        verificacao($_POST['emailNovo'],2);
        alterarDados($_POST['emailAtual'],2,$_POST['emailNovo']);

    }
    header('location: /src/menu.php');
?>
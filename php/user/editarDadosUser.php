<?php
    require("../dataSource.php");

    if(isset($_POST['userNovo'])){
        function editar($arquivo){
            $fp = fopen($arquivo,'r');
            $backup = fopen('backup.csv','w');
            while( ($linha = fgetcsv($fp)) !== false){
                if($linha[0] != $_SESSION['username']){
                    fputcsv($backup,$linha);
                }else{
                    $linha[0] = $_POST['userNovo'];
                    fputcsv($backup,$linha);
                }
            }
            fclose($fp);
            fclose($backup);
            rename('backup.csv',$arquivo);
        }
        editar(usuarios);
        editar(topicos);
        editar(cronograma);
        editar(session);
        $atualReferenciaTopico = geraTopico . $_SESSION['username'] . ".csv";
        $novaReferenciaTopico = geraTopico . $_POST['userNovo'] . ".csv";
        rename($atualReferenciaTopico,$novaReferenciaTopico);
        $_SESSION['username'] = $_POST['userNovo'];

    }else if(isset($_POST['nomeNovo'])){

        $fp = fopen(usuarios,'r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[1] != $_POST['nomeAtual']){
                fputcsv($backup,$linha);
            }else{
                $linha[1] = $_POST['nomeNovo'];
                fputcsv($backup,$linha);
            }
        }
        fclose($fp);
        fclose($backup);
        rename('backup.csv',usuarios);

    }else if(isset($_POST['emailNovo'])){
        $fp = fopen(usuarios,'r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false){
            if($linha[2] != $_POST['emailAtual']){
                fputcsv($backup,$linha);
            }else{
                $linha[2] = $_POST['emailNovo'];
                fputcsv($backup,$linha);
            }
        }
        fclose($fp);
        fclose($backup);
        rename('backup.csv',usuarios);
    }
    header('location: /src/userCRUD/mostrarDados.php');
?>
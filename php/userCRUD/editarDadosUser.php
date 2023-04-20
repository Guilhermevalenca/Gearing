    <?php
    require("../dataSource.php");
    function alterarDados($dadoDesejado,$i,$alteracao){        
        $fp = fopen(usuarios,'r');
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
        rename('backup.csv',usuarios);
        
    }
    if(isset($_POST['userNovo'])){

        alterarDados($_SESSION['username'],0,$_POST['userNovo']);
        $fp = fopen(cronograma,'r');
        $backup = fopen('backup.csv','w');
        while( ($linha = fgetcsv($fp)) !== false ){
            if($linha[0] != $_SESSION['username']){
                fputcsv($backup,$linha);
            }else{
                $dadosAlterados = $linha;
                $dadosAlterados[0] = $_POST['userNovo'];
                fputcsv($backup,$dadosAlterados);
            }
        }
        fclose($fp);
        fclose($backup);
        rename('backup.csv',cronograma);
        $_SESSION['username'] = $_POST['userNovo'];
    
    }else if(isset($_POST['nomeNovo'])){

        alterarDados($_POST['nomeAtual'],1,$_POST['nomeNovo']);

    }else if(isset($_POST['emailNovo'])){

        alterarDados($_POST['emailAtual'],2,$_POST['emailNovo']);

    }
    header('location:/src/userCRUD/mostrarDados.php');
?>
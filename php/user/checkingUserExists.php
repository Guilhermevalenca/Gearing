<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
       exit();
    }
    require("../dataSource.php");
    $fp = fopen(users,'r');
    while ( ($linha = fgetcsv($fp)) !== false){
        if ($linha[2] == $_POST['login'] && $linha[3] == $_POST['senha']) {
            if(isset($_POST['script'])){
                echo "tudoCerto";
                exit();
            }
            session_start();
            $_SESSION['username'] = $linha[0];
            $_SESSION['executeOne'] = true;
            header("location: /src/menu.php");
            exit();
        }
    }
    echo "tudoErrado";
    return;
?>

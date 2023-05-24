<?php 
    require("../dataSource.php");
	session_start();
    $novoTopico = geraTopico . $_SESSION['username'] . ".csv";
    if(file_exists($novoTopico)){
        echo "naoProssiga";
        exit();
    }else{
    	echo "prossiga";
    }
?>
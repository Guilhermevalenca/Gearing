<?php 
    require("../dataSource.php");
	session_start();
    $novoTopico = generateTopic . $_SESSION['username'] . ".csv";
    if(file_exists($novoTopico)){
        echo "naoProssiga";
        exit();
    }else{
    	echo "prossiga";
    }
?>
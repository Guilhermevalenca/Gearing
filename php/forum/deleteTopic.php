<?php 
	require("../dataSource.php");
	session_start();
	$caminhoDoArquivo = geraTopico . $_SESSION['username'] . ".csv";
	unlink($caminhoDoArquivo);
	$fp = fopen(topics,'r');
	$backup = fopen("backup.csv",'w');
	while( ($linha = fgetcsv($fp)) !== false){
		if($_SESSION['username'] != $linha[0]){
			fputcsv($backup,$linha);
		}
	}
	fclose($fp);
	fclose($backup);
	rename("backup.csv",topics);
	header("location: /src/forum/home.php");
?>
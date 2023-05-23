<?php
	require("../dataSource.php");
	$user = $_GET['user'];
	$id = $_GET['id'];
	$backup = fopen("backup.csv",'w');
	$timeline = fopen(cronogram,'r');
	while( ($linha = fgetcsv($timeline)) !== false ){
		if( ($linha[0] == $user && $linha[1] != $id) || $linha[0] != $user){
			fputcsv($backup,$linha);
		}
	}
	fclose($backup);
	fclose($timeline);
	rename("backup.csv",cronogram);
	header("location:/src/cronogram/viewCronogram.php");
?>
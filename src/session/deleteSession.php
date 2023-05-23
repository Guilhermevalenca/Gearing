<?php 
	$fp = fopen('./session/session.csv','r');
	$backup = fopen("backup.csv",'w');
	while( ($linha = fgetcsv($fp)) !== false){
		if($linha[0] != $_SESSION['username']){
			fputcsv($backup,$linha);
		}
	}
	fclose($fp);
	fclose($backup);
	rename('./backup.csv','./session/session.csv');
?>
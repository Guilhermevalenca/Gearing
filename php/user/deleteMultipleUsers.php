<?php
	require('../dataSource.php');
	$apagarUsers = $_POST['usuariosSelecionados'];
	if(!isset($apagarUsers)){
		echo "Nenhuma opção foi selecionada";
		echo "<a href='/'>Voltar</a>";
		exit();
	}
	$fp = fopen(usuarios,'r');
	$backup = fopen("backup.csv",'w');
	while( ($linha = fgetcsv($fp)) !== false){
		if(!in_array($linha[0], $apagarUsers)){
			fputcsv($backup, $linha);
		}
	}
	fclose($fp);
	fclose($backup);
	rename('backup.csv',usuarios);
	header('location: /src/user/listUsers.php');
?>

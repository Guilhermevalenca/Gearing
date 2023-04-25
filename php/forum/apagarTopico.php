<?php 
	require("../dataSource.php");
	session_start();
	$caminhoDoArquivo = geraTopico . $_SESSION['username'] . ".csv";
	unlink($caminhoDoArquivo);
	header("location: /src/forum/paginaPrincipal.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2>Você nao deveria ter chegado até aqui</h2>
	<h1>Apenas listando usuarios que criaram topicos:</h1>
<table>
	<?php 
		$fp = fopen('../topicos.csv','r');
		while( ($linha = fgetcsv($fp)) !== false):
	?>
		<tr>
			<th><?= $linha[0] ?></th>
		</tr>
	<?php endwhile ?>
</table>
<br><br>
<button onclick="window.location.href='../paginaPrincipal.php'">Voltar</button>
</body>
</html>
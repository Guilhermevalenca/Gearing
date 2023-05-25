<?php 
require("../verifyUserAuthentication.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script defer src="/script/header.js"></script>
	<link rel="stylesheet" href="/css/listUsers.css">
    <link rel="stylesheet" href="/css/global.css">
</head>
<body>
	<div id="cabecalho"></div><br><br><br>
	<h1>Gerenciando usuarios:</h1>
	<?php $usuarios = fopen('users.csv','r') ?>
	<form action="/php/user/deleteMultipleUsers.php" method="POST">
		<table>
			<tr>
				<th>
					<input type="submit" value="Apagar Usuarios selecionados">
				</th>
				<td>
					<input type="checkbox" id="selecionarTodos">
					Selecionar todos os usuarios
				</td>
			</tr>
			<?php while( ($linha = fgetcsv($usuarios)) !== false): ?>
				<tr>
					<th id= "usernames"><?= $linha[0] ?></th>
					<td>
						<input type="checkbox" name="usuariosSelecionados[]" value="<?= $linha[0] ?>">
						Selecionar usuario
					</td>
				</tr>
			<?php endwhile ?>
		</table>
	</form>
	<script defer src="/script/user/selectAllUsers.js"></script>
</body>
</html>
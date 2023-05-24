<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	exit();
}
if(!isset($_POST['login']) || !isset($_POST['senha'])){
	exit();
}
require('..dataSource.php');
$fp = fopen(users,'r');
while(($row = fgetcsv($fp)) !== false){
	if($row[2] == $_POST['login']){
	session_start();
	$_SESSION['username'] = $row[0];
	header('location: src/menu.php');
	}
}

 ?>

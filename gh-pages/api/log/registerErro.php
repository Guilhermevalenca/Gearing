<?php 
require '../accept.php';

$jsonData = file_get_contents('php://input');
$dataError = json_decode($jsonData,true);

$fp = fopen('./erro.log','a');
fputs($fp,$dataError);
fclose($fp);
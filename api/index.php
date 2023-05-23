<?php
// Defina o cabeçalho para indicar que a resposta será um JSON
require('./accept.php');
header('Content-Type: application/json');

$data = fopen('data.csv','r');
while( ($linha = fgetcsv($data)) !== false){
    if($linha[0] == $_POST["login"] && $linha[1] == $_POST["senha"]){
        $objeto = [
            'name' => 'Guilherme Valença'
        ];
    }
}
if(!isset($objeto)){
    $objeto = [
        'name' => "falha"
    ];
}
// Converte o objeto em JSON
$json = json_encode($objeto);

// Retorna o JSON como resposta
echo $json;

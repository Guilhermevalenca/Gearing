<?php

require '../accept.php';
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $json = file_get_contents('php://input');
    $formData = json_decode($json, true);
    
    require './functionsAuth.php';
    
    $fp = fopen('dataUsers.csv','r');
    $dataUser = [];
    while( ( $row = fgetcsv($fp) ) !== false ){
        if($row[0] == $formData['email'] && $row[1] == $formData['password']){

            $dataUser = [
                'username' => $row[2],
                'email' => $row[0]
            ];
            echo json_encode($dataUser);
            authorizing($row[0]);
            exit();
        }
    }
}

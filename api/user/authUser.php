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
        if($row[1] == $formData['email'] && $row[2] == $formData['password']){

            $dataUser = [
                'username' => $row[0],
                'email' => $row[1]
            ];
            echo json_encode($dataUser);
            authorizing($row[1]);
            exit();
        }
    }
}

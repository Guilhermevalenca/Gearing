<?php
require '../accept.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $json = file_get_contents('php://input');
    $dataNewUser = json_decode($json, true);

    $fp = fopen('dataUsers.csv','r');
    while( ( $row = fgetcsv($fp) ) !== false ){
        if($row[1] == $dataNewUser['email']){
            exit();
        }
    }
    fclose($fp);
    array_push($dataNewUser,"false");

    $fp = fopen('dataUsers.csv','a');
    fputcsv($fp, $dataNewUser);
    fclose($fp);

    echo "sucess";
}
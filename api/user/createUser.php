<?php
require '../accept.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $json = file_get_contents('php://input');
    $dataNewUser = json_decode($json, true);

    $fp = fopen('dataUsers.csv','r');
    while( ( $row = fgetcsv($fp) ) !== false ){
        if($row[0] == $dataNewUser['email']){
            exit();
        }
    }
    
}
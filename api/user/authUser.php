<?php
session_start();
require '../accept.php';
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $json = file_get_contents('php://input');
    $formData = json_decode($json, true);

    function authorizing($id) {
            $origin = fopen('dataUsers.csv','r');
            $destino = fopen('backup.csv','w');
            while( ($row = fgetcsv($origin)) !== false ){
                if($row[0] == $id){
                    $row[3] = true;
                    fputcsv($destino,$row);
                }else{
                    fputcsv($destino,$row);
                }
            }
    }

    $fp = fopen('dataUsers.csv','r');
    $dataUser = [];
    while( ($row = fgetcsv($fp)) !== false ){
        if($row[0] == $formData['email'] && $row[1] == $formData['password']){
            $_SESSION['auth'] = true;
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

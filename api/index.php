<?php 
    session_start();
    require('./accept.php');
    header('Content-Type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);

        $fp = fopen('data.csv','r');
        $response = [];
        while( ($row = fgetcsv($fp)) !== false){
            if($row[0] == $data['login'] && $row[1] == $data['password']){
                $response = [
                    'name' => $row[0],
                    'mensagem' => $row[2]
                ];
                break;
            }
        }
        echo json_encode($response);
    }
?>
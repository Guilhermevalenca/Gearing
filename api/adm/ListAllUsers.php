<?php

require '../conf/init.php';

$data = json_decode(file_get_contents('php://input'),true);

alterSession($data['id']);

if($_SESSION['controller'] == 1){
    $conn->beginTransaction();
    $response = [];
    try{
        $sqlAdms = "SELECT user_name, user_email FROM GEA_USER WHERE user_controller = '1';";
        $sqlOthers = "SELECT user_name, user_email FROM GEA_USER WHERE user_controller = '0';";
        $resultAdms = $conn->query($sqlAdms);
        $resultOthers = $conn->query($sqlOthers);
        $response['users'] = [
            'adms' => $resultAdms->fetchAll(PDO::FETCH_ASSOC),
            'others' => $resultOthers->fetchAll(PDO::FETCH_ASSOC)
        ];
        $response['success'] = true;
    }catch (PDOException $e){
        $response['error'] = $e->getMessage();
    }
    echo json_encode($response);
}
<?php
require '../conf/init.php';

$searchDataTopic = json_decode(file_get_contents('php://input'),true);

$searchByTopic = $searchDataTopic['idTopic'];

$response = [];

$sql = "SELECT top_title,top_user_name,top_description,top_date,top_user_email FROM GEA_TOPIC WHERE top_id = '$searchByTopic';";

try{
    $result = $conn->query($sql);
    $dataTopic = $result->fetchAll(PDO::FETCH_ASSOC);
    $response = [
        'success' => true,
        'dataTopic' => [
            'name' => $dataTopic[0]['top_user_name'],
            'title' => $dataTopic[0]['top_title'],
            'description' => $dataTopic[0]['top_description'],
            'date' => $dataTopic[0]['top_date'],
            'email' => $dataTopic[0]['top_user_email']
        ]
    ];
}catch (PDOException $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
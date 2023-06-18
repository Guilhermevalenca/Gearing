<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$response = [];

try{
    $sql = "SELECT top_title,top_description,top_user_email,top_user_name FROM GEA_TOPIC;";
    $result = $conn->query($sql);
    $response['topic'] = [];
    foreach($result as $data){
        array_push($response['topic'],array(
            "title" => $data['top_title'],
            "description" => $data['top_description'],
            "email" => $data['top_user_email'],
            "name" => $data['top_user_name']
        ));
    } 
    $response['success'] = true;
}catch (PDOException $e){
    $response['success'] = true;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);

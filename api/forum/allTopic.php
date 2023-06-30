<?php 
require('../conf/init.php');

$response = [];

try{
    $sql = "SELECT top_id,top_title,top_description,top_user_email,top_user_name,top_date FROM GEA_TOPIC;";
    $result = $conn->query($sql);
    $response['topic'] = [];
    foreach($result as $data){
        array_push($response['topic'],array(
            "title" => $data['top_title'],
            "description" => $data['top_description'],
            "email" => $data['top_user_email'],
            "name" => $data['top_user_name'],
            "date" => $data['top_date'],
            "id" => $data['top_id']
        ));
    } 
    $response['success'] = true;
}catch (PDOException $e){
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);

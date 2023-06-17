<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$response = [];

try{
    $sql = "SELECT top_name,top_description,top_user_email FROM GEA_TOPIC;";
    $result = $conn->query($sql);
    foreach($result as $data){
        array_push($response,array(
            "title" => $data['top_name'],
            "description" => $data['top_description'],
            "email" => $data['top_user_email']
        ));
    } 
}catch (PDOException $e){
    exit();
}
echo json_encode($response);

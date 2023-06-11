<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$response = [];

try{
    $sql = "SELECT * FROM GEA_TOPIC;";
    $result = $conn->query($sql);
    foreach($result as $data){
        array_push($response,$data);
    } 
}catch (PDOException $e){
    exit();
}
echo json_encode($response);

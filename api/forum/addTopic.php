<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$json = file_get_contents('php://input');
$topicData = json_decode($json, true);

$id = $topicData['id'];
$name = $topicData['name'];
$description = $topicData['description'];

session_write_close();
session_id($id);
session_start();

$email = $_SESSION['email'];

$response = [];

try{
    $sql = "SELECT top_name, top_user_email FROM GEA_TOPIC 
            WHERE top_name = '$name' AND top_user_email = '$email';";
    $result = $conn->query($sql);
    foreach($result as $data){
        if($data['top_name'] && $data['top_user_email']){
            $response['topicExist'] = 'true';
            echo json_encode($response);
            exit();
        }
    }
}catch (PDOException $e) {
    $response['error'] = 'true';
    $response['problem'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

try{
    $sql = "INSERT INTO GEA_TOPIC (top_name,top_description,top_user_email)
            VALUES ('$name','$description', '$email');";
    $result = $conn->exec($sql);
}catch (PDOException $e){
    $response['error'] = 'true';
    $response['problem'] =$e->getMessage();
    echo json_encode($response);
    exit();
}

$response['success'] = 'true';
echo json_encode($response);
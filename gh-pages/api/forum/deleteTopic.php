<?php
require '../conf/init.php';

$data = json_decode(file_get_contents('php://input'),true);

alterSession($data['id']);

$email = $_SESSION['email'];
$id = $data['idTopic'];

$response = [];

try{
    $sql = "DELETE FROM GEA_TOPIC WHERE top_id = :idTopic AND top_user_email = :email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idTopic',$id);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $response['success'] = true;
}catch (PDOException $e){
    $response['error'] = $e;
}

echo json_encode($response);
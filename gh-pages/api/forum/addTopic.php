<?php 
require('../conf/init.php');
//header("Access-Control-Allow-Methods: POST");

$json = file_get_contents('php://input');
$topicData = json_decode($json, true);

$id = $topicData['id'];
$name = $topicData['name'];
$description = $topicData['description'];
$title = $topicData['title'];

alterSession($id);

$email = $_SESSION['email'];

$response = [];

try{
    $sql = "INSERT INTO GEA_TOPIC (top_title,top_description,top_user_email,top_user_name)
    VALUES (:title, :description, :email, :name);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title',$title);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':name',$name);
    $stmt->execute();

    $response['success'] = true;
}catch (PDOException $e){
    $response['error'] = true;
    $response['problem'] =$e->getMessage();
}
echo json_encode($response);

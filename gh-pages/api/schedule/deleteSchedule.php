<?php
require('../conf/init.php');

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$id = $scheduleData['id'];
$title = $scheduleData['title'];

alterSession($id);

$email = $_SESSION['email'];

//deleting schedule
$response = [];
try{
    $sql = "DELETE FROM GEA_SCHEDULE WHERE sche_user_email = :email AND sche_title = :title;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':title',$title);
    $stmt->execute();
}
catch (PDOException $e){
    exit();
}
$response = [
    'result' => 'true'
];

echo json_encode($response);

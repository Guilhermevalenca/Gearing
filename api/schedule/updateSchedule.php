<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$updateSubjects = $scheduleData['update'];
$id = $scheduleData['id'];
$title = $scheduleData['title'];

alterSession($id);

$email = $_SESSION['email'];
$response = [];
//update schedule part 1
try{
    $sql = "DELETE FROM GEA_SUBJECT WHERE sub_sche_title = '$title' AND sub_sche_user_email = '$email';";
    $result = $conn->query($sql);
}catch (PDOException $e){
    $response['error'] = true;
    $response['problem'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

try{
    $stmt = $conn->prepare('INSERT INTO GEA_SUBJECT (sub_name, sub_day, sub_hour, sub_sche_title, sub_sche_user_email) VALUES (?, ?, ?, ?, ?)');
    foreach($updateSubjects as $row => $listSubjects) {
        foreach($listSubjects as $column => $subject) {
            if($subject){
                $stmt->execute([$subject, $column, $row, $title, $email]);
            }        
        }
    }
    $response['success'] = true;
}catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
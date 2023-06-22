<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');
//schedule data
$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

//separating data
$schedule = $scheduleData['schedule'];
$titleSchedule = $scheduleData['title'];
$shift = $scheduleData['shift'];
$id = $scheduleData['id'];

//altering session
alterSession($id);

//search user email
$email = $_SESSION['email'];

//preparing response
$response = [];

$sqlAddSchedule = "INSERT INTO GEA_SCHEDULE (sche_title,sche_shifts,sche_user_email) 
VALUES ('$titleSchedule','$shift','$email');"; 

$sqlAddSubjects = "INSERT INTO GEA_SUBJECT (sub_name,sub_day,sub_hour,sub_sche_title,sub_sche_user_email)
VALUES (?,?,?,?,?);";

$conn->beginTransaction();

try{
    $conn->exec($sqlAddSchedule);
    $stmt = $conn->prepare($sqlAddSubjects);
    foreach($schedule as $row => $listSubjects) {
        foreach($listSubjects as $column => $subject) {
            if($subject){
                $stmt->execute([$subject,$column,$row,$titleSchedule,$email]);
            }        
        }
    }
    $response['success'] = true;
    $conn->commit();
}catch (PDOException $e){
    $response['error'] = $e->getMessage();
    $conn->rollBack();
}

echo json_encode($response);

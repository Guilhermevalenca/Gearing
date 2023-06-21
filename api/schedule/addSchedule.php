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

//user created schedule
try{
    $sql = "INSERT INTO GEA_SCHEDULE (sche_title,sche_shifts,sche_user_email) 
    VALUES ('$titleSchedule','$shift','$email');";
    $execute = $conn->exec($sql);
}catch (PDOException $e){
    $response['failedCreatedSchedule'] = $e->getMessage();
    echo json_encode($response);
    exit();
}

$sql = "INSERT INTO GEA_SUBJECT (sub_name,sub_day,sub_hour,sub_sche_title,sub_sche_user_email)
        VALUES (?,?,?,?,?);";

$stmt = $conn->prepare($sql);
try{
    foreach($schedule as $row => $listSubjects) {
        foreach($listSubjects as $column => $subject) {
            if($subject){
                $stmt->execute([$subject,$column,$row,$titleSchedule,$email]);
            }        
        }
    }
    $response['success'] = true;
}
catch (PDOException $e) {
    $response['success'] = false;
    $response['addSubjectFailed'] = $e->getMessage();
}

echo json_encode($response);

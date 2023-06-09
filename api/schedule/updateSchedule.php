<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$updateSubjects = $scheduleData['update'];
$id = $scheduleData['id'];
$title = $scheduleData['title'];

//altering session
session_write_close();
session_id($id);
session_start();

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

//update schedule part 2
foreach($updateSubjects as $row => $listSubjects){
    foreach($listSubjects as $column => $subject){
        if($subject){
            try{
                $sql = "INSERT INTO GEA_SUBJECT (sub_name, sub_day, sub_hour, sub_sche_title, sub_sche_user_email) 
                VALUE ('$subject','$column','$row','$title','$email');";
                $execute = $conn->exec($sql);
            }
            catch (PDOException $e){
                $response['saveSubjectError'] = "true";
                $response['problem'] = $e->getMessage();
            }
        }
    }
}
$response['success'] = "true";
echo json_encode($response);
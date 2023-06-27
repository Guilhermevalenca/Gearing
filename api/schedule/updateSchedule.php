<?php 
require('../conf/init.php');

$receivingJson = file_get_contents('php://input');
$scheduleData = json_decode($receivingJson, true);

$updateSubjects = $scheduleData['update'];
$id = $scheduleData['id'];
$title = $scheduleData['title'];

alterSession($id);

$email = $_SESSION['email'];
$response = [];

$sqlDeleteSubject = "DELETE FROM GEA_SUBJECT WHERE sub_sche_title = '$title' AND sub_sche_user_email = '$email';";
$sqlUpdateSubject = "INSERT INTO GEA_SUBJECT (sub_name, sub_day, sub_hour, sub_sche_title, sub_sche_user_email) VALUES (?, ?, ?, ?, ?);";

$conn->beginTransaction();

try{
    $conn->exec($sqlDeleteSubject);
    $stmt = $conn->prepare($sqlUpdateSubject);
    foreach($updateSubjects as $row => $listSubjects) {
        foreach($listSubjects as $column => $subject) {
            if($subject){
                $stmt->execute([$subject, $column, $row, $title, $email]);
            }        
        }
    }
    $response['success'] = true;
    $conn->commit();
} catch (PDOException $e) {
    $response['error'] = $e->getMessage();
    $conn->rollBack();
}

echo json_encode($response);
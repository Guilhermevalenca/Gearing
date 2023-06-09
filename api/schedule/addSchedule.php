<?php 
require('../conf/init.php');

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

$conn->beginTransaction();

try{
    $sqlAddSchedule = "INSERT INTO GEA_SCHEDULE (sche_title,sche_shifts,sche_user_email) VALUES (:title,:shift,:email);";
    $stmt = $conn->prepare($sqlAddSchedule);
    $stmt->bindParam(':title',$titleSchedule);
    $stmt->bindParam(':shift',$shift);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    
    $sqlAddSubjects = "INSERT INTO GEA_SUBJECT (sub_name,sub_day,sub_hour,sub_sche_title,sub_sche_user_email) VALUES (:subject, :days, :hours, :titleSchedule, :email);";
    $stmt = $conn->prepare($sqlAddSubjects);
    foreach($schedule as $row => $listSubjects) {
        foreach($listSubjects as $column => $subject) {
            if($subject){
                $stmt->bindParam(':subject',$subject);
                $stmt->bindParam(':days',$column);
                $stmt->bindParam(':hours',$row);
                $stmt->bindParam(':titleSchedule',$titleSchedule);
                $stmt->bindParam(':email',$email);
                $stmt->execute();
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

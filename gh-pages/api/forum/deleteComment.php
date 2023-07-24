<?php 
require '../conf/init.php';

$data = json_decode(file_get_contents('php://input'),true);

alterSession($data['id']);

$email = $_SESSION['email'];
$id = $data['idComment'];

$response = [];

try{
    $sql = "DELETE FROM GEA_COMMENTS WHERE com_id = :id AND com_user_email = :email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$id);;
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $response['success'] = true;
}catch (PDOException $e){
    $response['error'] = $e;
}

echo json_encode($response);
<?php
require('../conf/init.php');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$id = $data['id'];
$title = $data['title'];
$commentId = $data['commentId'];

alterSession($id);

$email = $_SESSION['email'];

$response = [];
try{
    $sql = "SELECT com_message FROM GEA_COMMENTS WHERE com_top_title = :title AND com_user_email = :email AND com_id = :commentId;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title',$title);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':commentId',$commentId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $dataResult) {
        $response['message'] = $dataResult['com_message'];
    }
    $response['success'] = true;
}catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
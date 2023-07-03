<?php
require('../conf/init.php');
//header("Access-Control-Allow-Methods: POST");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$id = $data['id'];
alterSession($id);

$email = $_SESSION['email'];

$response = [];

$sql = "SELECT user_controller FROM GEA_USER WHERE user_email = '$email';";
try{
    $result = $conn->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $response['adm'] = $data[0]['user_controller'];
    $response['success'] = true;
    $_SESSION['controller'] = $data[0]['user_controller'];
} catch(PDOException $e) {
    $response['error'] = $e->getMessage();
}
echo json_encode($response);
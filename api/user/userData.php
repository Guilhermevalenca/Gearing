<?php 
require('../conf/init.php');

//receiving json
$json = file_get_contents('php://input');
//decoding json
$jsonData = json_decode($json,true);

$email = hash('sha256',$jsonData['email']);
$pass = hash('sha256',$jsonData['password']);

$responseData = [];

try{
    $sql = "SELECT user_email FROM GEA_USER WHERE user_email = '$email' AND user_password = '$pass';";
    $result = $conn->query($sql);
    if(isset($result)){
        $responseData['success'] = true;
    }
} catch(PDOException $e) {
    $responseData['error'] = $e->getMessage();
}
echo json_encode($responseData);

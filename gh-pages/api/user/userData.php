<?php 
require('../conf/init.php');

//receiving json
$json = file_get_contents('php://input');
//decoding json
$jsonData = json_decode($json,true);

$email = $jsonData['email'];
$pass = $jsonData['password'];

$responseData = [];

try{
    $sql = "SELECT user_email,user_password FROM GEA_USER WHERE user_email = '$email';";
    $stmt = $conn->query($sql);
    if(isset($stmt)){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $data) {
            if($pass === decryption($data['user_password'])){
                $responseData['success'] = true;
            }
        }
    }
} catch(PDOException $e) {
    $responseData['error'] = $e->getMessage();
}
echo json_encode($responseData);

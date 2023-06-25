<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

require('../functions.php');

//receiving json
$json = file_get_contents('php://input');
//decoding json
$jsonData = json_decode($json,true);

$email = $jsonData['email'];

$sql = "SELECT user_password FROM GEA_USER WHERE user_email = '$email';";
$result = $conn->query($sql);
if(isset($result)){
    foreach($result as $userData){
        $pass = $userData['user_password'];
        $responseData = [
            'password' => decryption("$pass",$encryptionKey)
        ];
        echo json_encode($responseData);
        exit();
    }
}
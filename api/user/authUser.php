<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//functions global
require('../functions.php');

//authenticate user
$receivingJson = file_get_contents('php://input');
$testingData = json_decode($receivingJson, true);

//reserving user data
$email = $testingData['email'];
$password = $testingData['password'];

$cripPass = encryption("$password",$encryptionKey);

$responseData = [];

$id = session_id();

//looking for user
try{
    $sql = "SELECT user_email,user_name FROM GEA_USER;";
    $result = $conn->query($sql);
    if(isset($result)){
        foreach($result as $userData){
            $testEmail = $userData['user_email']; $testPass = $userData['user_password'];
            if($email == decryption("$testEmail",$encryptionKey) && $password == decryption($testPass,$encryptionKey)){
                $responseData['user'] = [
                    'username' => $userData['user_name'],
                    'email' => encryption("$email",$encryptionKey),
                    'id' => encryption("$id",$encryptionKey),
                    'auth' => true
                ];
                $_SESSION['AUTH'] = true;
                $_SESSION['email'] = $userData['user_email'];
                $_SESSION['name'] = $userData['user_name'];
            }
        }
    }
}
catch (PDOException $e) {
    $responseData['error'] = $e->getMessage();
}

echo json_encode($responseData);
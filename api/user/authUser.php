<?php 
//accepting request
require '../accept.php';

//establishing connection with the bank
require '../establishingConnection.php';

//authenticate user
$receivingJson = file_get_contents('php://input');
$testingData = json_decode($receivingJson, true);

//reserving user data
$email = $testingData['email'];
$password = $testingData['password'];

//looking for user
$sql = "SELECT user_email,user_name FROM GEA_USER WHERE user_email = '$email' AND user_password = '$password';";
$result = $conn->query($sql);
if(isset($result)){
    foreach($result as $userData){
        $responseData = [
            'username' => $userData['user_name'],
            'email' => $userData['user_email'],
            'id' => session_id()
        ];
        $_SESSION['AUTH'] = true;
        $_SESSION['email'] = $userData['user_email'];
        echo json_encode($responseData);
        exit();
    }
}

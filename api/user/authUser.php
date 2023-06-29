<?php 
require('../conf/init.php');

//authenticate user
$receivingJson = file_get_contents('php://input');
$testingData = json_decode($receivingJson, true);

//reserving user data
$email = $testingData['email'];
$password = $testingData['password'];

$responseData = [];
$id = session_id();
$cripId = encryption($id);
//looking for user
try{
    $sql = "SELECT user_email,user_name,user_password FROM GEA_USER WHERE user_email = '$email';";
    $stmt = $conn->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(isset($data)){
        if($password === decryption($data[0]['user_password'])){
            $responseData['user'] = [
                'username' => $data[0]['user_name'],
                'email' => $data[0]['user_email'],
                'id' => $cripId,
                'auth' => true
            ];
            $responseData['success'] = true;
            $_SESSION['AUTH'] = true;
            $_SESSION['email'] = $data[0]['user_email'];
            $_SESSION['name'] = $data[0]['user_name'];
        }
    }
}
catch (PDOException $e) {
    $responseData['error'] = $e->getMessage();
    echo json_encode($responseData);
}

echo json_encode($responseData);
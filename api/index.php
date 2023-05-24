<?php 
    $requestingFiles = ['./accept.php','./dataSource.php'];
    
    foreach($requestingFiles as $file){
        require $file;
    }

    $json = file_get_contents('php://input');
    $check = json_decode($json, true);

    $fp = fopen(users,'r');
    while( ($row = fgetcsv($fp)) !== false ){
        if($row[0] == $check['email']){
            echo json_encode($row[3]);
            exit();
        }
    }
?>
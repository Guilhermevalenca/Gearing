<?php 
    header('Content-Type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $data = json_decode($json,true);

        require('generateToken.php');

        $response = [];
        if(!empty( $data['login'] ) && !empty( $data['password'] ) ){
            $fp = fopen('data.csv','r');
            if($fp){
                while( ($row = fgetcsv($fp)) !== false){
                    if($row[0] == $data['login'] && $row[1] == $data['password']){
                        $response['usersData'] = generateToken([
                            'nome' => $row[0],
                            'senha' => $row[1]
                        ]);
                        break;
                    }
                }
            }
            fclose($fp);
            echo json_encode($response);
        }
    }
?>
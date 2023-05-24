<?php
function changingAuthorization($id,$auth) {
    $origin = fopen('dataUsers.csv','r');
    $destino = fopen('backup.csv','w');
    while( ($row = fgetcsv($origin)) !== false ){
        if($row[0] == $id){
            $row[3] = $auth;
            fputcsv($destino,$row);
        }else{
            fputcsv($destino,$row);
        }
    }
    fclose($origin);
    fclose($destino);
    rename('./backup.csv','./dataUsers.csv');
}
function authorizing($id){
    changingAuthorization($id,"true");
}
function revokingAuthorization($id){
    changingAuthorization($id,"false");
}
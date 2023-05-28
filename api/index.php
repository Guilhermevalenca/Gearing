<?php
//estabelecendo conexção com o banco de dados:
require('./establishingConnection.php');
//inserindo informações no banco:
// $email = "guilhem3vrp@gmail.com";
// $name = "Guilherme Valença";
// $password = "1234";
// try {
//     $sql = "INSERT INTO GEA_USER (user_email,user_name,user_password)
//     VALUES ('$email','$name','$password');";
//     $rowCount = $conn->exec($sql);
//     echo "Dados adicionados com sucesso";
// }catch (PDOException $e){
//     echo "Deu erro nessa bagaça:" . $e-> getMessage(); 
// }
//puxando informações do banco:
try {
    $sql = "SELECT * FROM GEA_USER;";
    $result = $conn->query($sql);
    foreach($result as $info){
        print_r($info);
    }
    echo "Todas informações concluidas";
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
?>


<?php 

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalResult"])){
    require("../dataSource.php");
    $fp = fopen(methodology, "a");
    fputcsv($fp, [$_SESSION["username"], $_POST["finalResult"]]);
    fclose($fp);
    header("location: /src/cronograma/criarCronograma.php");
}

?>
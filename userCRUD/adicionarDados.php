<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        exit();
    }
    if($_POST['senha'] !== $_POST['confirmaSenha']):
?>
<h1>OPS! sua senha e a confirmação da sua senha estão diferentes</h1>
<a href="./criandoNovoUser.html">Criar Usuario</a>
<?php exit(); endif ?>
<?php 
    $fp = fopen('usuarios.csv','a');
    fputcsv($fp,array($_POST['user'],$_POST['nome'],$_POST['email'],$_POST['senha']));
    fclose($fp);
    $user = $_POST['user'];
    header("location:/src/menu.php?user=$user");
?>

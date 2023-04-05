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
    $fp = fopen('usuarios.csv','r');
    while( ($linha = fgetcsv($fp)) !== false ):
        if($linha[0] == $_POST['user'] || $linha[2] == $_POST['email']):
?>
    <h1>Perdão, este usuario ou email ja estar cadastrado</h1>
    <a href="./criandoNovoUser.html">Voltar</a>
<?php exif(); endif; ?>
<?php endwhile; ?>
<?php 
    $fp = fopen('usuarios.csv','a');
    fputcsv($fp,array($_POST['user'],$_POST['nome'],$_POST['email'],$_POST['senha']));
    fclose($fp);
    session_start();
    $_SESSION['username'] = $_POST['user'];
    header('location: /src/menu.php');
?>
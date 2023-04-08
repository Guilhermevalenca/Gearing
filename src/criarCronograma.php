<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cronograma</title>
</head>
<body>
    <?php session_start(); ?>
    <h1>Aqui você ira criar seu cronograma</h1>
    <form method="POST" action="./cronograma.php">
        <h2>Em qual momento você se encontra mais disponivel:</h2>
        <label>
            <input type="checkbox" name="horario[]" value="manha">
            manha
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="tarde">
            tarde
        </label>
        <label>
            <input type="checkbox" name="horario[]" value="noite">
            noite
        </label>

        <h2>Qual materia voce sente ter mais dificuldade:</h2>
        <label>
            <input type="checkbox" name="materia[]" value='matematica'>
            matematica
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='portugues'>
            portugues
        </label>
        <label>
            <input type="checkbox" name="materia[]" value='geografia'>
            geografia
        </label>
        <h2></h2>
        <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
        <input type="submit">
    </form>
    <button onclick="window.location.href='./menu.php'">Voltar para o menu</button>
    <?php if($_SESSION['mensagem'] != ''): ?>
        <h2>Alerta: <?= $_SESSION['mensagem'] ?></h2>
    <?php $_SESSION['mensagem'] = ''; endif ?>
</body>
</html>
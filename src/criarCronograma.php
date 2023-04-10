<?php 
    include 'verificacaoExistUser.php';
?>
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
        <h2>Quais são os seus horários disponíveis para estudar em cada dia da semana?:</h2>
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

        <h2>Quantas horas por dia você pode dedicar aos seus estudos?:</h2>
        <label>
            <input type="checkbox" name="tempo[]" value="">

            <input type="checkbox" name="tempo[]" value="">

            <input type="checkbox" name="tempo[]" value="">
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
        <br>
        <label>
            <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
            <input type="submit">
        </label>
    </form>
    <button onclick="window.location.href='./menu.php'">Voltar para o menu</button>
    <?php if($_SESSION['mensagem'] != ''): ?>
        <h2>Alerta: <?= $_SESSION['mensagem'] ?></h2>
    <?php $_SESSION['mensagem'] = ''; endif ?>
</body>
</html>
<!--
Quantas horas por dia você pode dedicar aos seus estudos?
Quais são os dias da semana em que você pode estudar?
Quais são os seus horários disponíveis para estudar em cada dia da semana?
Você precisa incluir algum tempo extra para revisões ou exercícios práticos?
Você possui algum prazo específico para concluir esses estudos?
Qual é o método de estudo que você costuma usar (ex: leitura, prática, resumos, etc.)?
-->
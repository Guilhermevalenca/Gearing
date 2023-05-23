<?php
   require("../verifyUserAuthentication.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $fp = fopen('methodology.csv', "r");
    while( ($row = fgetcsv($fp)) !== false){
        if($row[0] == $_SESSION["username"]){
            $saveMethod = $row[1];
        }
    }
?>

<?php

    if($saveMethod == "assimilador"): ?>
    <h1><?= $saveMethod ?></h1>
    <p>São indivíduos menos sociais, mais herméticos. Caracterizam-se por serem mais teóricos e reflexivos, raciocinando de acordo com uma lógica indutiva e de observação até conseguirem a abstração e a teorização. Além disso, são organizados e metódicos.</p>
<?php elseif($saveMethod == "divergente"): ?>
    <h1><?= $saveMethod ?></h1>
    <p> São imaginativos e consideram diferentes perspectivas para resolver problemas. Diz-se que são cinestésicos e que aprendem com o movimento. Além disso, são flexíveis, criativos, espontâneos e experimentais.</p>
<?php elseif($saveMethod == "convergente"): ?>
    <h1><?= $saveMethod ?></h1>
    <p>Pessoa racional e prática, pragmática, organizada, analítica, mais orientada aos objetos do que às pessoas. Assim, ela é capaz de resolver problemas aplicando o raciocínio hipotético-dedutivo.</p>
<?php elseif($saveMethod == "acomodador"): ?>
    <h1><?= $saveMethod ?></h1>
    <p>Pessoas que tendem a fazer e a se envolver em coisas novas com grande capacidade intuitiva. São pessoas pragmáticas, depois de analisar e descartar diferentes teorias, e observadoras, capazes de relacionar aspectos e conteúdos. Além disso, adaptam-se a diferentes circunstâncias e se relacionam bem com as pessoas.</p>
<?php endif ?>
</body>
</html>
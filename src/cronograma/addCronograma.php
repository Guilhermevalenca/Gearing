<?php 
    $horario = $_POST['horario'];
    $dia = $_POST['diaSemana'];
?>
<table>
    <thead>
        <th>Materias:</th>
        <th>Horario:</th>
        <th>Dias da semana:</th>
    </thead>
    <tbody>
    <?php 
        foreach($_POST['materia'] as $indice => $materia):
    ?>
    <tr>
        <th><?= $materia ?></th>
        <td><?= $horario[$indice] ?></td>
        <td><?= $dia[$indice] ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>
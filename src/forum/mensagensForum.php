<?php 
    $fp = fopen("chatForum.csv",'r'); ?>
<table>
<?php while( ($linha = fgetcsv($fp)) !== false ): ?>
    <tr>
        <th><?= $linha[0] ?>:</th>
        <td><?= $linha[1] ?></td>
    </tr>
<?php endwhile ?>
</table>
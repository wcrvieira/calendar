<?php include('admin/calendario.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calendários PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2><center>Calendário PHP</h2>
        <h3><center><a href="?mes=<?php echo $anterior; ?>">&lArr;</a> 
            <?php echo $titulo; ?> 
            <a href="?mes=<?php echo $proximo; ?>">&rArr;</a></h3>
    <table class="table table-dark table-bordered">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sab</th>
        </tr>

        <?php
            foreach($semanas as $semana) {
                echo $semana;
            }
        ?>
    </table>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        hr {
            page-break-after: always;
            border: 0;
            margin: 0;
            padding: 0;
        }
    </style>
    <br>
    <img src="./public/uploads/logo.png" width="300">
    <h1>Lista de Libros disponibles</h1><br>
    <?php foreach ($libros as $libro) { ?>
        <img src="./public/uploads/<?= $libro['rutaImg']; ?>" /><br>
        <h3><?= $libro['titulo']; ?></h3>
        <b>Autor: </b><?= $libro['autor']; ?><br>
        <b>Editorial: </b><?= $libro['editorial']; ?><br>
        <h4>Sinopsis </h4><?= $libro['descripcionL']; ?><br>
        <hr>

    <?php } ?>




</body>

</html>
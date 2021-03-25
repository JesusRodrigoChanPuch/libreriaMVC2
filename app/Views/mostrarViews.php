<?= $cabecera ?>

<div class="container">
    <br> <br>
    <div class="row">
        <div class="col-5">
            <img src="../public/uploads/<?= $libro['rutaImg'] ?>" width="400" alt="imagen rota :(">
        </div>
        <div class="col-4">
            <h1><?= $libro['titulo'] ?></h1><br>
            <b>Autor: </b><?= $libro['autor'] ?> <br><br>
            <b>Editorial: </b><?= $libro['editorial'] ?> <br> <br> <br>
            <h5>Informacion Adicional</h5>
            <div class="2">
                <img src="../public/uploads/sku.png" alt="Imagen rota :("> <b>ISBN : </b> <?= $libro['isbn'] ?> <br>
                <img src="../public/uploads/idioma.png" alt="Imagen rota :("> <b>Pais : </b> <?= $libro['pais'] ?> <br><br>
                <img src="../public/uploads/numP.png" alt="Imagen rota :("> <b>Paginas : </b> <?= $libro['numPaginas'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <img src="../public/uploads/edicion.png" alt="Imagen rota :("> <b>Edicion : </b> <?= $libro['edicion'] ?>
            </div>
        </div>
        <div class="col-8">
            <br> <br> <br>
            <h2>Sinopsis</h2>
            <p><?= $libro['descripcionL'] ?></p>
        </div>
    </div>
    <a href="<?= base_url('/') ?>">regresar a la pagina principal</a>
</div>
<?= $PiePagina ?>
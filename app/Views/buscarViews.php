<?= $cabecera ?>
<div class="container-fluid content-row"><br>
    <h1>Lista de Libros Encontrados</h1><br> 
            <div class="row">
                <?php foreach ($libros as $libro) { ?>
                <div class=" col-sm-12 col-lg-3">
                <div class="card h-100">
                <input type="hidden" name="id" value="<?= $libro['id_libro'] ?>">
                        <img class="card-img-top" src="./public/uploads/<?= $libro['rutaImg']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $libro['titulo']; ?></h5>
                            <h6><b>Autor: </b><?= $libro['autor']; ?></h6>
                            <p class="card-text"><?= $libro['descripcionC'];?>..</p>
                            <a href="<?=base_url('mostrar/'.$libro['id_libro'])?>" class="btn btn-primary">Mas Detalles..</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
    </div>
<?= $PiePagina ?>
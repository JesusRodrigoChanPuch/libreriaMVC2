<?= $cabecera ?>
<?php if (isset($autenticado)) {?>

    <div class="container">
        <br>
        <h1>Eliminar Libro</h1><br>
        <h4>Lista de Libros disponibles</h4><a href="<?= base_url('agregar') ?>" class="btn btn-info" type="button">Agregar libro</a>
        <br> <br>
        <!---->
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table-hover table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Portada</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Descrpcion Corta</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                        <tbody>
                            <?php foreach ($libros as $libro) { ?>
                                <td><?= $libro['id_libro']; ?></td>
                                <td>
                                    <img class="img-thumbnail" src="./public/uploads/<?= $libro['rutaImg']; ?>" width="200" height="300" alt="La portada del Libro esta dañada">
                                </td>
                                <td><?= $libro['titulo']; ?></td>
                                <td><?= $libro['autor']; ?></td>
                                <td><?= $libro['descripcionC']; ?></td>
                                <td><a href="<?= base_url('actualizar/' . $libro['id_libro']) ?>" class="btn btn-info" type="button"><span class="material-icons">
                                            edit
                                        </span></a></td>
                                <td><a href="<?= base_url('borrar/' . $libro['id_libro']) ?>" class="btn btn-danger" type="button"><span class="material-icons">
                                            delete
                                        </span></a></td>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php }else{ ?>
    <p style="background: #fcdbe6; color: #f15c8e; font-weight: bold; padding: 15px; border: 2px solid #fac9d9; border-radius: 6px;">Perdón no tienes los permisos para acceder a esta ruta</p>
    <?php } ?>
</html>
<?= $PiePagina ?>
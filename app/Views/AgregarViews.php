<?= $cabecera ?>
<?php if (isset($autenticado)) {?>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresar Datos de Libro</h5>
                <p class="card-text">
                <form method="post" action="<?= base_url('/guardar') ?>" enctype="multipart/form-data">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-control">
                    <label for="editorial">Editorial</label>
                    <input type="text" name="editorial" id="editorial" class="form-control" required>
                    <label for="numPaginas">Cantidad de Paginas </label>
                    <input type="text" name="numPaginas" id="numPaginas" class="form-control" required>
                    <label for="edicion">Edicion</label>
                    <input type="text" name="edicion" id="edicion" class="form-control" required>
                    <label for="pais">Pais</label>
                    <input type="text" name="pais" id="pais" class="form-control" required>
                    <label for="descripcionCorta">Descripcion Corta</label>
                    <textarea name="descripcionCorta" id="descripcionCorta" cols="30" rows="5" class="form-control" required></textarea>
                    <label for="descripcionL">Descripcion Larga</label>
                    <textarea name="descripcionL" id="descripcionL" cols="30" rows="15" class="form-control" required></textarea>
                    <br>
                    <div class="custom-file">
                        <input id="imagen" class="custom-file-input" type="file" name="imagen" lang="es" required>
                        <label for="imagen" class="custom-file-label">Ingresa la portada</label>
                        <div class="invalid-feedback">Imagen no seleccionada</div>
                    </div>
                    <br> <br>
                    <button type="submit" class="btn btn-primary">Agregar</button> <a href="<?= base_url('eliminar') ?>" class="btn btn-info" type="button">Eliminar Libro</a>
                </form>
                </p>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <p style="background: #fcdbe6; color: #f15c8e; font-weight: bold; padding: 15px; border: 2px solid #fac9d9; border-radius: 6px;">Perdón no tienes los permisos para acceder a esta ruta</p>
    <?php } ?>
<?= $PiePagina ?>
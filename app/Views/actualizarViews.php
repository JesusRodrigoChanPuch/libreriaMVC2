<?= $cabecera ?>
<br>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Actualizar Datos de Libro</h5>
                <p class="card-text">
                <form method="post" action="<?= base_url('/editar') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_libro" value="<?= $libros['id_libro'] ?>">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" id="titulo" value="<?= $libros['titulo'] ?>" class="form-control">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor" value="<?= $libros['autor'] ?>" class="form-control">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="<?= $libros['isbn'] ?>" class="form-control">
                    <label for="editorial">Editorial</label>
                    <input type="text" name="editorial" id="editorial" value="<?= $libros['editorial'] ?>" class="form-control">
                    <label for="numPaginas">Cantidad de Paginas </label>
                    <input type="text" name="numPaginas" id="numPaginas" value="<?= $libros['numPaginas'] ?>" class="form-control">
                    <label for="edicion">Edicion</label>
                    <input type="text" name="edicion" id="edicion" value="<?= $libros['edicion'] ?>" class="form-control">
                    <label for="pais">Pais</label>
                    <input type="text" name="pais" id="pais" value="<?= $libros['pais'] ?>" class="form-control">
                    <label for="descripcionCorta">Descripcion Corta</label>
                    <textarea name="descripcionCorta" id="descripcionCorta" cols="30" rows="5" class="form-control"><?= $libros['descripcionC'] ?></textarea>
                    <label for="descripcionL">Descripcion Larga</label>
                    <textarea name="descripcionL" id="descripcionL" cols="30" rows="10" class="form-control"><?= $libros['descripcionL'] ?></textarea>
                    <br>
                    <label for="imagen" >Portada Actual : <img src="../public/uploads/<?= $libros['rutaImg']; ?>" width="300" alt="Card image cap"></label>
                    <div class="custom-file">
                        <input id="imagen" class="custom-file-input" type="file" name="imagen">
                        <label for="imagen" class="custom-file-label">Ingresa la Nueva portada</label>
                    </div>
                    <br> <br>
                    <button type="submit" class="btn btn-primary">Actualizar Información</button> <a href="<?= base_url('eliminar') ?>" class="btn btn-info" type="button">Eliminar Libro</a>
                </form>
                </p>
            </div>
        </div>
    </div>
</body>
<?= $PiePagina ?>
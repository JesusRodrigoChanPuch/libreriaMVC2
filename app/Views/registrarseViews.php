<?= $cabecera ?>
<br><br>
<body class="text-center">
    <div class="container">
        <form method="post" action="<?= base_url('/registro') ?>" enctype="multipart/form-data" class="form-signin">
        <?=csrf_field();?>
            <div class="text-center mb-4">
                <img class="mb-4" src="./public/uploads/user.png" alt="" width="80" height="80">
                <h1 class="h3 mb-3 font-weight-normal">Registrarse</h1>
            </div>
            <div class="form-label-group">
                <input type="tex" id="nombre" name="nombre" class="form-control" placeholder=" Nombres" >
            </div><br>
            <div class="form-label-group">
                <input type="email" id="correo" name="correo" class="form-control" placeholder=" Correo" >
            </div><br>
            <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="password" >
            </div><br>
            <div class="form-label-group">
                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" placeholder="Confirmar Contraseña" >
            </div><br>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordar me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Crear Cuenta</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; J.Rodrigo Chan 2021</p>
        </form>
        <a href="<?= base_url('entrar') ?>">Ya tienes Cueta? Inicia Sesion Aqui</a>
    </div>
</body>
<?= $PiePagina ?>
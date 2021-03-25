<?= $cabecera ?>
<br><br>

<body class="text-center">
    <div class="container">
        <form method="post" action="<?= base_url('/iniciar') ?>" enctype="multipart/form-data" class="form-signin">
            <div class="text-center mb-4">
                <img class="mb-4" src="./public/uploads/logo.png" alt="" width="400">
                <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
            </div>
            <div class="form-label-group">
                <input type="email" id="correo" name="correo" class="form-control" placeholder=" Correo" required autofocus>
            </div><br>
            <div class="form-label-group">
                <input type="password" name="password" id="contrasena" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordar me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; J.Rodrigo Chan 2021</p>
        </form>
        <a href="<?= base_url('registrarse') ?>">Eres nuevo aqui? crea una cuanta</a>
    </div>
</body>
<?= $PiePagina ?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="views/login usuario/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/login usuario/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="views/login usuario/assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-fixed-top navigation-clean-button navbar-light"
        style="background: rgb(34, 34, 34);border-radius: 20;border-top-left-radius: 20;border-top-right-radius: 20;border-bottom-right-radius: 20;border-bottom-left-radius: 20;border-style: none;padding-top: 0;padding-bottom: 10px;--bs-primary: #ffffff;--bs-primary-rgb: 255,255,255;">
        <div class="container"><a href="index.php"><button class="btn btn-primary bg-dark border rounded-pill"
                    data-bss-hover-animate="rubberBand" type="button">Brand</button></a>
            <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);width: 1500.969px;">
                <div class="dropdown"><button class="btn btn-secondary dropdown-toggle" data-bss-hover-animate="flash"
                        type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                        style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 170px;">CATEGORÍA&nbsp;</button>
                    <div class="dropdown-menu">
                        <?php
                        $controlador = new ProductController();
                        $categorias = $controlador->getCategorias();
                        foreach ($categorias as $categoria){
                            echo '<a class="dropdown-item" href="index.php#'.$categoria['categoria'].'">'.$categoria['categoria'].'';}
                            echo '</a></div>';
                        ?>
                </div><input type="text" class="form-control dropdown-search-input" placeholder="Buscar producto..."
                    style="width: 340px;height: 0px;margin: 0px 0px 0px;padding: 15px;"><button
                    class="btn btn-primary border rounded-pill" data-bss-hover-animate="rubberBand" type="button"
                    style="padding: 0px 0px;width: 90px;height: 35px;margin: 10px;background: rgb(255,255,255);color: rgb(0,0,0);border-style: hidden;">Buscar</button>
            </div>
      <div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true"
          aria-expanded="false" data-bs-toggle="dropdown"
          style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">INICIAR
          SESIÓN</button>
        <div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=mostrarVistaLogin">LOGIN</a></div>
            </div><a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true"
                data-bss-hover-animate="swing"
                style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">
                <i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>
            </a>
        </div>
        </div>
    </nav>
    <div id="main">
        <div class="text-center" id="info">
            <h3 class="text-center">Bienvenido</h3>
            <p class="text-center">Ingrese usuario y contraseña</p>
            <form action="index.php?controller=UserController&action=verificarUsuario" method=post class="text-start" id="form-login">
                <div class="mb-3">
                    <label class="form-label" id="lbl-usuario" for="txt-usuario">Usuario</label>
                    <input class="form-control" type="text" id="txt-usuario" name="usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label" id="lbl-password" for="txt-password">Contraseña</label>
                    <input class="form-control" type="password" id="txt-password" name="contrasena">
                    <?php
                    if (isset($data)) {
                        echo '<br><div class="alert alert-danger" role="alert">
                        '.$data['error'].'
                      </div>';
                    }


                    ?>
                </div>
                <button class="btn btn-primary" data-bss-hover-animate="pulse" id="btn-sesion" type="submit"
                    style="--bs-primary: #256db4;--bs-primary-rgb: 37,109,180;background: #256db4;">Iniciar
                    sesión</button>
            </form>
        </div>
        <!--<button class="btn btn-primary" data-bss-hover-animate="pulse" id="btn-sesion-1"
                type="submit"
                style="--bs-primary: #256db4;--bs-primary-rgb: 37,109,180;background: #256db4;margin: 10px;">¿Olvidaste
                contraseña?</button><!-->
    </div>
    </div>
    <script src="views/login usuario/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="views/login usuario/assets/js/script.min.js"></script>
</body>

</html>
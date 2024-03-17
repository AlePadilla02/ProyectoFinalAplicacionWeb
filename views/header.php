<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
    
    <nav class="navbar navbar-expand-md navbar-fixed-top navigation-clean-button navbar-light"
            style="background: rgb(34, 34, 34);border-radius: 20;border-top-left-radius: 20;border-top-right-radius: 20;border-bottom-right-radius: 20;border-bottom-left-radius: 20;border-style: none;padding-top: 0;padding-bottom: 10px;--bs-primary: #ffffff;--bs-primary-rgb: 255,255,255;">
            <div class="container"><a href="index.php"><button class="btn btn-primary bg-dark border rounded-pill"
                        data-bss-hover-animate="rubberBand" type="button">Brand</button></a>
                <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);width: 1500.969px;">
                    <div class="dropdown"><button class="btn btn-secondary dropdown-toggle"
                            data-bss-hover-animate="flash" type="button" aria-haspopup="true" aria-expanded="false"
                            data-bs-toggle="dropdown"
                            style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 170px;">CATEGORÍA&nbsp;</button>
                        <div class="dropdown-menu">
                        <?php
                        foreach ($data as $categoria){
                            echo '<a class="dropdown-item" href="#'.$categoria['nombre'].'">'.$categoria['categoria'].'';}
                        echo '</a></div>';
                        ?>
                        </div><input type="text" class="form-control dropdown-search-input" placeholder="Buscar producto..."
                            style="width: 340px;height: 0px;margin: 0px 0px 0px;padding: 15px;"><button
                            class="btn btn-primary border rounded-pill" data-bss-hover-animate="rubberBand" type="button"
                            style="padding: 0px 0px;width: 90px;height: 35px;margin: 10px;background: rgb(255,255,255);color: rgb(0,0,0);border-style: hidden;">Buscar</button>
                        </div>
                        <div class="dropdown">
                    <?php
                    if (isset($_SESSION['usuario'])) {

                        if ($_SESSION['rol'] == 'administrador'){
                        echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">' . $_SESSION['usuario'] . '</p>
                        <div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div><a href="index.php?controller=ProductController&action=getAllProductAdmin" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">
                        <i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>
                        </a>
                        </div>';
                        } else {
                        echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">' . $_SESSION['usuario'] . '</p>
                        <div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div><a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">
                        <i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>
                        </a>
                        </div>';}

                    } else {
                        echo '<button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">INICIAR SESIÓN</button>';
                            echo '<div class="dropdown-menu">';
                                echo '<a class="dropdown-item" href="index.php?controller=UserController&action=mostrarVistaLogin">LOGIN</a></div></div>';
                                echo '<a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
                            echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
                        echo '</a></div>';
                    }
                    ?>
        </nav>
    </body>
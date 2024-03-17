<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Página de inicio</title>
    <link rel="stylesheet" href="views/seccion usuario/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/seccion usuario/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="views/seccion usuario/assets/css/styles.min.css">
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
                            echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">' . $_SESSION['usuario'] . '</p>';
                                echo '<div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div>';
                                    echo '<a href="index.php?controller=ProductController&action=getAllProductAdmin" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
                                    echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
                                echo '</a>';
                            echo '</div>';
                        } else {
                            echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">' . $_SESSION['usuario'] . '</p>';
                                echo '<div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div>';
                                    echo '<a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
                                    echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
                                echo '</a>';
                            echo '</div>';
                        }

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
        <section style="margin: 40px;">
            <div class="container">
                <?php
                $i = 0;
                foreach ($data as $producto) {
                    if ($i % 3 == 0) {
                        echo '<div class="row">';
                    }
                    
                    echo '<div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4"';
                        echo 'style="padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;">';
                            echo '<div id="'.$producto['categoria'].'"class="bg-light border rounded shadow card" data-bss-hover-animate="pulse"><img class="card-img-top" src="images/' . $producto['nombre'] . '.jpg" style="width: 400px; height: 400px; object-fit: cover;">';
                                echo '<div class="card-body" style="width: 400px; height: 400px;">';
                                    echo '<h3 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">' . $producto['nombre'] . '</h3>';
                                        echo '<h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;">' . $producto['precio'] . '€</h5>';
                                         echo '<p class="card-text" style="font-family: Antic, sans-serif;color: rgb(81,87,94);"></p>';
                                         echo '<p id="descripción" style="max-height: 60px; overflow-y: auto;">' . $producto['descripcion'] . '</p>';
                                           echo '<form action="index.php?controller=productController&action=addCarrito&idproducto=' . $producto['id_producto'] . '" method="post">';
                                            echo '<div class="form-group" style="width: 350px; height: 150px;">';
                                            echo '<label for="cantidad">Cantidad:</label>';
                                            echo '<input type="number" class="form-control" id="cantidad" name="cantidad" min="1" max="'.$producto['stock'].'" value="1" required>';
                                            echo '<br>';
                                            echo '<button class="btn btn-outline-success" data-bss-hover-animate="rubberBand" type="submit"';
                                           echo 'style="font-weight: normal;font-family: Antic, sans-serif; background-color: #add8e6; color: blue; margin-right: 30px;">Añadir al carrito</button>';
                                          echo '<a class="btn btn-outline-success" href="index.php?controller=productController&action=verDetallesProducto&idProducto='.$producto['id_producto'].'" data-bss-hover-animate="rubberBand" type="submit"';
                                        echo 'style="font-weight: normal;font-family: Antic, sans-serif; background-color: #add8e6; color: blue;">Ver producto</a>';
                                    echo '</div>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    $i++;
                    if ($i % 3 == 0 || $i == count($data)) {
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
        <script src="views/seccion usuario/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="views/seccion usuario/assets/js/script.min.js"></script>
    </body>

</html>
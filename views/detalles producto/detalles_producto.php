<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php
    echo '<title>Detalles de '.$data['nombre'].' </title>';
    ?>
    <link rel="stylesheet" href="views/detalles producto/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/detalles producto/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="views/detalles producto/assets/css/styles.min.css">
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
                    <div class="dropdown">
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        if ($_SESSION['rol'] == 'administrador'){
                            echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">';
                                echo $_SESSION['usuario'];
                                    echo '</p>';
                                    echo '<div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div>';
                                    echo '<a href="index.php?controller=ProductController&action=getAllProductAdmin" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
                                echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
                            echo '</a></div>';
                        } else {
                            echo '<p class="btn btn-secondary dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">';
                                echo $_SESSION['usuario'];
                                    echo '</p>';
                                    echo '<div class="dropdown-menu"><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div></div>';
                                    echo '<a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
                                echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
                            echo '</a></div>';
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
    <div class="container">
        <?php
        echo '<h1 class="text-center"></h1><div class="row">';
            echo '<div class="col-md-7">';
                echo '<div class="row">';
                    echo '<div class="col-md-12"><img class="img-thumbnail img-fluid center-block"';
                        echo 'src="images/'.$data['nombre'].'.jpg" style="width: 500px; height: 500px; object-fit: cover;"></div></div></div>';
                            echo '<div class="col-md-5">';
                                echo '<h1><strong>'.$data['nombre'].'</strong></h1>';
                                 echo '<p>'.$data['descripcion_larga'].'</p>';
                                  echo '<h2 class="text-center text-success">Precio: '.$data['precio'].'€</h2>';
                                   echo '<form action="index.php?controller=productController&action=addCarritoDetalles&idproducto=' . $data['id_producto'] . '" method="post">';
                                   echo '<div class="form-group">';
                                   echo '<br>';
                                  echo '<label for="cantidad" style="display: inline-block;">Cantidad: </label>';
                                 echo '<input type="number" class="form-control" id="cantidad" name="cantidad" min="1" max="'.$data['stock'].'"  value="1" required style="max-width: 80px; max-height: 30px; margin: 10px; display: inline-block;">';
                                echo '<br>';
                            echo '</div>';
                        echo '<button class="btn btn-outline-success" data-bss-hover-animate="rubberBand" type="submit"';
                    echo 'style="font-weight: normal;font-family: Antic, sans-serif; background-color: #add8e6; color: blue; margin-right: 10px;">Añadir al carrito</button><br><br>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
        ?>
        </div>
    </div>
    <script src="views/detalles producto/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="views/detalles producto/assets/js/script.min.js"></script>
</body>

</html>
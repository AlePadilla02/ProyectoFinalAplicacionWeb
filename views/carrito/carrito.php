<!DOCTYPE html>
<html data-bs-theme="light" lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Carrito</title>
  <link rel="stylesheet" href="views/administrador/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/administrador/assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="views/administrador/assets/css/styles.min.css">
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
      <?php
          if (isset($_SESSION['usuario'])) {
            echo '<div class="dropdown">';
             echo '<button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">';
              echo $_SESSION['usuario'];
                echo '</button>';
                  echo '<div class="dropdown-menu">';
                   echo '<a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a>';
                 echo '</div>';
                echo '</div>';
               echo '<a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
              echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
            echo '</a>';
              }
          else {
            echo '<div class="dropdown">';
              echo '<button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">INICIAR SESIÓN</button>';
                echo '<div class="dropdown-menu">';
                  echo '<a class="dropdown-item" href="index.php?controller=UserController&action=mostrarVistaLogin">LOGIN</a>';
                    echo '</div>';
                  echo '</div>';
                echo '<a href="index.php?controller=ProductController&action=getAllProductUser" class="btn btn-primary pull-right" data-bss-disabled-mobile="true" data-bss-hover-animate="swing" style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">';
              echo '<i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>';
            echo '</a>';
          }
    ?>
    </div>
  </nav>
  <div class="shopping-cart">
    <div class="px-4 px-lg-0">

      <div class="pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
              <p><strong>CARRITO</strong></p>
              <!-- Shopping cart table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">Productos</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Descripción</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Precio</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Cantidad</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Eliminar</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($data)) {
                      $costeTotal = 0;
                      foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
                        $productDAO = new ProductoDAO();
                        $producto = $productDAO->getProductoById($idProducto);
                        echo '<tr>';
                          echo '<th scope="row" class="border-0">';
                            echo '<div class="p-2">';
                              echo '<img src="images/' . $producto['nombre'] . '.jpg" alt="" width="100" class="img-fluid rounded shadow-sm" style="width: 100px; height: 100px; object-fit: cover; margin-right: 15px;">';
                                echo '<div class="ml-3 d-inline-block align-middle">';
                                  echo '<h5 class="mb-0">';
                                    echo '<a href="index.php?controller=productController&action=verDetallesProducto&idProducto='.$producto['id_producto'].'" class="text-dark d-inline-block align-middle">' . $producto['nombre'] . '</a></h5>';
                                      echo '<span class="text-muted font-weight-normal font-italic d-block">Categoria:' . $producto['categoria'] . '</span>';
                                        echo '</div>';
                                            echo '</div>';
                                              echo '</th>';
                                                echo '<td class="border-0 align-middle"><div style="max-height: 100px; max-width: 450px; overflow-y: auto;"><p class="mb-0"><strong>' . $producto['descripcion'] . '</strong></p></div></td>';
                                                echo '<td class="border-0 align-middle"><strong>$' . $producto['precio'] . '</strong></td>';
                                               echo '<td class="border-0 align-middle">' . $cantidad . '</td>';
                                              echo '<td class="border-0 align-middle">';
                                             echo '<form action="index.php" method="get">';
                                           echo '<input type="hidden" name="controller" value="ProductController">';
                                          echo '<input type="hidden" name="action" value="eliminarProductoCarrito">';
                                        echo '<input type="hidden" name="idProducto" value="'.$producto['id_producto'].'">';
                                      echo '<input style="max-width: 70px; max-heigt: 70px; margin-right: 15px;" type="number" name="cantidad" min="1" max="'.$producto['stock'].'" required>';
                                    echo '<button type="submit" class="btn btn-dark" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este producto del almacén?\');" ><i class="fa fa-trash"></i></button>';
                                  echo '</form>';
                              echo '</td>';
                          echo '</tr>';
                        $costeTotal = $costeTotal + ($cantidad * $producto['precio']);
                      }
                    }
                    else {
                    echo '<tr>';
                      echo '<th scope="row" class="border-0">';
                        echo '<div class="p-2">';
                          echo '<h5 class="mb-0">';
                            echo '<p href="" class="text-dark d-inline-block align-middle">ESTÁ VACÍO</p>';
                              echo '</h5>';
                                echo '<span class="text-muted font-weight-normal font-italic d-block"></span>';
                                  echo '</div>';
                                  echo '</div>';
                                echo '</th>';
                              echo '<td align="left" class="border-0 align-middle">';
                            echo '<p class="mb-0"><strong></strong></p>';
                          echo '</td>';
                        echo '<td class="border-0 align-middle"><strong> </strong></td>';
                      echo '<td class="border-0 align-middle"></td>';
                    echo '</tr>';
                      }
                    
                    ?>
                  </tbody>
                </table>
                  <a href="index.php?controller=ProductController&action=vaciarCarrito" class="btn btn-dark rounded-pill py-2 btn-block">Vaciar carrito</a>
                </div>
              <!-- End -->
            </div>
          </div>
          <div class="row py-5 p-4 bg-white rounded shadow-sm">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coste total del pedido </div>
              <div class="p-4">
                <ul class="list-unstyled mb-4">
                <?php
                  if (isset($data)) {
                    foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
                        $productoDAO = new ProductoDAO();
                        $productos = $productoDAO->getProductoById($idProducto);
                        echo '<li class="d-flex justify-content-between py-3 border-bottom">' . $productos['nombre'] . '';
                        $costeProducto= $productos['precio'] * $cantidad;
                        echo '<h5 class="font-weight-bold">' . $costeProducto . '€</h5></li>';
                      }
                    }
                  ?>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong
                      class="text-muted">Total</strong>
                  <?php
                  if (isset($data))
                    echo '<h5 class="font-weight-bold">'.$costeTotal . '€</h5>';
                  ?>
                  </li>
                </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Realizar pedido</a>
              </div>
            </div>
          </div>
          
          <script src="views/administrador/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
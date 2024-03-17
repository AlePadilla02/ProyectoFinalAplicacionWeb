<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Administrador almacén</title>
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
      echo '<div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true"
              aria-expanded="false" data-bs-toggle="dropdown"
              style="background: rgb(34,34,34);margin: 20px;border-color: var(--bs-body-color);padding: 0px 60px;height: 25px;width: 200px;">'.$_SESSION['usuario'].'</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?controller=UserController&action=cerrarSesion">Cerrar sesión</a></div>
              </div>
              <a href="index.php?controller=ProductController&action=getAllProductAdmin" class="btn btn-primary pull-right"
              data-bss-disabled-mobile="true" data-bss-hover-animate="swing"
              style="background: var(--bs-body-color); border-color: var(--bs-secondary-color);">
            <i class="fa fa-shopping-cart" data-bss-hover-animate="swing" style="font-size: 29px;"></i>
            </a>';
    ?>
    </div>
  </nav>
  <div class="shopping-cart">
    <div class="px-4 px-lg-0">

      <div class="pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
              <p><strong>ALMACÉN DE PRODUCTOS</strong></p>
              <!-- Shopping cart table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">ID</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">Productos</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Detalles</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Precio</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Stock</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Eliminar</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($data['productos'])) {
                      foreach ($data['productos'] as $producto) {
                        echo '<tr>';
                          echo '<td class="border-0 align-middle" style="padding-left: 15px;"><strong>' . $producto['id_producto'] . '</strong></td>';
                            echo '<th scope="row" class="border-0"> <div class="p-2"> <img src="images/' . $producto['nombre'] . '.jpg" alt=""  class="img-fluid rounded shadow-sm" style="width: 100px; height: 100px; object-fit: cover; margin-right: 15px;">';
                              echo '<div class="ml-3 d-inline-block align-middle">';
                                echo '<h5 class="mb-0"> <a href="index.php?controller=productController&action=verDetallesProducto&idProducto='.$producto['id_producto'].'" class="text-dark d-inline-block align-middle">' . $producto['nombre'] . '</a>';
                                  echo ' </h5><span class="text-muted font-weight-normal font-italic d-block">Categoria:' . $producto['categoria'] . '</span></div></div></th>';
                                  echo '<td class="border-0 align-middle"><div style="max-height: 100px; max-width: 500px; overflow-y: auto;"><p class="mb-0"><strong>' . $producto['descripcion_larga'] . '</strong></p></div></td>';
                                  echo '<td class="border-0 align-middle"><strong>' . $producto['precio'] . '€</strong></td>';
                                echo '<td class="border-0 align-middle">' . $producto['stock'] . '<strong></strong></td>';
                              echo '<td class="border-0 align-middle">';
                            echo '<a href="index.php?controller=ProductController&action=eliminarProducto&idProducto=' . $producto['id_producto'] . '" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este producto del almacén?\');" class="text-dark">';
                          echo '<i class="fa fa-trash"></i>';
                        echo '</a></td></tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
                <br><br>
                <form action="index.php?controller=ProductController&action=addProduct" method="post" name="form_data">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">
                    <br>
                    <?php
                    if (isset($data['errores']['enombre'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['enombre'] . '</div>';
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" min="1" value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : ''; ?>">
                    <br>
                    <?php
                    if (isset($data['errores']['eprecio'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['eprecio'] . '</div>';
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock" min="1" value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : ''; ?>">
                    <br>
                    <?php
                    if (isset($data['errores']['estock'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['estock'] . '</div>';
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo isset($_POST['categoria']) ? $_POST['categoria'] : ''; ?>">
                    <br>
                    <?php
                    if (isset($data['errores']['ecategoria'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['ecategoria'] . '</div>';
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea>
                    <br>
                    <?php
                    if (isset($data['errores']['edescripcion'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['edescripcion'] . '</div>';
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="descripcion_larga">Detalles del producto:</label>
                    <textarea class="form-control" id="descripcion_larga" name="descripcion_larga"><?php echo isset($_POST['descripcion_larga']) ? $_POST['descripcion_larga'] : ''; ?></textarea>
                    <br>
                    <?php
                    if (isset($data['errores']['edescripcion_larga'])) {
                      echo '<div class="alert alert-danger" role="alert">' . $data['errores']['edescripcion_larga'] . '</div>';
                    }
                    ?>
                  </div>
                  <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block" name="insertar">Agregar nuevo producto</button>
                </form>
              </div>
              <!-- End -->
            </div>
          </div>

          <div class="row py-5 p-4 bg-white rounded shadow-sm">
            <div class="col-lg-6">
            </div>
          </div>
        </div>
      </div>
      <script src="views/administrador/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
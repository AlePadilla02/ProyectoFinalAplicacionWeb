<!--
  Pie de página estático.
-->
<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Inicio</a></li>
      <li class="nav-item"><a href="index.php?controller=ProductController&action=getAllProductUser" class="nav-link px-2 text-muted">Carrito</a></li>
      <?php
      if (isset($_SESSION['usuario'])) {
        if ($_SESSION['rol'] == 'administrador') {
          echo '<li class="nav-item"><a href="index.php?controller=ProductController&action=getAllProductAdmin" class="nav-link px-2 text-muted">Almacén</a></li>';
        } 
      } else {
          if (isset($_SESSION['usuario']))
            echo '<li class="nav-item"><a href="index.php?controller=UserController&action=mostrarVistaLogin" class="nav-link px-2 text-muted">Iniciar sesión</a></li>';
      }
      ?>
    </ul>
    <p class="text-center text-muted">Creado por Alejandro José Padilla Morales. IAW (IES Albarregas 2024) </p>
  </footer>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</body>
</html>
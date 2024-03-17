<?php
include_once 'models/productoDAO.php';
include_once 'models/userDAO.php';
include_once 'views/view.php';
include_once 'utils/validation.php';

class UserController {


    public function verificarUsuario() {
    // Verificar si se enviaron los datos del formulario de inicio de sesión
    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Lógica para verificar la existencia del usuario en la base de datos
        $userDAO = new UserDAO(); // Suponiendo que tienes una clase UserDAO para interactuar con la base de datos de usuarios
        $usuarioDB = $userDAO->getUser($usuario); // Suponiendo que el método para obtener el usuario se llama 'getUser'

        if (is_object($usuarioDB) && ($contrasena==$usuarioDB->contrasena)) {
            // El usuario existe y la contraseña es correcta
            // Realizar acciones adicionales, como iniciar la sesión, redirigir a la página principal, etc.
            // Por ejemplo:
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $usuarioDB->rol;
            if ($_SESSION['rol'] == 'administrador') {
                // Redirigir a la página de administrador
                $productDao=new ProductoDAO();
                $arrayProduct=$productDao->getAllProductos();
                $data = [
                    'productos' => $arrayProduct
                ];
                
                view::show('views/administrador/almacen_administrador', $data);
            } else {
                $productDAO=new ProductoDAO();
                $arrayProductos=$productDAO->getAllProductos();
                view::show('views/seccion usuario/paginainicial', $arrayProductos);
            }
        } else {
            // El usuario no existe o la contraseña es incorrecta
            // Mostrar un mensaje de error o redirigir de nuevo a la página de inicio de sesión
            // Por ejemplo:
            $error['error']='Usuario o contraseña incorrectos';
            view::show('views/login usuario/login', $error);
            
        }
    }
}
    public function mostrarVistaLogin() {
    view::show('views/login usuario/login');
    }
    public function cerrarSesion() {
        // Limpiamos todas las variables de sesión
        session_unset();
        
        // Destruimos la sesión
        session_destroy();
        
        // Redirigimos al usuario a la página de inicio
        $productDAO=new ProductoDAO();
        $arrayProductos=$productDAO->getAllProductos();
        view::show('views/seccion usuario/paginainicial', $arrayProductos);
    }
}
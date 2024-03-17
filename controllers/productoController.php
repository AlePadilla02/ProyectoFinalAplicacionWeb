<?php

include_once 'models/productoDAO.php';
include_once 'views/view.php';
include_once 'utils/validation.php';
include_once 'models/userDAO.php';
class ProductController {

    function getAllProductAdmin(){
        $productDao=new ProductoDAO();
        $arrayProduct=$productDao->getAllProductos();
        $data = [
            'productos' => $arrayProduct
        ];
        
        view::show('views/administrador/almacen_administrador', $data);
    }
    function getAllProductUser(){
        
        if (isset($_SESSION['carrito'])){
            view::show('views/carrito/carrito', $_SESSION['carrito']);
        } else {
            view::show('views/carrito/carrito');
        }
        
    }
    function addProduct(){
        $erroresForm = [];
        if ( isset ($_POST['insertar']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){

            if (strlen($_POST['nombre'])==0)
                $erroresForm['enombre']="El nombre del producto no puede estar vacío.";

            if (empty($_POST['precio']) || $_POST['precio'] < 0)
                $erroresForm['eprecio']="El precio no puede estar vacío y debe ser mayor que 0.";

            if (empty($_POST['stock']) || $_POST['stock'] < 0)
                $erroresForm['estock']="El stock no puede estar vacío y debe ser mayor que 0.";

            if (strlen($_POST['categoria'])==0)
                $erroresForm['ecategoria']="La categoría no puede estar vacía.";

            if (strlen($_POST['descripcion'])==0)
                $erroresForm['edescripcion']="La descripción no puede estar vacía.";

            if (strlen($_POST['descripcion_larga'])==0)
                $erroresForm['edescripcion_larga']="La descripción detallada no puede estar vacía.";

            # Comprobamos si hemos detectado errores en el form
            if (count($erroresForm)==0){
                $nombre=filtrado($_POST['nombre']);
                $precio=filtrado($_POST['precio']);
                $stock=filtrado($_POST['stock']);
                $categoria=filtrado($_POST['categoria']);
                $descripcion=filtrado($_POST['descripcion']);
                $detalles=filtrado($_POST['descripcion_larga']);
                
                
                $productDao=new ProductoDAO();
                $productDao->insertarProducto($nombre, $precio, $stock, $categoria, $descripcion, $detalles);

                $productDao=new ProductoDAO();
                $arrayProduct=$productDao->getAllProductos();
                $data = [
                    'productos' => $arrayProduct
                ];
                
                view::show('views/administrador/almacen_administrador', $data);
                $arrayProduct=$productDao->getAllProductos();

                
            }
        
            else { // Si el array esta vacío, hay errores en los campos
                $productDao=new ProductoDAO();
                $arrayProduct=$productDao->getAllProductos();
                $data = [
                    'errores' => $erroresForm,
                    'productos' => $arrayProduct
                ];

                view::show('views/administrador/almacen_administrador', $data);

            }

        }
    }
    public function addCarrito() {
        
        if (!isset($_SESSION['carrito'])){
            $_SESSION['carrito']=array();
        }
        $idproducto = $_REQUEST['idproducto'];
        $cantidad = $_REQUEST['cantidad'];

        // Con $_REQUEST podemos acceder a los parámetros enviados por POST o GET
        if (!isset($_SESSION['carrito'][$idproducto])) {
            // Si el producto no está en el carrito, añade la cantidad
            $_SESSION['carrito'][$idproducto] = $cantidad;
        } else {
            // Si el producto ya está en el carrito, suma la cantidad nueva a la existente
            $_SESSION['carrito'][$idproducto] += $cantidad;
        }
        // Mostramos de nuevo la lista de productos
        $productDAO=new ProductoDAO();
        $arrayProductos=$productDAO->getAllProductos();
        view::show('views/seccion usuario/paginainicial', $arrayProductos);
    }
    public function vaciarCarrito() {
        
        if (isset($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
        }
        $productDAO=new ProductoDAO();
        $arrayProductos=$productDAO->getAllProductos();
        // Redirigimos a la vista del carrito
       view::show('views/seccion usuario/paginainicial', $arrayProductos);
    }

    public function eliminarProductoCarrito() {
        $idProducto = $_REQUEST['idProducto'];
        $cantidadAEliminar = $_REQUEST['cantidad'];
        
        if (isset($_SESSION['carrito'][$idProducto])){
            // Si la cantidad a eliminar es igual o mayor que la cantidad en el carrito, eliminamos el producto
            if ($cantidadAEliminar >= $_SESSION['carrito'][$idProducto]) {
                unset($_SESSION['carrito'][$idProducto]);
            } else {
                // Si la cantidad a eliminar es menor, restamos esa cantidad
                $_SESSION['carrito'][$idProducto] -= $cantidadAEliminar;
            }
        }
        // Redirigimos a la vista del carrito
        
        view::show('views/carrito/carrito', $_SESSION['carrito']);
    }
    public function eliminarProducto() {
        $idProducto = $_REQUEST['idProducto'];
        
        // Creamos una instancia de ProductoDAO
        $productDAO = new ProductoDAO();
        
        // Llamamos a la función de eliminación del DAO
        $productDAO->eliminarProductoPorId($idProducto);
        $productDao=new ProductoDAO();
        $arrayProduct=$productDao->getAllProductos();
        $data = [
            'productos' => $arrayProduct
        ];
        
        view::show('views/administrador/almacen_administrador', $data);
    }

    public function verDetallesProducto() {
        $idProducto = $_REQUEST['idProducto'];
        $productDAO = new ProductoDAO();
        $producto = $productDAO->getProductoById($idProducto);
        
        // Enviamos la información del producto a detalles_producto.php
        view::show('views//detalles producto/detalles_producto', $producto);
    }
    
    public function getCategorias() {
        $productDAO = new ProductoDAO();
        return $productDAO->getAllCategorias();
    }

    public function addCarritoDetalles() {
        
        if (!isset($_SESSION['carrito'])){
            $_SESSION['carrito']=array();
        }
        $idproducto = $_REQUEST['idproducto'];
        $cantidad = $_REQUEST['cantidad'];

        // Con $_REQUEST podemos acceder a los parámetros enviados por POST o GET
        if (!isset($_SESSION['carrito'][$idproducto])) {
            // Si el producto no está en el carrito, añade la cantidad
            $_SESSION['carrito'][$idproducto] = $cantidad;
        } else {
            // Si el producto ya está en el carrito, suma la cantidad nueva a la existente
            $_SESSION['carrito'][$idproducto] += $cantidad;
        }
        // Mostramos de nuevo la lista de productos
        $productDAO=new ProductoDAO();
        $producto=$productDAO->getProductoById($idproducto);
        view::show('views/detalles producto/detalles_producto', $producto);
    }


}
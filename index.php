<?php
session_start(); 
include_once 'controllers/userController.php';
include_once 'controllers/productoController.php';
include_once 'models/productoDAO.php';

if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
    
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    //Instanciación del controlador e invocación del método
    $controller=new $cont();
    $controller->$act();

}
else
{
    $productDAO=new productoDAO();
    $arrayProductos=$productDAO->getAllProductos();
    view::show('views/seccion usuario/paginainicial', $arrayProductos);
}
 


?>
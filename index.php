<?php
ob_start();
session_start();
require_once 'config/conexion.php';
require_once 'helpers/utils.php';

if(isset($_GET['controller']) && $_GET['controller'] == 'usuario'){
    
    require_once 'controllers/usuarioController.php';
    
    $nombreControlador = $_GET['controller'] . "Controller";
    if($_GET['action'] == "login"){
        $nombreAccion = $_GET['action'];
        if(class_exists($nombreControlador)){
            if(method_exists($nombreControlador, $nombreAccion)){
                $controlador = new $nombreControlador();
                $controlador->$nombreAccion();
            }   
        }
    }
}
if (isset($_SESSION['identity'])) {
    require_once "views/layout/header.php";
    require_once 'views/layout/sidebar.php';
    require_once 'autoload.php';

    if (isset($_GET['controller'])) {
        $nombreControlador = $_GET['controller'] . "Controller";
        $titulo = $_GET['controller'];
    }elseif(!isset($_GET['controller'])){
        $nombreControlador = "homeController";
        $titulo = "Home";
    } else {
        echo 'Error controlador';
    }

    if (isset($_GET['action'])) {
        $nombreAccion = $_GET['action'];
    }elseif(!isset($_GET['action'])) {
        $nombreAccion = "index";
    }
    else {
        echo 'Error al cargar acction';
    }

    if (class_exists($nombreControlador) && method_exists($nombreControlador, $nombreAccion)) {
        $controlador = new $nombreControlador();
        $controlador->$nombreAccion();
    }else{
        echo 'Error al cargar la clase';
    }

    
   
    require_once 'views/layout/footer.php';
}elseif(isset($_GET['registro'])) {
     require_once 'views/usuario/registroUsuario.php';
}else{
    require_once 'views/usuario/login.php';
}


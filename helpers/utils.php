<?php

class utils{
    
    public static function deleteSession($nombre){
        
        if(isset($_SESSION[$nombre])){
            unset($_SESSION[$nombre]);
            $_SESSION[$nombre] = NULL;
        }
        
        return$nombre;
    }
    
    public static function getRolUser(){
        require_once 'models/usuario.php';
        $usuario = new Usuario();
        $usuario_rol = $usuario->getAllRol();
      
        return $usuario_rol;
    }

    public static function getProveedores(){
        require_once 'models/proveedor.php';
        $proveedor = new Proveedor();
        $proveedores = $proveedor->getAll();
        
        return $proveedores;
    }
    
    public static function getTipoFacturas(){
        require_once 'models/caja.php';
        $caja = new Caja();
        $factura_tipo = $caja->getTipoFacturas();
       
        return $factura_tipo;
    }
}
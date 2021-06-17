<?php
require_once 'models/proveedor.php';

class ProveedorController{
    public function registro(){
        require_once 'views/proveedor/registro.php';
    }
    
    public function save(){
        if($_POST){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $cuit = isset($_POST['cuit']) ? $_POST['cuit'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            
            if($nombre && $cuit && $direccion && $telefono){
                $proveedor = new Proveedor();
                $proveedor->setNombra($nombre);
                $proveedor->setCuit($cuit);
                $proveedor->setDireccion($direccion);
                $proveedor->setTelefono($telefono);
                $resultado = $proveedor->save();
            
                
                
                if($resultado){
                    $_SESSION['datos-correctos']="Datos guadados con exito";
                }else{
                    $_SESSION['datos-error']="No se pudo guardar los datos";
                }
            }
            
        }
        //header("Location:".$_SERVER['HTTP_REFERER']); 
        header("Location:http://localhost/DashboardYosuko/?controller=proveedor&action=registro");
    }
}
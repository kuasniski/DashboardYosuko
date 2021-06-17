<?php
require_once 'models/producto.php';

class ProductoController{
    
    public function registro(){
        require_once 'views/producto/registro.php';
    }
    
    public function save(){
        if($_POST){
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $costo = isset($_POST['costo']) ? $_POST['costo'] : false;
            $precio_venta = isset($_POST['precio_venta']) ? $_POST['precio_venta'] : false;
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
        }
       
        if($descripcion && $costo && $precio_venta && $cantidad){
            $producto = new Producto();
            $producto->setDescripcion($descripcion);
            $producto->setCosto($costo);
            $producto->setPrecio_venta($precio_venta);
            $producto->setCantidad($cantidad);
            $resultado = $producto->save();
        }else{
           $_SESSION['datos_error']="Por favor verifique sus datos"; 
        }
       
        if($resultado){
            $_SESSION['datos-correctos']="Datos guardados con exito";
        }else{
            $_SESSION['datos-error']="No se pudo guardar los datos";
        }
     
        header("Location:http://localhost/DashboardYosuko/?controller=producto&action=registro");
    }
}
<?php
require_once 'models/insumo.php';

class InsumoController{
    
    public function registro(){
        require_once 'views/insumo/registro.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $proveedor_id = isset($_POST['proveedor_id']) ? $_POST['proveedor_id'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $costo = isset($_POST['costo']) ? $_POST['costo'] : false;
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
            $unidad_medida = isset($_POST['unidad_medida']) ? $_POST['unidad_medida'] : false;
            $fecha_vencimiento = isset($_POST['fecha_vencimiento']) ? $_POST['fecha_vencimiento'] : false;
            
            if($proveedor_id && $nombre && $costo && $cantidad && $unidad_medida && $fecha_vencimiento){
                $insumo = new Insumo();
                $insumo->setProveedor_id($proveedor_id);
                $insumo->setNombre($nombre);
                $insumo->setCosto($costo);
                $insumo->setCantidad($cantidad);
                $insumo->setUnidad_medida($unidad_medida);
                $insumo->setFecha_vencimiento($fecha_vencimiento);
                
                $resultado = $insumo->save();
            }
            
            if($resultado){
                $_SESSION['datos-correctos'] = "Se guardaron los datos con exito...";
            }else{
                $_SESSION['datos-error'] = "No se puedo guardar los datos...";
            }
        }
        header("Location:http://localhost/DashboardYosuko/?controller=insumo&action=registro");
    }
}
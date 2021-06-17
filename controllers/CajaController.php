<?php
require_once 'models/caja.php';

class CajaController{
    
    public function apertura(){
        if($_POST){
            $fecha_apertura = isset($_POST['fecha_apertura']) ? $_POST['fecha_apertura'] : false;
            $hora_apertura = isset($_POST['hora_apertura']) ? $_POST['hora_apertura'] : false;
            $monto_apertura = isset($_POST['monto_apertura']) ? $_POST['monto_apertura'] : false;
            if($fecha_apertura && $hora_apertura && $monto_apertura){
                $caja = new Caja();
                $resultado = $caja->getAperturaCaja();
                if (is_null($resultado->fecha_apertura)) {
                    $caja->setFecha_apertura($fecha_apertura);
                    $caja->setHora_apertura($hora_apertura);
                    $caja->setMonto_apertura($monto_apertura);
                    $caja->setUsu_alta($_SESSION['identity']->id);
                    $caja->setFecha_alta(date("Y-m-d H:i:s",  time()));
                    //Primero hay que verificar si ya no hay una apertura sin cerrar
                    $resultado = $caja->saveApertura();
                    if($resultado){
                        $_SESSION['datos-correctos']="Apertura exitosa";
                    }else{
                        $_SESSION['datos-error']="no se pudo generar apertura";
                    }
                }else{
                   $_SESSION['datos-error']="Ya existe una apertura de caja con fecha <a href='www.google.com'>".$resultado->fecha_apertura."</a> a las ".$resultado->hora_apertura; 
                }
                
                
            }
            
            header("Location:".$_SERVER['HTTP_REFERER']); 
        }else{
           require_once 'views/caja/apertura.php'; 
        }
        
    }
    
    public function saveApertura(){
        
    }
    
    public function gestion(){
        require_once 'views/caja/gestion.php';
    }
}

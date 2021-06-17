<?php
require_once 'models/persona.php';

class PersonaController{
    
    public function registro(){
        require_once 'views/persona/registro.php';
    }

    public function getOne(){
        
        if(isset($_POST['BuscarDni'])){
            $dni = $_POST['BuscarDni'];
        }
        
        $persona = new Persona();
        $persona->setDni($dni);
        $persona = $persona->getOne();
        
        if($persona){
            $_SESSION['persona_temp'] = $persona;
        }else{
            $_SESSION['error']= "El DNI ".$dni." no se encuntra registrado";
        }
        header("Location: http://localhost/DashboardYosuko/?controller=usuario&action=registro");
    }
    
    public function save(){
        if($_POST){
            $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
            $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            
            if($dni && $nombre && $apellido && $fecha_nacimiento && $domicilio && $telefono){
                $persona = new Persona();
                $persona->setDni($dni);
                $persona->setNombre($nombre);
                $persona->setApellido($apellido);
                $persona->setFecha_nacimiento($fecha_nacimiento);
                $persona->setDomicilio($domicilio);
                $persona->setTelefono($telefono);
                
                
                $guarda = $persona->save();
                
                if($guarda){
                    $_SESSION['datos-correctos'] = "Los datos fueron cargados con exito...";
                    $persona = $persona->getOne();
                    $_SESSION['persona_temp'] = $persona;
                }else{
                    $_SESSION['datos-error'] = "Los datos no fueron procesados...";
                }
            }
        }
        
        header("Location:http://localhost/DashboardYosuko/?controller=persona&action=registro");
    }
}

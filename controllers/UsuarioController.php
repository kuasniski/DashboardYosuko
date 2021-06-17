<?php

require_once 'models/persona.php';
require_once 'models/usuario.php';

class UsuarioController {

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function logout() {
        unset($_SESSION['identity']);
        unset($_SESSION['mensaje']);
        unset($_SESSION['persona_temp']);
        unset($_SESSION['error']);
        header("Location: http://localhost/DashboardYosuko/");
    }

    public function login() {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setPassword($password);
            $identity = $usuario->login();

            if ($identity) {
                $_SESSION['identity'] = $identity;
            } else {
                $_SESSION['mensaje'] = "failed";
            }
        }

        header("Location: http://localhost/DashboardYosuko/");
    }

    public function save() {
        //array de errores
        $errores = Array();
        if (isset($_POST)) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if(!$nombre || empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/",$nombre)){
                $errores['nombre'] = "Nombre no valido...";
            }
            if(!$apellido || is_numeric($apellido) || preg_match("/[0-9]/", $apellido)){
                $errores['apellido'] = "Apellido no valido...";
            }
            if(!$email || empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errores['email'] = "El email no es valido...";
            }
            if(!$dni || !preg_match("/[0-9]/", $dni) || empty($dni)){
                $errores['dni'] = "El dni no es valido...";
            }
            if(!$telefono && preg_match("[a-zA-Z]", $telefono)){
                $errores['telefono'] = "El telefono no es valido...";
            }
            if(!$fecha_nacimiento || empty($fecha_nacimiento)){
                $errores['fecha'] = "La fecha no es valida... Debe ingresar una fecha";
            }
            
            //echo count($errores);
            //echo $errores['telefono'];
            //die();
            


                if (!empty($_FILES['imagen']['name'])) {
                    $file = $_FILES['imagen'];
                    $file_type = $file['type'];
                    $file_name = $file['name'];
                    
                    if($file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/gif"){
                

                        if (!is_dir("uploads/usuarios/imagen")) {
                            mkdir("uploads/usuarios/imagen", 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], 'uploads/usuarios/imagen/' . $file_name);
                        if (file_exists('uploads/usuarios/imagen/' . $dni. '.jpg')) {
                            unlink('uploads/usuarios/imagen/' . $dni. '.jpg');
                        }
                        rename('uploads/usuarios/imagen/' . $file_name, 'uploads/usuarios/imagen/' . $dni.'.jpg');
                        
                        $imagen_path = $dni.".jpg";
                        
                    }else{
                        $errores['imagen'] = "El formato de la imagen cargada no es valida...";
                    }
                }
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setDireccion($direccion);
                $usuario->setDni($dni);
                $usuario->setTelefono($telefono);
                $usuario->setFecha_nacimiento($fecha_nacimiento);
                
            if (count($errores) == 0) {

                
                if($imagen_path){
                   $usuario->setImagen_path($imagen_path); 
                }
                if (isset($_GET['id'])) {
                    $id_usuario = $_GET['id'];
                    $usuario->setId($id_usuario);
                    $resultado = $usuario->update();
                    
                }else {
                    $resultado = $usuario->save();
                    
                }
                
                if($resultado) {
                    $_SESSION['datos-correctos'] = "Datos guardados con exito.";
                }
            }else {
                $_SESSION['datos-error'] = "Por favor verifique los datos y vuelva intentar...";
                $_SESSION['errores'] = $errores;
                
                
            }
        }
        if($_GET['id']){
            $id = $_GET['id'];
            $redirec = "http://localhost/DashboardYosuko/?controller=usuario&action=editar&id=".$id;
        }else{
            $redirec = "http://localhost/DashboardYosuko/?controller=usuario&action=registro";
        }
        header("Location: ".$redirec);
    }

    public function lista() {

        $usuarios = new Usuario();
        $usuarios = $usuarios->getAll();
        require_once 'views/usuario/lista.php';
    }

    public function buscar() {
        if ($_POST['nombre']) {
            $nombre = $_POST['nombre'];
            $usuario = new Usuario();
            $usuarios = $usuario->getAllByName($nombre);
        }

        require_once 'views/usuario/lista.php';
    }

    public function editar() {
        if ($_GET) {
            $id_usuario = isset($_GET['id']) ? $_GET['id'] : false;
            $usuario = new Usuario();
            $usuario->setId($id_usuario);
            $usuario = $usuario->getOne();
            $editar = true;

            require_once 'views/usuario/registro.php';
        }
    }

}

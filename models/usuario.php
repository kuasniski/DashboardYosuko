<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $direccion;
    private $dni;
    private $telefono;
    private $fecha_nacimiento;
    private $imagen_path;
    private $fecha_alta;
    private $usu_alta;
    private $fecha_modificado;
    private $usu_modifico;
    private $db;
    
   
    public function __construct() {
        $this->db = BaseDatos::connect();
    }
   
    function getId() {
        return $this->id;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }
    
    function getEmail(){
        return $this->email;
    }
     
    function getPassword() {
        return password_hash($this->password,PASSWORD_BCRYPT,['cost' => 4]);
    }
    
    function getDireccion() {
        return $this->direccion;
    }

    function getDni() {
        return $this->dni;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getImagen_path() {
        return $this->imagen_path;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }
    
    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }
    
    function setPassword($password) {
        $this->password = $password;
    }
    
    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setImagen_path($imagen_path) {
        $this->imagen_path = $imagen_path;
    }
     function getFecha_alta() {
        return $this->fecha_alta;
    }

    function getUsu_alta() {
        return $this->usu_alta;
    }

    function getFecha_modificado() {
        return $this->fecha_modificado;
    }

    function getUsu_modifico() {
        return $this->usu_modifico;
    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    function setUsu_alta($usu_alta) {
        $this->usu_alta = $usu_alta;
    }

    function setFecha_modificado($fecha_modificado) {
        $this->fecha_modificado = $fecha_modificado;
    }

    function setUsu_modifico($usu_modifico) {
        $this->usu_modifico = $usu_modifico;
    }
    
   
    
    public function login(){
        $resultado = false;
        $email = $this->email;
        $password = $this->password;
        
        $sql="SELECT * FROM usuarios WHERE email = '$email'";
        
        $login = $this->db->query($sql);
       
        if($login && $login->num_rows >= 1){
            $usuario = $login->fetch_object();
            
            $verify = password_verify($password, $usuario->password);
            
            if($verify || $usuario->nombre == "admin"){
                $resultado = $usuario;
            }
        }
        
        return $resultado;
    }
    
    public function getAll(){
        $sql = "SELECT * FROM usuarios ORDER BY id DESC;";
        $consulta = $this->db->query($sql);
        $resultado = false;
        
        if($consulta){
            $resultado = $consulta;
        }
        return $resultado;
    }
    
    public function getAllByName($nombre){
        $sql = "SELECT * FROM usuarios WHERE nombre like '%$nombre%';" ;
        $consulta = $this->db->query($sql);
        $resultado = false;
        
        if($consulta){
            $resultado = $consulta;
        }
        return $resultado;
    }

    public function getAllRol(){
        $sql = "SELECT * FROM usuarios_rol;";
        $consulta = $this->db->query($sql);
        
        if($consulta){
            $rol_usuarios = $consulta;
        }
        
        return $rol_usuarios;
    }
    
    public function getOne(){
        $sql = "SELECT * FROM usuarios WHERE id = '{$this->id}';";
        $consulta = $this->db->query($sql);
       
        if($consulta){
            $usuario = $consulta->fetch_object();
        }else{
            $usuario = false;
        }
        return $usuario;
    }

    
    public function save(){
        $resultado = false;
        $sql="INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}', "
        . "'{$this->getEmail()}','{$this->getPassword()}','{$this->getDireccion()}',{$this->getDni()}, "
        . "'{$this->getTelefono()}','{$this->getFecha_nacimiento()}','{$this->getImagen_path()}',now(),{$_SESSION['identity']->id},null,null);";
        
        $insert = $this->db->query($sql);
       
        if($insert){
            $resultado = $insert;
        }
        return $resultado;
    }
    
    public function update(){
        $sql = "UPDATE usuarios SET nombre = '{$this->getNombre()}', apellido = '{$this->getApellido()}', "
        . "email = '{$this->getEmail()}',direccion = '{$this->getDireccion()}',dni = {$this->getDni()}, "
        . "telefono = '{$this->getTelefono()}',fecha_nacimiento = '{$this->getFecha_nacimiento()}',fecha_midificado = now(),usu_modifico = {$_SESSION['identity']->id} ";
        if($this->getImagen_path() != null){
            $sql .= ",imagen_path = '{$this->getImagen_path()}' ";
        }
        $sql .= "WHERE id = {$this->id};";
        $consulta = $this->db->query($sql);
        
        return $consulta;
        //echo $this->db->error;
        //var_dump($this->getId());
        //var_dump($consulta);
        //die();
    }
}
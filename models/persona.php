<?php

class Persona{
    private $id;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $domicilio;
    private $razon_social;
    private $cuit;
    private $tipo_persona;
    private $telefono;
    private $dni;
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

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getDomicilio() {
        return $this->domicilio;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getCuit() {
        return $this->cuit;
    }

    function getTipo_persona() {
        return $this->tipo_persona;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDni() {
        return $this->dni;
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

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $this->db->real_escape_string($domicilio);
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setCuit($cuit) {
        $this->cuit = $cuit;
    }

    function setTipo_persona($tipo_persona) {
        $this->tipo_persona = $tipo_persona;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    public function getOne(){
        $sql = "SELECT * FROM personas WHERE dni = {$this->dni};";
        $consulta = $this->db->query($sql);
         
        if($consulta){
            $persona = $consulta->fetch_object();
        }
        return $persona;
    }
    
    public function loadLastPerson(){
        $sql = "SELECT LAST_INSERT_ID as 'persona_id'";
        $id_persona = $this->db->query($sql);
    }


    public function save(){
        $sql = "INSERT INTO personas VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}', "
                . "'{$this->getFecha_nacimiento()}','{$this->getDomicilio()}', "
                . "'ninguna',20-99999999-9,1,'{$this->getTelefono()}', {$this->getDni()});";
                
        $insert = $this->db->query($sql);
        $resutado = false;
        
        if($insert){
            $resultado = true;
        }
        return $resultado;
    }
}
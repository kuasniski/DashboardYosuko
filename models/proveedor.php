<?php
class Proveedor{
    private $id;
    private $nombra;
    private $cuit;
    private $direccion;
    private $telefono;
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

    function getNombra() {
        return $this->nombra;
    }

    function getCuit() {
        return $this->cuit;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
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

    function setId($id) {
        $this->id = $id;
    }

    function setNombra($nombra) {
        $this->nombra = $nombra;
    }

    function setCuit($cuit) {
        $this->cuit = $cuit;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
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

    public function getAll(){
        $proveedores = false;
        $sql = "SELECT * FROM proveedores;";
        $proveedores = $this->db->query($sql);
       
        return $proveedores;
    }
    
    public function save(){
        $sql = "INSERT INTO proveedores VALUES(NULL,'{$this->getNombra()}',{$this->getCuit()},'{$this->getDireccion()}',{$this->getTelefono()},"
        . "now(),{$_SESSION['identity']->id},now(),{$_SESSION['identity']->id});";
        
        $resultado = $this->db->query($sql);
        //var_dump($resultado);
        //echo $this->db->error;
        //die();
        return $resultado;
    }
    
    
}

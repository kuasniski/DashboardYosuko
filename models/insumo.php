<?php

class Insumo{
    private $id;
    private $proveedor_id;
    private $nombre;
    private $costo;
    private $cantidad;
    private $unidad_medida;
    private $fecha_vencimiento;
    private $feha_alta;
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

    function getProveedor_id() {
        return $this->proveedor_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCosto() {
        return $this->costo;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getUnidad_medida() {
        return $this->unidad_medida;
    }

    function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    function getFeha_alta() {
        return $this->feha_alta;
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

    function setProveedor_id($proveedor_id) {
        $this->proveedor_id = $proveedor_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setUnidad_medida($unidad_medida) {
        $this->unidad_medida = $unidad_medida;
    }

    function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setFeha_alta($feha_alta) {
        $this->feha_alta = $feha_alta;
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

    
  
    public function save(){
        $sql = "INSERT INTO insumos VALUES(null,{$this->getProveedor_id()},'{$this->getNombre()}',{$this->getCosto()},{$this->getCantidad()}, "
        . "'{$this->getUnidad_medida()}','{$this->getFecha_vencimiento()}',now(),{$_SESSION['identity']->id},now(),{$_SESSION['identity']->id});";
        $insert = $this->db->query($sql);
        
        return $insert;
    }
 
    
}
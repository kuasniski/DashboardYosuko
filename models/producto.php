<?php
class Producto{
    private $id;
    private $descripcion;
    private $costo;
    private $precio_venta;
    private $cantidad;
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

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCosto() {
        return $this->costo;
    }

    function getPrecio_venta() {
        return $this->precio_venta;
    }

    function getCantidad() {
        return $this->cantidad;
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

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function setPrecio_venta($precio_venta) {
        $this->precio_venta = $precio_venta;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
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


    public function save(){
        $sql="INSERT INTO productos VALUES(NULL,'{$this->getDescripcion()}',{$this->getCosto()},{$this->getPrecio_venta()},{$this->getCantidad()}, "
        . "now(),{$_SESSION['identity']->id},now(),{$_SESSION['identity']->id});";
        $resultado=$this->db->query($sql);
        return $resultado;
    }
}
<?php

class Caja{
    private $id;
    private $fecha_apertura;
    private $hora_apertura;
    private $monto_apertura;
    private $ingreso;
    private $egreso;
    private $fecha_cierre;
    private $hora_cierre;
    private $monto_cierre;
    private $fecha_alta;
    private $usu_alta;
    private $fecha_modificado;
    private $usu_modifico;
    private $db;
    
    function __construct() {
        $this->db = BaseDatos::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getFecha_apertura() {
        return $this->fecha_apertura;
    }

    function getHora_apertura() {
        return $this->hora_apertura;
    }

    function getMonto_apertura() {
        return $this->monto_apertura;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getEgreso() {
        return $this->egreso;
    }

    function getFecha_cierre() {
        return $this->fecha_cierre;
    }

    function getHora_cierre() {
        return $this->hora_cierre;
    }

    function getMonto_cierre() {
        return $this->monto_cierre;
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

    function setFecha_apertura($fecha_apertura) {
        $this->fecha_apertura = $fecha_apertura;
    }

    function setHora_apertura($hora_apertura) {
        $this->hora_apertura = $hora_apertura;
    }

    function setMonto_apertura($monto_apertura) {
        $this->monto_apertura = $monto_apertura;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setEgreso($egreso) {
        $this->egreso = $egreso;
    }

    function setFecha_cierre($fecha_cierre) {
        $this->fecha_cierre = $fecha_cierre;
    }

    function setHora_cierre($hora_cierre) {
        $this->hora_cierre = $hora_cierre;
    }

    function setMonto_cierre($monto_cierre) {
        $this->monto_cierre = $monto_cierre;
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


    public function saveApertura(){
        $sql = "INSERT INTO caja VALUES(NULL,'{$this->getFecha_apertura()}','{$this->getHora_apertura()}',"
        . "{$this->getMonto_apertura()},0,0,NULL,NULL,0,'{$this->getFecha_alta()}',{$this->getUsu_alta()},'{$this->getFecha_alta()}',{$this->getUsu_alta()});";
        $resultado = $this->db->query($sql);
        
        return $resultado;
    }
    
    public function getAperturaCaja(){
        $sql = "SELECT * FROM caja WHERE fecha_cierre IS NULL";
        $resultado = $this->db->query($sql);
        if ($resultado) {
            $caja = $resultado->fetch_object();
        } 
      
        return $caja;
    }
    
    public function getTipoFacturas(){
        $sql = "SELECT * FROM tipo_facturas;";
        $consulta = $this->db->query($sql);
        return $consulta;
    }
}
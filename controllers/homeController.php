<?php

class homeController{
    
    
    public function index(){
       
        $titulo = "Panel Principal";
        require_once 'views/home/index.php';
    }
}
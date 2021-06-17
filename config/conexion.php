<?php

class BaseDatos{
    public static function connect(){
        $db = new mysqli('localhost', 'root','','yosuko');
        $db->query("SET NAMES 'utf-8'");
        
        return $db;
    }
}

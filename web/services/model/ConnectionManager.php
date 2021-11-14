<?php
class ConnectionManager {
    public function getConnection() {        
        $dsn  = "mysql:host=localhost;dbname=wad_t7";
        return new PDO($dsn, "root", "root");  
    }
}
?>
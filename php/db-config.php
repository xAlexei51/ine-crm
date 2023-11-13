<?php 

class Conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ine_database";

    public function __constructor(){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function getServername(){
        return $this->servername;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getdbName(){
        return $this->dbname;
    }    
}


?>
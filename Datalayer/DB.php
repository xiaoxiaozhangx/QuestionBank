<?php

class DB{
    private $connection='';
    
    public function __construct() {
        $host='localhost';
        $user='root';
        $password='';
        $database='questionbank';
        $this->connection= mysqli_connect($host, $user, $password, $database);
        if(!$this->connection)
            die('Database Not Connct'.mysqli_error($this->connection));  
        
        
    
    }
    public function dbConector(){
       // print_r($this->connection);
        return $this->connection;
    }
    
    
}

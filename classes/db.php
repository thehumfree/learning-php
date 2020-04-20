<?php

class DB{
    private $host = "localhost";
    private $user = "root";
    private $password ="";
    private $dbname = "assignment";
    private $port = 3308;
    function __construct(){
        $this->runDB();
    }
    function runDB(){
       $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname, $this->port);
        if(!$conn){
            echo die("Connection not made".mysqli_error($conn));
        }else{echo "weldone";}
    }
}

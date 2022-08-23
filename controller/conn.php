<?php
class Conn {
    protected $conn;
    function __construct($banco = 'jump')
    {
        $host = 'localhost';
        $user = 'root';
        $senha = '';
        $this->conn = new mysqli($host, $user, $senha, $banco);
        if($this->conn->connect_error){
            die ('erro'.$this->conn->connect_error);
        }
        
    }
}
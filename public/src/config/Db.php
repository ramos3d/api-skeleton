<?php

class Db
{
    private $host     = "localhost";
    private $db_name  = "slim";
    private $username = "root";
    private $password = "ramos3d";
    private $conn;

    public function connect(){
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
            $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully \n";
            }
        catch(PDOException $e)
            {
            echo "Connection failed: \n" . $e->getMessage();
            }
            return $this->conn;
    }
}

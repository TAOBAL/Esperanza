<?php
class database{
    protected $conn;
    public $server = "localhost";
    public $user = "root";
    public $dbname = "esperanza";
    public $pass = "";

    function connectDB(){
        try {
            $this->conn = new PDO("mysql:hostname=$this->server;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
            return $this->conn;
        }
        catch (PDOException $e){
            return "Connection Failed: ".$e->getMessage();
        }
    }
}
?>
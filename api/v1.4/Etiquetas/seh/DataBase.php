<?php

class DataBase {

    public function __construct(
        protected string|null $server = null,
        protected string|null $username = null,
        protected string|null $password = null,
        public string|null $type = null
    ){}

    public $message = "";

    public function setMessage($msg){
        $this->message = $msg;
    }

    public function getMessage(){
        return $this->message;
    }

    public $conexion = null;

    public function setConexion($conexion){
        $this->conexion = $conexion;
    }

    public function getConexion(){
        return $this->conexion;
    }

    protected function setServer(string $server){
        $this->server = $server;
    }

    protected function setUsername(string $username){
        $this->username = $username;
    }

    protected function setPassword(string $password){
        $this->password = $password;
    }

    public function setType(string $type){
        $this->type = $type;
    }

    protected function getServer(){
        return $this->server;
    }

    protected function getUsername(){
        return $this->username;
    }

    protected function getPassword(){
        return $this->password;
    }

    public function getType(){
        return $this->type;
    }

    protected function mysqliConnection(){

        $conn = new \mysqli($this->getServer(), $this->getUsername(), $this->getPassword());
        $this->setConexion($conn);
        if ($conn->connect_error) {
            $this->setMessage("Connection failed");
        }else{
            $this->setMessage("Connected successfully");
        }

    }

    protected function pdoConnection(string $dbName = null){

        try {
            if($dbName != null){

                $conn = new \PDO("mysql:host=".$this->getServer().";dbname=$dbName", $this->getUsername(), $this->getPassword());
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->setConexion($conn);
                $this->setMessage("Connected successfully");

            }else{

                $conn = new \PDO("mysql:host=".$this->getServer(), $this->getUsername(), $this->getPassword());
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->setConexion($conn);
                $this->setMessage("Connected successfully");

            }
        } catch(PDOException $e) {
            $this->setMessage("Connection failed");
        }

    }

    public function connect(string|null $dbName = null){

        $type = $this->getType();

        switch($type){
            case "mysqli" : return $this->mysqliConnection(); break;
            case "pdo" : return $this->pdoConnection($dbName); break;
        }

    }

    public function createDb($conexion, string $dbName){

        if($this->getType() === "mysqli"){

            $sql = "CREATE DATABASE $dbName";

            if ($conexion->query($sql) === TRUE) {
                $this->setMessage("Database created successfully");
            } else {
                $this->setMessage("Error creating database");
            }

            $conexion->close();

        }else if($this->getType() === "pdo"){

            try {
                $sql = "CREATE DATABASE $dbName";
                $conexion->exec($sql);
                $this->setMessage("Database created successfully");
            } catch(PDOException $e) {
                $this->setMessage("Error creating database");
            }

        }

    }

}
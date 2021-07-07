<?php

class DataBase {

    private $host = 'localhost';
    private $db_name = 'blog';
    private $user = 'root';
    private $pass = '';

    private $conexion;

    public function connect() {

        $this->conexion = null;

        try {

            $this->conexion = new PDO ('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->user, $this->pass);

            $this->conexion->setAttributes (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $pdoex) {

            die( 'Error de conexion : ' . $pdoex->getMessage() );

        }

        return $this->conexion;

    }

}
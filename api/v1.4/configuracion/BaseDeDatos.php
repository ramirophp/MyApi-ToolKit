<?php

class BaseDeDatos {

    private $maquina = 'localhost';
    private $baseDeDatos = 'piezas';
    private $usuario = 'root';
    private $contrasexa = '';

    private $conexion;

    public function conectarCon() {

        $this->conexion = null;

        try {

            $this->conexion = new PDO ('mysql:host=' . $this->maquina . ';dbname=' . $this->baseDeDatos,
            $this->usuario, $this->contrasexa);

            $this->conexion->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $error) {

            die( 'Error de conexion : ' . $error->getMessage() );

        }

        return $this->conexion;

    }

}
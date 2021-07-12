<?php

class Etiquetas {

    private $conexion;
    private $table = 'tags';

    public $id;
    public $name;

    public function __construct ($db) {

        $this->conexion = $db;

    }

    public function read () {

        $query = '
            SELECT id,name
            FROM '. $this->table . ' 
            ORDER BY id DESC';

        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    public function paginacion (int $inicia_desde, int $articulos_por_pagina) {

        $query = "
            SELECT SQL_CALC_FOUND_ROWS id,name
            FROM ". $this->table . " 
            ORDER BY id DESC LIMIT $inicia_desde, $articulos_por_pagina
        ";

        $stmt = $this->conexion->prepare($query);
        $stmt->execute();

        $total_registros = $this->conexion->query('SELECT FOUND_ROWS() as total');
        $registros_en_total = (int)$total_registros->fetch()['total'];

        $paginas_en_total = ceil($registros_en_total / $articulos_por_pagina);

        return [
            'etiquetas' => $stmt,
            'registrosEnTotal' => $registros_en_total,
            'paginas_en_total' => $paginas_en_total
        ];

    }

    public function read_single () {

        $query = '
            SELECT id,name
            FROM '. $this->table . ' 
            WHERE
             id = ? 
            LIMIT 0,1';

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->name = $row['name'];

    }

    public function create () {

        $query = 'INSERT INTO ' . $this->table . '
            SET
             name = :name
        ';

        $stmt = $this->conexion->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(':name', $this->name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }

    public function update () {

        $query = 'UPDATE ' . $this->table . '
            SET
             name = :name
            WHERE
             id = :id
        ';

        $stmt = $this->conexion->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }

    public function delete () {

        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        $stmt = $this->conexion->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ( $stmt->execute() ) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }

}
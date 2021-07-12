<?php class Conectar {

    private array $datos_para_conectar = [
        'servidor' => 'localhost',
        'nombre_de_la_base_de_datos_en_el_servidor' => 'piezas',
        'nombre_de_usuario' => 'root',
        'contraseña' => '',
        'objeto' => null
    ];

    public function conectar () {

        try {

            $this->datos_para_conectar['objeto'] = new PDO (
                'mysql:host=' . $this->datos_para_conectar['servidor'] . 
                ';dbname=' . $this->datos_para_conectar['nombre_de_la_base_de_datos_en_el_servidor'],
                $this->datos_para_conectar['nombre_de_usuario'],
                $this->datos_para_conectar['contraseña']
            );

        } catch (PDOException $e) {

            die($e->getMessage());

        }

        return $this->datos_para_conectar['objeto'];

    }

}
<?php 

class Logger {

    public static function logger ($log) {

        if ( !file_exists ( './Respuesta/log/log.txt' ) ) {

            file_put_contents ( './Respuesta/log/log.txt', '' );

        }

        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('America/Denver');
        $time = date('m/d/y h:iA',time());

        $content = file_get_contents('./Respuesta/log/log.txt');
        $content .= "$ip\t$time\t$log\r";

        file_put_contents('./Respuesta/log/log.txt',$content);

    }

}

class Respuesta {

    private array $recursosPermitidos;
    private string $url;

    public function setRp (array $Rp) {
        $this->recursosPermitidos = $Rp;
    }

    public function getRp () {
        return $this->recursosPermitidos;
    }

    public function setUrl () {
        $uriTemporal = $_SERVER['REQUEST_URI'];
        $uriTemporal = str_replace('/','*/',$uriTemporal);
        $uriTemporal = explode('*',$uriTemporal);
        $this->url = (count($uriTemporal) === 7) ? $uriTemporal[4].$uriTemporal[5].$uriTemporal[6]  : (
            (count($uriTemporal) === 6) ? $uriTemporal[4].$uriTemporal[5] : ''
        );
    }

    public function getUrl () {
        return $this->url;
    }

    private function getPostPutDelete (string $recurso,string $subRecurso,int $int=0) {

        switch(strtoupper($_SERVER['REQUEST_METHOD'])) {

            case 'GET': 
                
                switch($recurso) {

                    case 'articulos': 
                        
                        if ( $subRecurso == 'registros' && $int == 0 ) {

                            require_once './EndPoints/LeerArticulos.php';

                        } elseif ( $subRecurso == 'registros' && $int != 0 ) {

                            //aqui el endpoint para  leer un articulo

                        }

                    break;

                }

            break;

            case 'POST': break;

            case 'PUT': break;

            case 'DELETE': break;

        }

    }

    public function response (string $uri) {
        //validamos que la url tenga el formato correcto
        if ( preg_match('/^[\/][a-z]{1,10}[\/][a-z]{1,10}([\/][0-9]{1,3})?$/',$uri) ) {
            //separamos la url en partes
            $recurso_subRecurso_paginacion_o_registros = [];
            $recurso_subRecurso_paginacion_o_registros = explode('/',$uri);
            //verifico que tipo de url recibimos
            if (count($recurso_subRecurso_paginacion_o_registros) == 4) {
                //Tomo los recursos y los agrego a su variable correspondiente
                $recurso = $recurso_subRecurso_paginacion_o_registros[1];
                $subRecurso = $recurso_subRecurso_paginacion_o_registros[2];
                //verifico si el recurso es valido
                if (array_key_exists($recurso,$this->getRp())) {
                    //verifico si el subRecurso es valido
                    if ( in_array($subRecurso,$this->getRp()[$recurso]) ) {
    
                        Logger::logger("Esta solicitando $recurso tipo $subRecurso");

                        $this->getPostPutDelete ($recurso,$subRecurso,$recurso_subRecurso_paginacion_o_registros[3]);
    
                    } else {
                        echo json_encode ( [
                            'respuesta' => 'Error 404 Sub Recurso No Encontrado.'
                        ] );
                    }

                } else {

                    echo json_encode ( [
                        'respuesta' => 'Error 404 Recurso No Encontrado.'
                    ] );

                }

            } elseif (count($recurso_subRecurso_paginacion_o_registros) == 3) {
                //Tomo los recursos y los agrego a su variable correspondiente
                $recurso = $recurso_subRecurso_paginacion_o_registros[1];
                $subRecurso = $recurso_subRecurso_paginacion_o_registros[2];
                //verifico si el recurso es valido
                if (array_key_exists($recurso,$this->getRp())) {
                    //verifico si el subRecurso es valido
                    if ( in_array($subRecurso,$this->getRp()[$recurso]) ) {

                        Logger::logger("Esta solicitando $recurso tipo $subRecurso");

                        $this->getPostPutDelete ($recurso,$subRecurso);
    
                    } elseif ( in_array($subRecurso,$this->getRp()[$recurso]) ) {
    
                        Logger::logger("Esta solicitando $recurso tipo $subRecurso");

                        $this->getPostPutDelete ($recurso,$subRecurso);
    
                    } else {

                        echo json_encode ( [
                            'respuesta' => 'Error 404 Sub Recurso No Encontrado.'
                        ] );

                    }

                } else {

                    echo json_encode ( [
                        'respuesta' => 'Error 404 Recurso No Encontrado.'
                    ] );

                }

            }

        } else {
            echo json_encode ( [
                'respuesta' => 'Error 404 Url No Encontrada.'
            ] );
        }

    } 

}
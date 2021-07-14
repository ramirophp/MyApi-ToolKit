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

        $isInt = trim($uriTemporal[count($uriTemporal)-1],'/');
        
        if(preg_match('/^[0-9]{1,3}$/',$isInt)) {
            $this->url = $uriTemporal[count($uriTemporal)-3].$uriTemporal[count($uriTemporal)-2].$uriTemporal[count($uriTemporal)-1];
        }else{
            $this->url = $uriTemporal[count($uriTemporal)-2].$uriTemporal[count($uriTemporal)-1];
        }
    }

    public function getUrl () {
        return $this->url;
    }

    private function getPostPutDelete (string $recurso,string $subRecurso,int $int = -1) {

        switch(strtoupper($_SERVER['REQUEST_METHOD'])) {

            case 'GET': 
                
                switch($recurso) {

                    case 'articulos': 
                        
                        if ( $subRecurso == 'registros' && $int == -1 ) {

                            require_once './EndPoints/Articulos/LeerArticulos.php';

                        } elseif ( $subRecurso == 'registros' && $int > 0 ) {

                            $_GET['id'] = $int;
                            require_once './Endpoints/Articulos/LeerArticulo.php';

                        } elseif ( $subRecurso == 'paginacion' && $int > 0 ) {

                            require_once './Endpoints/Articulos/ArticulosPaginacion.php';

                        } else {

                            echo json_encode ( [
                                'respuesta' => 'Error 404 Url No Encontrada.'
                            ] );

                        }

                    break;

                    case 'categorias':

                        if ( $subRecurso == 'registros' && $int == -1 ) {

                            require_once './EndPoints/Categorias/LeerCategorias.php';

                        } elseif ( $subRecurso == 'registros' && $int > 0 ) {

                            $_GET['id'] = $int;
                            require_once './Endpoints/Categorias/LeerCategoria.php';

                        } elseif ( $subRecurso == 'paginacion' && $int > 0 ) {
                            
                            require_once './Endpoints/Categorias/CategoriasPaginacion.php';

                        } else {

                            echo json_encode ( [
                                'respuesta' => 'Error 404 Url No Encontrada.'
                            ] );

                        }

                    break;

                    case 'etiquetas':

                        if ( $subRecurso == 'registros' && $int == -1 ) {

                            require_once './EndPoints/Etiquetas/LeerEtiquetas.php';

                        } elseif ( $subRecurso == 'registros' && $int > 0 ) {

                            $_GET['id'] = $int;
                            require_once './Endpoints/Etiquetas/LeerEtiqueta.php';

                        } elseif ( $subRecurso == 'paginacion' && $int > 0 ) {
                            
                            require_once './Endpoints/Etiquetas/EtiquetasPaginacion.php';

                        } else {

                            echo json_encode ( [
                                'respuesta' => 'Error 404 Url No Encontrada.'
                            ] );

                        }

                    break;

                    case 'atributos':

                        if ( $subRecurso == 'registros' && $int == -1 ) {

                            require_once './EndPoints/Atributos/LeerAtributos.php';

                        } elseif ( $subRecurso == 'registros' && $int > 0 ) {

                            $_GET['id'] = $int;
                            require_once './Endpoints/Atributos/LeerAtributo.php';

                        } elseif ( $subRecurso == 'paginacion' && $int > 0 ) {
                            
                            require_once './Endpoints/Atributos/AtributosPaginacion.php';

                        } else {

                            echo json_encode ( [
                                'respuesta' => 'Error 404 Url No Encontrada.'
                            ] );

                        }

                    break;

                    default : echo json_encode ( [
                        'respuesta' => 'Error 404 Recurso No Encontrado.'
                    ] );

                }

            break;

            case 'POST': 

                switch($recurso) {

                    case 'articulos': 

                        require_once './Endpoints/Articulos/CrearArticulo.php';
                    
                    break;

                    case 'categorias': 

                        require_once './Endpoints/Categorias/CrearCategoria.php';
                    
                    break;

                    case 'etiquetas': 

                        require_once './Endpoints/Etiquetas/CrearEtiqueta.php';
                    
                    break;

                    case 'atributos': 

                        require_once './Endpoints/Atributos/CrearAtributo.php';
                    
                    break;

                }
                
            break;

            case 'PUT': 

                switch($recurso) {

                    case 'articulos':

                        require_once('./Endpoints/Articulos/ActualizarArticulo.php');

                    break;

                    case 'categorias':

                        require_once('./Endpoints/Categorias/ActualizarCategoria.php');

                    break;

                    case 'etiquetas':

                        require_once('./Endpoints/Etiquetas/ActualizarEtiqueta.php');

                    break;

                    case 'atributos':

                        require_once('./Endpoints/Atributos/ActualizarAtributo.php');

                    break;

                }
                
            break;

            case 'DELETE': 
                
                switch($recurso) {

                    case 'articulos':

                        require_once('./Endpoints/Articulos/EliminarArticulo.php');

                    break;

                    case 'categorias':

                        require_once('./Endpoints/Categorias/EliminarCategoria.php');

                    break;

                    case 'etiquetas':

                        require_once('./Endpoints/Etiquetas/EliminarEtiqueta.php');

                    break;

                    case 'atributos':

                        require_once('./Endpoints/Atributos/EliminarAtributo.php');

                    break;

                }
                
            break;

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
                        
                        $this->getPostPutDelete ($recurso,$subRecurso,(int)$recurso_subRecurso_paginacion_o_registros[3]);
    
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

                        die($recurso);

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
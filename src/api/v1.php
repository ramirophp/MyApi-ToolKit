<?php $recursosPermitidos = ['tags','attrs','tag','attr'];

$uriTemporal = $_SERVER['REQUEST_URI'];//obtenemos la uri completa
$uriTemporal = str_replace('/','*/',$uriTemporal);//agregamos el divisor
$uriTemporal = explode('*',$uriTemporal);

$url = (count($uriTemporal) === 5) ? $uriTemporal[3].$uriTemporal[4] : (
    (count($uriTemporal) === 4) ? $uriTemporal[3] : ''
);

if ( preg_match('/^[\/][a-z]{1,10}([\/][0-9]{1,3})?$/',$url) ) {
    
    $recurso = trim($uriTemporal[3],'/');
   
    if ( !in_array($recurso, $recursosPermitidos) ) {
        echo json_encode([
            'mensaje' => 'Recurso No Permitido'
        ]);
    } else {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=piezas",'root', '');
            switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
                case 'GET':
                    $numeroPagina = -1;
                    if(count($uriTemporal) === 5) {
                        $numeroPagina = (int)trim($uriTemporal[4],'/');
                    }
                    $regPorPag = 10;
                    $iniDesde = ($numeroPagina > 1) ? ($numeroPagina * $regPorPag - $regPorPag) : 0;
                    if($recurso === 'tag') {
                        $sqlQuery = "SELECT * FROM tags ORDER BY id ASC";
                    }else if ($recurso === 'attr') {
                        $sqlQuery = "SELECT * FROM attrs ORDER BY id ASC";
                    }else{
                        $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS * FROM $recurso ORDER BY id ASC LIMIT $iniDesde, $regPorPag";
                    }
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $result = $pdo->prepare($sqlQuery);
                    $result->execute();
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $datos = $result->fetchAll();
                    $total = $pdo->query('SELECT FOUND_ROWS() as total');
                    $totalReg = (int)$total->fetch()['total'];
                    $pages = ceil($totalReg / $regPorPag);
                    switch($recurso) {
                        case 'tags':
                            if($numeroPagina > $pages || $numeroPagina < 1) {
                                echo json_encode([
                                    'mensaje' => '404 Pagina No Encontrada'
                                ]);
                            }else{
                                echo json_encode([
                                    'recurso' => $recurso,
                                    'numeroPagina' => $numeroPagina,
                                    'registrosPorPagina' => $regPorPag,
                                    'iniciaDesde' => $iniDesde,
                                    'totalRegistros' => $totalReg,
                                    'paginas' => $pages,
                                    'registros' => $datos
                                ]);
                            }
                            break;
                        case 'tag':
                            if($numeroPagina > 0) {
                                if(count($datos) == 0) {
                                    echo json_encode([
                                        'mensaje' => 'No hay Registros'
                                    ]);
                                }else{
                                    echo json_encode([
                                        'tag' => $datos[$numeroPagina-1]
                                    ]);
                                }
                            }else{
                                if(count($datos) == 0) {
                                    echo json_encode([
                                        'mensaje' => 'No hay Registros'
                                    ]);
                                }else{
                                    echo json_encode([
                                        'tags' => $datos
                                    ]);
                                }
                            }
                        break;
                        case 'attrs': 
                            if($numeroPagina > $pages || $numeroPagina < 1) {
                                echo json_encode([
                                    'mensaje' => '404 Pagina No Encontrada'
                                ]);
                            }else{
                                echo json_encode([
                                    'recurso' => $recurso,
                                    'numeroPagina' => $numeroPagina,
                                    'registrosPorPagina' => $regPorPag,
                                    'iniciaDesde' => $iniDesde,
                                    'totalRegistros' => $totalReg,
                                    'paginas' => $pages,
                                    'registros' => $datos
                                ]);
                            }
                        break;
                        case 'attr':
                            if($numeroPagina > 0) {
                                if(count($datos) == 0) {
                                    echo json_encode([
                                        'mensaje' => 'No hay Registros'
                                    ]);
                                }else{
                                    echo json_encode([
                                        'attr' => $datos[$numeroPagina-1]
                                    ]);
                                }
                            }else{
                                if(count($datos) == 0) {
                                    echo json_encode([
                                        'mensaje' => 'No hay Registros'
                                    ]);
                                }else{
                                    echo json_encode([
                                        'attrs' => $datos
                                    ]);
                                }
                            }
                        break;
                    }
                break;
            }
        }catch(PDOException $e) {
            echo json_encode(['mensaje'=>$e->getMessage()]);
        }
    }
} else {
    echo json_encode([
        'mensaje' => '404 url no valida'
    ]);
}
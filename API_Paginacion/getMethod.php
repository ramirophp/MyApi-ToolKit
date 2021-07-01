<?php $numeroPagina = -1;
/**
 * En caso contrario ya podemos 
 * limpiar el numero de pagina 
 * y dejarlo listo para su posterior 
 * uso
 */
if(count($uriTemporal) === 5) {
    $numeroPagina = (int)trim($uriTemporal[4],'/');
}

/**
 * Primero establecemos el numero de resutados
 * que queremos ver por pagina, y despues 
 * realizamos el calculo que determinara
 * desde que punto traeremos registros
 * de la tabla de la base da datos
 */
$regPorPag = 10;
$iniDesde = ($numeroPagina > 1) ? ($numeroPagina * $regPorPag - $regPorPag) : 0;
/**
 * ya que tenemos establecidos el numero
 * de registros por pagina y desde donde iniciara
 * a traer registros de la tabla tags,
 * lo siguiente sera crear el querie sql
 */
if($recurso === 'tag') {
    $sqlQuery = "SELECT * FROM tags ORDER BY id ASC";
}else if ($recurso === 'attr') {
    $sqlQuery = "SELECT * FROM attrs ORDER BY id ASC";
}else{
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS * FROM $recurso ORDER BY id ASC LIMIT $iniDesde, $regPorPag";
}
/**
 * ya que tenemos el query preparamos
 * la peticion a la base de datos
 * y la ejecutamos
 */
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $pdo->prepare($sqlQuery);
$result->execute();
$result->setFetchMode(PDO::FETCH_ASSOC);
$datos = $result->fetchAll();
/**
 * ya que tenemos los registros 
 * ahora tendremos que establecer
 * algunos datos necesarios para
 * la paginacion como es el total
 * de registros y el ultimo registro
 * o bien podriamos verlo asi o como
 * el calculo para determinar
 * el total de paginas de la
 * paginacion
 */
$total = $pdo->query('SELECT FOUND_ROWS() as total');
$totalReg = (int)$total->fetch()['total'];
$pages = ceil($totalReg / $regPorPag);
/**
 * Verificamos que no se exceda
 * el numero de paginas
 */

/**
 * antes de decidir que repuesta enviar
 * determinemos que recurso nos ha solicitado
 * el usuario
 */

switch($recurso) {
    case 'tags':
        require_once './pagination.php';
        break;
    case 'tag':
        if($numeroPagina > 0) {
            if(count($datos) < 2) {
                echo json_encode([
                    'tag' => $datos
                ]);
            }else{
                echo json_encode([
                    'tag' => $datos[$numeroPagina-1]
                ]);
            }
        }else{
            if($numeroPagina == 0) {
                echo json_encode([
                    'mensaje' => 'error 404 pagination not found'
                ]);
            }else{
                echo json_encode([
                    'tags' => $datos
                ]);
            }
        }
    break;
    case 'attrs': 
        require_once './pagination.php';
    break;
    case 'attr':
        if($numeroPagina > 0) {
            if(count($datos) < 2) {
                echo json_encode([
                    'attrs' => $datos
                ]);
            }else{
                echo json_encode([
                    'attr' => $datos[$numeroPagina-1]
                ]);
            }
        }else{
            if($numeroPagina == 0) {
                echo json_encode([
                    'mensaje' => 'error 404 pagination not found'
                ]);
            }else{
                echo json_encode([
                    'attrs' => $datos
                ]);
            }
        }
    break;
}
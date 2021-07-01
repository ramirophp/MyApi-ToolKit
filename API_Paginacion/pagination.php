<?php

if($numeroPagina > $pages || $numeroPagina < 1) {
    /**
     * Si se excede el numero de paginas
     * le indicamos al usuario que 
     * esa pagina no existe
     */
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
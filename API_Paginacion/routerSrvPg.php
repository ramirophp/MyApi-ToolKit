<?php $recursosPermitidos = ['tags','attrs','tag','attr'];
/**
 * #- API PAGINACION -# file : routerSrvPg (router|server|paginacion)
 * 
 * Lo principal para poder realizar esta api es
 * establecer el formato de la url, en este caso
 * trabajaremos con dos datos importantes para 
 * este proyecto en especifico, 1- el recurso
 * 2- el numero de pagina
 * 
 * en esta ocasion tendremos por recurso una
 * lista de etiquetas html (tags) y seguido
 * de este tendremos el numero de pagina
 * en la cual nos encontramos 
 */
$uriTemporal = $_SERVER['REQUEST_URI'];//obtenemos la uri completa
$uriTemporal = str_replace('/','*/',$uriTemporal);//agregamos el divisor
$uriTemporal = explode('*',$uriTemporal);//separamos la url
/**
 * Los datos que necesitamos en este formato en especifico
 * los podremos encontrar en las posiciones 3 y 4
 * del arreglo $uriTemporal, el sigueinte paso es 
 * concatenar estas dos posiciones para simular
 * que esa url es la recibimos directamente de la
 * peticion ajax.
 * 
 * cuando se ingrese al archivo directamente
 * no se generara ninguna url utilizable
 * entonces es necesario validar que 
 * el arreglo tenga la longitud que 
 * estamos asignando de lo contrario
 * nos quedamos con la ariable $url vacia
 */

$isInt = trim($uriTemporal[count($uriTemporal)-1],'/');
        
if(preg_match('/^[0-9]{1,3}$/',$isInt)) {
    $url = $uriTemporal[count($uriTemporal)-2].$uriTemporal[count($uriTemporal)-1];
}else{
    $url = $uriTemporal[count($uriTemporal)-1];
}
/*
$url = (count($uriTemporal) === 5) ? $uriTemporal[3].$uriTemporal[4] : (
    (count($uriTemporal) === 4) ? $uriTemporal[3] : ''
);*/
/**
 * Ya que tenemos el formato de url
 * que necesitamos , el siguiente paso es
 * evaluar si la url es valida
 * 
 * para evaluar la url utilizamos un patron
 * de expresion regular, la cual verificara
 * que la url inicie con / , despues
 * esta tendra que tener una palabra
 * compuesta de letras minusculas
 * con una longitud de entre 1 y 10 letras
 * seguido a esta palabra debemos encontrar un /
 * y finalmente debemos encontrar un numero entre 1 y 3 digitos de longitud
 * el cual indicara el numero de la pagina actual
 */
if ( preg_match('/^[\/][a-z]{1,10}([\/][0-9]{1,3})?$/',$url) ) {
    /**
     * Si se comprueba que efectivamente 
     * la url cumple con el formato establecido 
     * entonces podremos tomar los valores 
     * de las posiciones 3 y 4 del arreglo $uriTemporal
     * y el siguiente paso sera quedarnos solamente
     * con la parte alfabetica y la parte numerica
     * limpiando los /
     */
    $recursos = explode('/',$url);

    $recurso = trim($recursos[1],'/');
    /**
     * En este punto ya tenemos el recurso y 
     * el numero de pagina , pero aun no 
     * sabemos si el recurso que obtuvimos es valido
     * entonces antes de pensar en utilizar el numero
     * de pagina tendremos que verificar si el curso
     * solicitado es permitido
     */
    if ( !in_array($recurso, $recursosPermitidos) ) {
        /**
         * Si el recurso no se encuentra en el 
         * arreglo $recursosPermitidos, entonces
         * enviamos el mensaje que indique
         * que el recurso no es permitido
         */
        echo json_encode([
            'mensaje' => 'Recurso No Permitido'
        ]);
    } else {
        /**
         * entonces definimos el objeto pdo...
         * 
         * antes de definir el objeto pdo
         * haremos una verificacion de si la
         * base de datos futuredeveloper
         * existe, y si no existe entonces
         * la creamos y despues procedemos
         * con la definicion del pdo object
         * 
         * el siguiente script para crear 
         * la base de datos y las tablas correspondientes
         * solo se ejecutara una sola vez
         */
        require_once './createDbs.php';
        /**
         * En este punto lo siguiente es obtener los datos 
         * de la base de datos y establecer los limites
         * de la paginacion, como el numero de resultados
         * por pagina, numero de paginas y el ultimo registro
         * 
         * primero establecemos una conexion con la base de datos
         * el siguiente codigo tiene que estar dentro de un try{}catch{}
         */
        try {
            require_once './pdo.php';
            #########################################

            if($llenarTablas) {

                $tags = ['!DOCTYPE','html','head','link','title','body','ul','li','a','h2','section','form',
                'label','span','input','div','footer','i','script','br','h1','header','b','p','h6','h5',
                'video','main'];
                $attrs = ['html','rel','type','href','id','name','placeholder',
                'for','value','class','src','defer','crossorigin','lang','title',
                'action','method','width','controls','autoplay','loop'];
            
                for($i = 0; $i < count($tags); $i++){
                    $mysql = $pdo->prepare("INSERT INTO tags(name) VALUES('".$tags[$i]."')");
                    $mysql->execute();
                }
            
                for($i = 0; $i < count($attrs); $i++){
                    $mysql = $pdo->prepare("INSERT INTO attrs(name) VALUES('".$attrs[$i]."')");
                    $mysql->execute();
                }

                $llenarTablas = false;

            }

            #########################################
            /**
             * Le pasamos los datos de conexion y
             * si todo sale bien , entonces 
             * determinemos que tabla debemos consultar
             * estableciendo los recursos disponibles 
             * en forma de verbos, que accionan determinada
             * tarea en base a lo que se reciba como recurso.
             * 
             * para no repetir codigo al tratar de acceder
             * a otro recurso , comentare las lineas
             * correspondientes al switch y la solucion
             * sera simplemente agregar la variable
             * recurso al query ya que esta api
             * solo es para obtener datos
             * el codigo que ejecuta las consultas
             * siempre sera el mismo y lo unico que
             * cambiara sera el recurso o bien el 
             * nombre de la table en la base de datos
             */
            switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
                case 'GET':
                    require_once './getMethod.php';
                break;
                case 'POST':
                    if($recurso === 'tags') {
                        $name = htmlspecialchars($_POST['tag']);
                        $mysql = $pdo->prepare("INSERT INTO tags(name) VALUES('$name')");
                        $mysql->execute();
                        
                        echo json_encode([
                            'mensaje' => 'saved'
                        ]);
                        
                    }elseif($recurso === 'attrs') {
                        $name = htmlspecialchars($_POST['attr']);
                        $mysql = $pdo->prepare("INSERT INTO attrs(name) VALUES('$name')");
                        $mysql->execute();
                        
                        echo json_encode([
                            'mensaje' => 'saved'
                        ]);
                    }else{
                        echo json_encode([
                            'mensaje' => '404 resource not found'
                        ]);
                    }
                break;
            }
        }catch(PDOException $ex){
            /**
             * en caso de que no podamos conectarnos
             * a la base de datos por cualquier razon 
             * le tenemos que notificar al usuario
             * enviandole un mensaje
             */
            echo json_encode(['mensaje'=>$ex->getMessage()]);
        }
    }
} else {
    /**
     * En caso de que la expresion regular no
     * se cumpla quiere decir que el usuario
     * ha ingresado una url no valida
     * entonces enviamo un error 404
     */
    echo json_encode([
        'mensaje' => '404 url no valida'
    ]);
}
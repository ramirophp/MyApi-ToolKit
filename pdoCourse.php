<?php
require_once('./ht/Html.php');
require_once('./ht/Tags.php');
require_once './ht/const.php';
doctype();
html([
    head([
        title('MyApi-ToolKit')
    ]),
    body([
        headxr([
            h1('PDO Crash Course Para Principiantes (Basic Level)'),
            h2('Api urls'),
            ul([
                li(a('home',['attrs'=>[
                    'href'=>'./index.php'
                ]])),
                li(a('api v1',['attrs'=>['href'=>'./info.php']]))
            ])
        ]),
        main([
            section([
                div([
                    h2('Que es pdo ? / What is pdo ?'),
                    p('
                        pdo significa PHP Data Objects (extension de php)
                    '),
                    p("
                        lean & consistent way to access the database / $br
                        forma sencilla y coherente de acceder a la base de datos
                    "),
                    p("
                        works with multiple databases / $br
                        trabaja con múltiples bases de datos
                    "),
                    p("
                        data access layer / $br
                        capa de acceso a datos
                    "),
                    p("
                        object oriented /
                        $br
                        orientado a objetos
                    ")
                ]),
                div([
                    h2('Algunos Beneficios de PDO'),
                    p("
                        multiple databases / $br
                        múltiples bases de datos
                    "),
                    p("
                        security Prepared Statements / $br
                        declaraciones preparadas de seguridad
                    "),
                    p("
                        usability / $br
                        usabilidad
                    "),
                    p("
                        Reusability / $br
                        Reutilización
                    "),
                    p("
                        Excellent Error Handling / $br
                        Excelente manejo de errores
                    ")
                ]),
                div([
                    h2('Clases principales de PDO'),
                    ul([
                        li([
                            h3('PDO'),
                            p("
                                Represents a connection between PHP & DB /$br 
                                Representa una conexión entre PHP y DB
                            ")
                        ]),
                        li([
                            h3('PDOStatement'),
                            p("
                                Represents a prepared statement and after excuted an associated result /$br 
                                Representa una declaración preparada y luego de ser ejecutada un resultado asociado
                            ")
                        ]),
                        li([
                            h3('PDOException'),
                            p("
                                Represents Errors raised by PDO /$br 
                                Representa errores generados por PDO
                            ")
                        ])
                    ])
                ]),
                div([
                    h2('Bases de datos soportadas por PDO'),
                    table([
                        thead(tr(th('Suported Databases'))),
                        tbody([
                            tr([
                                td('MySql')
                            ]),
                            tr([
                                td('PostgreSql')
                            ]),
                            tr([
                                td('MS SQL Server')
                            ]),
                            tr([
                                td('Oracle')
                            ]),
                            tr([
                                td('FireBird')
                            ]),
                            tr([
                                td('Sybase')
                            ]),
                            tr([
                                td('IBM')
                            ]),
                            tr([
                                td('Informix')
                            ]),
                            tr([
                                td('SQLite')
                            ]),
                            tr([
                                td('FreeTDS')
                            ]),
                            tr([
                                td('4D')
                            ]),
                            tr([
                                td('Cubrid')
                            ])
                        ]),
                        tfoot(tr(th('piezas.xyz table')))
                    ])
                ]),
                div([
                    h2('Set the DSN'),
                    p("El que!... el dsn o database servise name $br
                        Es la cadena de conexion que incluye los datos $br
                        necesarios para que pdo se conecte a la base de datos
                    "),
                    p("
                        para crear el dsn necesitamos concatenar el driver,$br
                        el nombre del host y nombre de la base de datos
                    "),
                    p([
                        '$dsn = "mysql:host=localhost;dbname=yourDbName";',
                        h2('Crear la Instancia'),
                        "El siguiente paso es crear la instancia de pdo y $br",
                        "pasarle el dsn como primer argumento, el username y el password"
                    ]),
                    p('$pdo = new PDO($dsn,"yourUser","yourPass");'),
                    a('setear..',[
                        'attrs' => [
                            'id' => 'ins',
                            'href' => '#attr'
                        ]
                    ])
                ]),
                div([
                    h2('Consulta simple, Traer todos los registros de una tabla'),
                    p("
                        le pasamos la sentencia sql (query) al metodo query de pdo $br 
                        y guardamos el resultado en una variable de esta forma :
                    "),
                    p("
                        (statement)\$stmt = \$pdo->query('SELECT * FROM table');
                    "),
                    h2('Como mostrar los registros ?'),
                    p("
                        para mostrar los registros tenemos que $br
                        indicarle al metodo fetch (
    
                            El metodo fetch tiene varias opciones las cuales puede
                            consultar accediendo a esta url : ".
                            a('Fetch Options',[
                                'attrs' => [
                                    'href' => 'https://www.php.net/manual/es/pdostatement.fetch.php'
                                ]
                            ])
                            ."
                            
                        ) $br como formatear el resultado y $br 
                        recorrer la lista para ir mostrando cada registro $br 
                        esta tarea de iterar la realizamos con un ciclo while asi :
                    "),
                    pre("
                            en este caso en particular utilizaremos la opcion
                            para arreglos asociativos y haremos uso suponiendo 
                            que tengamos el campo title en la tabla, para 
                            mostrar todos los titulos registrados
    
                            while ( \$row = \$stmt->fetch(PDO::FETCH_ASSOC) ) {
                                echo \$row['title'] . '&lt;br&gt;';
                            }
    
                            tenemos el caso de los objetos y para los objetos
                            la forma de acceder a los valores cambia un poco
                            para obtener un determinado valor de un objeto
                            lo realizamos de la sifuiente manera :
    
                            while ( \$row = \$stmt->fetch(PDO::FETCH_OBJ) ) {
                                echo \$row->title . '&lt;br&gt;';
                            }   
                    ")
                ]),
                div([
                    h2('Como setear un formato por default'),
                    p([
                        "
                        para realizar esta accion justo despues de crear la instancia de pdo $br
                        ",
                        a('aqui',[
                            'attrs' => [
                                'href' => '#ins',
                                'id' => 'attr'
                            ]
                        ]),$br,
                        "Seteamos el atributo fetch de esta forma : $br",
                        '$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);'
                    ])
                ])
            ]),
            section([
                div([
                    h2('PREPARED STATEMENTS'),
                    p([
                        'Para esta parte de pdo tenemos dos metodos principales',
                        br(),
                        'prepare() & execute()'
                    ]),
                    h2('UNSAFE mode'),
                    p('
                        se da el caso que recibimos valores desde un formulario
                        y los guardamos en una variable y tenemos como resultado
                        un query similar a este :
                    '),
                    p([
                        '$sql = "SELECT * FROM table WHERE field = \'$variable\'";',br(),
                        'El problema con lo anterior es que queda expuesta la variable',$br,
                        'a una injeccion de codigo sql'
                    ])
                ]),
                div([
                    h2('Forma segura'),
                    h3('Positional params'),
                    p('
                        positional params se puede utilizar tambien con mysqli 
                        esta forma consiste en lugar de colocar una variable 
                        colocamos el signo ? para indicar que en esa posicion 
                        tendremos un valor , por ejemplo :
                    '),
                    p([
                        '$sql = "SELECT * FROM table WHERE field = ?";',
                        br(),
                        "el siguiente paso es llamar al metodo perpare de pdo
                        y le pasamos la sentencia sql como parametro",
                        br(),
                        '$stmt = $pdo->prepare($sql);',br(),br(),
                        'Despues ejecutamos la sentencia con el metodo execute
                        y le pasamos un arreglo con los valores',br(),br(),
                        '$stmt->execute([
                            $variable
                        ]);'
                    ]),
                    p('
                        Con lo anterior estamos llenando el placeholder ? con el valor
                        de la variable $variable, toma en cuenta que si tienes mas de un valor
                        que quieres colocar debes de ingresar en el array los valores en el 
                        orden correspondiente
                    '),
                    p('finalmente ya podemos obtener todos los registros con fetch de esta manera : '),
                    p('$registros = $stmt->fetchAll(PDO::FETCH_OBJ);'),
                    pre("
                        Otra forma de iterar sobre los registros puede ser con foreach asi :

                        foreach(\$registros as \$registro) {
                            echo \$registro->title . '&lt;br&gt;';
                        }
                    ")
                ]),
                div([
                    h3('Named params'),
                    p("
                        Los parametros nombrados son muy similares 
                        a los parametros posicionales, la unica diferencia 
                        es que en lugar de ? utilizamos :paramName y en 
                        lugar de tener un arreglo indexado en la funcion execute
                        tendremos un arreglo asociativo.
                    "),
                    p([
                        '$sql = "SELECT * FROM table WHERE field = :paramName";',
                        br(),
                        '$stmt = $pdo->prepare($sql);',br(),br(),
                        '$stmt->execute([
                            \':paramName\' => $variable
                        ]);'
                    ]),
                    p('para agregar mas de una variable se utiliza && doble ampersan
                    por ejemplo : '.br().'
                    $sql = "SELECT * FROM table WHERE field = :paramName && other = :otherName";
                    ')
                ]),
                h2('Single Row'),
                p([
                    'Para obtener un solo registro , todo es exactamente igual',
                    br(),
                    'creamos el query igual , le pasamos el query al metodo prepare igual,',
                    br(),
                    'le pasamos el arrelgo al metodo execute igual ',
                    'Lo unico que cambiamos al final en lugar de usar fetchAll()',br(),
                    'utilizamos fetch() sin el All'
                ]),
                h2('Get Row Count'),
                p('Para obtener el numero de resultados lo unico que 
                tenemos que hacer es ejecutar el metodo rowCount() despues
                de utilizar el metodo execute() asi :'),
                p('$rowsCount = $stmt->rowCount();'.$br.', y listo !')
            ]),
            section([
                h2('Insertar datos'),
                p([
                    'Para insertar datos es muy similar',br(),
                    'la sentencia sql es la que cambia',br(),
                    'y para insertar datos no utilizamos fetch o fetchAll',br(),
                    'un ejemplo de insercion de datos seria asi :'
                ]),
                pre("
                    \$sql = 'INSERT INTO table(field1,field2,field3) VALUES(:field1,:field2,:field3)';
                    \$stmt = \$pdo->prepare(\$sql);
                    \$stmt->execute([
                        ':field1' => \$variable1,
                        ':field2' => \$variable2,
                        ':field3' => \$variable3
                    ]);
                "),
                div([
                    h2('Ejemplo de actulizar datos'),
                    pre("
                    \$sql = 'UPDATE table SET field1 = :field1, field2 = :field2 WHERE id = :id';
                    aqui estoy utilizando el id como ejemplo pero puede utilizar cualquier otro campo
                    que identifique de forma unica al registro que quiera actualizar
                    \$stmt = \$pdo->prepare(\$sql);
                    \$stmt->execute([
                        ':field1' => \$variable1,
                        ':field2' => \$variable2,
                        ':id' => \$id
                    ]);
                    ")
                ]),
                div([
                    h2('Ejemplo de eliminacion de un registro'),
                    pre("
                        \$sql = 'DELETE FROM table WHERE id = :id';
                        \$stmt = \$pdo->prepare(\$sql);
                        \$stmt->execute([
                            ':id' => \$id
                        ]);
                    ")
                ])
            ]),
            section([
                h2('Ejemplo de busqueda de registros'),
                pre("
                    supongamos que queremos buscar la palabra post
                    creamos una variable \$search = '%post%';
                    le colocamos signos de porcentaje a ambos lados

                    y creamos el query de esta manera :

                    \$sql = 'SELECT * FROM table WHERE title LIKE ?';
                    hacemos uso de los positional params y en este caso
                    le indicamos que busque un registro donde el titulo
                    contenga ? (palabra que buscamos)

                    \$stmt = \$pdo->prepare(\$sql);
                    \$stmt->execute([\$search]);
                    \$resultado = \$stmt->fetchAll();

                    utilizare formato obj ya que por defaul mas
                    arriba seteamos obj por default

                    foreach(\$resultado as \$row) {
                        echo \$row->title . '&lt;br&gt;';
                    }
                ")
            ]),
            section([
                h2('LIMIT STATEMENT'),
                p("
                    supongamos que tenemos un resultado de una consulta
                    y queremos limitar ese resultado para mostrar n 
                    registros, para hacerlo utilizamos limit asi :
                "),
                pre("
                    por ejemplo volviendo al ejemplo de la busqueda
                    si obtenemos mas de un resultado pero queremos
                    limitarlo a 1 lo hacemos asi : 

                    \$sql = 'SELECT * FROM table WHERE title LIKE ? LIMIT 1';
                    todo lo siguiente es igual
                    \$stmt = \$pdo->prepare(\$sql);
                    \$stmt->execute([\$search]);
                    \$resultado = \$stmt->fetchAll();

                    ahora si queremos que LIMIT sea dinamico
                    podemos utilizar positional params o named params

                    te pondre un ejemplo con positional params
                    pero para que esto funciones tenemos que 
                    setear otro atributo despues de la instanciacion
                    de pdo ".
                    a('aqui',[
                        'attrs' => [
                            'href' => '#ins',
                            'id' => 'attr'
                        ]
                    ])
                    ."
                    \$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                    ya seteado el valor anterior ahora lo siguiente funcionara

                    \$sql = 'SELECT * FROM table WHERE title LIKE ? LIMIT ?';
                    todo lo siguiente es igual
                    \$stmt = \$pdo->prepare(\$sql);
                    \$stmt->execute([\$search,\$limit]);
                    \$resultado = \$stmt->fetchAll();
                ")
            ]),
            section([
                h2('PDOException'),
                pre("
                    Esta clase la utilizamos por lo regular
                    para cachar errores por ejemplo un uso tipico
                    se puede ilustrar de esta forma

                    try {
                        //aqui va todo el codigo 
                        //que hemos aprendido hasta el momento
                    } catch (PDOException \$ex) {
                        echo \$ex->getMessage();
                    }

                    con el metodo getMessage obtenemos el
                    mensaje de error que se haya producido
                    al tratar de ejecutar una conexion
                    con la base de datos por ejemplo.

                ")
            ])
        ]),
        hr(),
        require_once './includes/ftr.php'
    ])
],[
    'js' => false,
    'attrs' => [
        'lang' => 'es'
    ]
]);
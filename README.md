# MyApi-ToolKit- LocalHost - PlayGround

<h2>Todo List :</h2> 

<ul>
    <li>Implementar Leer Un solo Articulo(post) por id DONE</li>
    <li>Implementar Leer Articulos(posts) formato paginacion DONE</li>
    <li>Implementar metodo POST(create) para los articulos(posts) DONE</li>
    <li>Implementar metodo PUT(update) para los articulos(posts) DONE</li>
    <li>Implementar metodo DELETE para los articulos(posts) DONE</li>
    <li>Implementar Leer Categorias DONE</li>
    <li>Implementar Leer una Categoria DONE</li>
    <li>Implementar Leer categorias formato paginacion DONE</li>
    <li>Implementar crear(POST) para las categorias DONE</li>
    <li>Implementar actualizar(PUT) para las categorias DONE</li>
    <li>Implementar borrar(DELETE) para las categorias DONE</li>
    <li>Implementar Leer etiquetas</li>
    <li>Implementar Leer una etiqueta</li>
    <li>Implementar Leer etiquetas formato paginacion</li>
    <li>Implementar crear etiqueta</li>
    <li>Implementar actualizar etiqueta</li>
    <li>Implementar borrar etiqueta</li>
    <li>Implementar Leer atributos</li>
    <li>Implementar Leer un atributo</li>
    <li>Implementar Leer atributos formato paginacion</li>
    <li>Implementar crear atributo</li>
    <li>Implementar actualizar atributo</li>
    <li>Implementar borrar atributo</li>
    <li>Eliminar Archivos Innecesarios</li>
    <li>Modificar los includes de las paginas</li>
    <li>Cambiar la url del metodo get en la clase Html</li>
    <li>Actualizar La pagina info.php</li>
</ul>

<hr>

<h2>El atributo on y, Modos de elementos</h2>

<p>
El atributo on , lo que hace es cambiar<br>
la forma en que se crean los elementos html<br>
Tenemos tres modos de crear elementos :
</p>

<ol>
    <li>No restrictivo - (core)</li>
    <li>Restrictivo - (core)</li>
    <li>Especifico - (layer)</li>
</ol>

<h2>No Restrictivo</h2>

<p>
Cuando utilizamos la clase Html<br>
para crear tags , si el parametro on<br>
en el constructor es false, esto quiere decir<br>
que el input no sera comparado con una lista <br>
de posibles inputs preestablecidos.
</p>

<h2>Restrictivo</h2>

<p>
Cuando utilizamos la clase Html<br>
para crear tags , si el parametro on<br>
en el constructor es true, esto quiere decir<br>
que el input si sera comparado con una lista <br>
de posibles inputs preestablecidos.<br>
Por lo tanto si ingresamos una etiqueta que<br>
no se encuentre en la lista sera considerada<br>
como una etiqueta no valida y es esa la razon de <br>
porque se considera esta forma restrictiva
</p>

<h2>Especifico</h2>

<p>
El modo especifico si bien puede o no <br>
obtener la lista de etiquetas de una api,<br>
al final del dia esto no tiene mucha importancia<br>
ya que el modo especifico representa un elemento<br>
de una lista de elementos validos , lo cual <br>
al aplicar esta capa en caso de que el input<br>
no se verifique con una lista , tenemos la certeza<br>
de que exista o no una lista , el elemento que se <br>
creara es si o si valido.
</p>

<hr>

<h1>ETIQUETAS HTML COMO FUNCIONES EN PHP (html tags as php functions)</h1>

<h2>Prototipos</h2>

<ol>
    <li>functionName (string|array $in, array $set);</li>
    <li>functionName (array $set);</li>
    <li>functionName ();</li>
</ol>

<h2>Funciones sin argumentos</h2>

<ol>
    <li>doctype();</li>
    <li>hr();</li>
    <li>br();</li>
</ol>

<h2>Funciones auto imprimibles</h2>

<ol>
    <li>doctype();</li>
    <li>html();</li>
</ol>

<h2>Argumentos por funcion<br>

<h3>html(arg $int,arg $set),
head(arg $int),
body(arg $int,arg $set), 
etc.</h3>

<br> del tipo apertura y cierre</h2>

<ol>
    <li>$in string|array</li>
    <li>$set array asociativo</li>
</ol>

<h3>Estructura de $in</h3>

<pre>
$in puede ser $in = ""; o $in = '';
o tambien $in = ['',"",['etc...']];
solo dos niveles de arrays asi :
[['string'],'string',['string']]
tres niveles ya no sera procesado por ejemplo:
['string',['string',['array']]]
el tercer array se mostrara como Array
</pre>

<h3>Estructura de $set</h3>

<pre>
$set = [
    'js' => false,
    'attrs' => [
        'key' => 'value'
    ]
];
</pre>

<h3>$set Para etiquetas self closing</h3>

<pre>
$set = [
    'key' => 'value'
];
</pre>

<hr>

<h2>V1.2 en adelante</h2>

<pre>
en esta version con excepcion del body
la estructura de $set ya no sera asi :
$set = [
    'attrs' => [
        'key' => 'value'
    ],
    'js' => false
];
ahora simplemente sera :
$set = [
    'key' => 'value'
];
</pre>

<p>
Tambien el ajuste_1() es solo para el body<br>
en el caso de las otras etiquetas el mismo <br>
compilador de php le indicara cuando coloque<br>
los argumentos en el lugar incorrecto y de igual<br>
forma para mantener vacia la etiqueta y agregarle<br>
atributos inicialice a null el primer argumento
</p>

<hr>

<h2>V1.4</h2>

<p>
Incluye la version offline CajaDeHerramientas para crear sus propias tags<br>
sin depender de una api o base de datos para obtener las tags y attrs
</p>

<p>
Si prefiere no estar limitado por una lista<br>
predefinida de etiquetas , y no quiere<br>
depender de una api o conexion a internet,<br>
ademas quiere utilizar funciones dedicadas <br>
a js , css y, mysql utilice seh (sistema_de_etiquetas_html)
</p>

<hr>

<h2>V1.4.1 Main function - Estructura basica de una pagina</h2>

<pre>
html([
    'head' => [],    ---------> head content
    'body' => [      ---------> body content
        div(),       
        script()     
    ]
],[
    'html' => [],   ----------> html tag attributes
    'body' => [],   ----------> body tag attributes
    'js' => false,  ----------> switch for javascript
    'on' => false   ----------> online api connection switch
]);
</pre>

<h2>Prototipo para las etiquetas</h2>

<p>
tagName ($in = null,array $set = [],$on = false);
</p>

<hr>

<h2>Constante $br / salto de linea en texto br()</h2>

<p>
En ocaciones necesitara escribir saltos 
de linea dentro de parrafos y, hay varias
formas en las que puede formatear sus parrafos
</p>

<p>
Recuerde que $in puede ser un 
arreglo , entonces las siguientes formas 
de formatear un parrafo son validas
</p>

<ol>
    <li>
        <pre>
            p('
                texto texto'.br().'
                salto de linea texto texto
            '
            );
        </pre>
    </li>
    <li>
        <pre>
            p([
                'texto texto texto',
                br(),
                'salto de linea texto texto'
            ]);
        </pre>
    </li>
    <li>
        <pre>
            p("
                texto texto $br salto de linea texto texto
            ");
        </pre>
    </li>
</ol>

<hr>

<h2>LICENSE</h2>

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
    <img alt="Creative Commons License" 
    style="border-width:0" 
    src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" />
</a>
<br />
This work is licensed under a 
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
    Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License
</a>
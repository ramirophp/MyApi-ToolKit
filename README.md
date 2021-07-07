# MyApi-ToolKit

<h1>ETIQUETAS HTML COMO FUNCIONES EN PHP (html tags as php functions)</h1>

<h2>Argumentos por funcion del tipo apertura y cierre</h2>

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

<h2>Funciones auto imprimibles</h2>

<ol>
    <li>doctype();</li>
    <li>html();</li>
</ol>

<h2>Funciones sin argumentos</h2>

<ol>
    <li>doctype();</li>
    <li>hr();</li>
    <li>br();</li>
</ol>

<h2>Prototipos</h2>

<ol>
    <li>functionName (string|array $in, array $set);</li>
    <li>functionName (array $set);</li>
    <li>functionName ();</li>
</ol>

<hr>

<h2>Api urls</h2>

<h3>Lista de etiquetas e informacion adicional
Dividida Por paginas (page 1-n)</h3>

<h4>http://localhost/api/v1.php/tags/1</h4>

<h3>Lista de Atributos e informacion adicional
Dividida Por paginas (page 1-n)</h3>

<h4>http://localhost/api/v1.php/attrs/1</h4>

<h3>Lista de etiquetas</h3>

<h4>http://localhost/api/v1.php/tag</h4>

<h3>Obtener una etiqueta por id (1-n)</h3>

<h4>http://localhost/api/v1.php/tag/1</h4>

<h3>Lista de atributos</h3>

<h4>http://localhost/api/v1.php/attr</h4>

<h3>Obtener un atributo por id (1-n)</h3>

<h4>http://localhost/api/v1.php/attr/1</h4>

<hr>

<h2>V1.2</h2>

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
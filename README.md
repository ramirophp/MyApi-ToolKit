# MyApi-ToolKit- LocalHost - PlayGround

<h2>Prototipo para las etiquetas</h2>

<p>
tagName ($in = null,array $set = [],$on = true); -----> Open & Close tag type<br>
tagName (array $set = [],$on = true); -----> Self Closing tag type
</p>

<br>Parametros</h2>

<ol>
    <li>$in string|array</li>
    <li>$set array asociativo</li>
</ol>

<h3>Valores aceptados para $in</h3>

<pre>
$in puede ser $in = ""; o $in = '';
o tambien $in = ['',"",['etc...']];
solo dos niveles de arrays asi :
[['string'],'string',['string']]
tres niveles ya no sera procesado por ejemplo:
['string',['string',['array']]]
el tercer array se mostrara como Array
</pre>

<hr>

<h2>^V1.4.1 Main function - Estructura basica de una pagina</h2>

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
    'js' => true,  ----------> switch for javascript
    'on' => true   ----------> online api connection switch
],[
    'make' => false, -----> deploy option , change to true for make the html file
    'file' => 'path' -----> set the path and name where you want to place your html file
]);

el parametro deploy fue pensado para crear el archivo .html necesario
para cuando estemos trabajando con extensiones para google chrome
por ejemplo, pero en caso de necesitar el source code en formato html u otro
entonces esta opcion te sera muy util.

revisa la ruta Etiquetas/Piezas/Extension
para tener una idea de para que te prodria servir
este argumento y tambien checa el archivo Paginas/Extension.php
para que vea un ejemplo del uso de esta opcion de la funcion html();
</pre>

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

<p>
Pero tome en cuenta que se recomienda siempre<br>
tener en on la conexion para que se asegure que<br>
los atributos que ingrese se validen.
</p>

<hr>

<p>
v1.4.2-js incluye un juego basico de blackjack<br>
en el cual los valores que representan las cartas<br>
que no son numericas son los siguientes :<br>
a = 1, j = 11, q = 12 , k = 13 <br>
entonces cuando obtengamos un 1 lo convertiremos a 11<br>
y cuando obtengamos 11,12 o 13 lo convertiremos a 10<br>
si quiere elegir entre 1 y 11 cuando obtenga un A <br>
tendra que programar esa funcionalidad usted mismo(a)
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
# MyApi-ToolKit

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

<hr>

<h1>Test</h1>

<p>
Iniciamos colocando la etiqueta html();<br>
esta etiqueta es el contenedor principal de toda la pagina<br>
se auto imprime. y de inicio no recibimos ningun error.
</p>
<p>
Esta funcion recibe dos parametros $in y $set<br>
$in puede ser un string o un arreglo, este argumento<br>
lo utilizamos para definir lo que estara entre la etiqueta<br>
de apertura y la etiqueta de cierre de algun elemento html<br>
</p>
<p>
$set es un arreglo asociativo que tiene esta estructura :<br>
</p>
<pre>
$set = [
    'js' => false,
    'attrs' => [
        'key' => 'value',
        'key2' => 'value2'
    ]
]
</pre>
<p>
es opcional igual que $in y nos sirve para <br>
definir los atributos de las etiquetas y activar <br>
o desactivar el uso de javascript <br>
</p>
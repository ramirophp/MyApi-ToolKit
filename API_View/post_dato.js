var formulario = document.querySelector('form');
var result = document.querySelector('#result');

function addDato(e,recurso) {
    
    e.preventDefault();

    var peticion = new XMLHttpRequest();
    peticion.open('POST',`http://localhost/API_Paginacion/routerSrvPg.php/${recurso}`);

    var nombre = '';
    var tipoRc = '';

    if(recurso === 'tags') {
        nombre = formulario.tag.value.trim();
        tipoRc = 'tag';
    }else if(recurso === 'attrs') {
        nombre = formulario.attr.value.trim();
        tipoRc = 'attr';
    }

    if(nombre == '') {
        result.innerHTML = "<p>error : Empty text box</p>";
    }else{
        var args = tipoRc+'='+nombre;
        peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        peticion.onload = function() {
            var response = JSON.parse(peticion.responseText);
            console.log(response);
            result.innerHTML = response.mensaje;
        }
        peticion.send(args);
    }
 
}

formulario.addEventListener('submit', function(e){
    addDato(e,recurso);
});
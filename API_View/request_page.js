function request_page (recurso,page) {

    /**
     * Estas son las variables 
     * que necesitamos para almacenar
     * todos los componentes
     * de la vista de la paginacion
     */
    var datos;
    var resultBox = document.getElementById('resultBox');
    var pagControls = document.getElementById('pagControls');
    var loader = document.getElementById('loader');
    var pagCtrls = '';

    /**
     * activo el loader antes de cargar
     * los datos en pantalla
     */
    loader.classList.add('active');

    /**
     * el siguiente paso es 
     * crear el objeto que nos ayuda 
     * con las peticiones al servidor
     */
    var peticion = new XMLHttpRequest();
    //preparo la peticion
    peticion.open('GET',`http://localhost/API_Paginacion/routerSrvPg.php/${recurso}/${page}`);

    //en el metodo load recibo los datos y construyo la vista
    peticion.onload = function() {
        
        //convierto a json la respuesta
        datos = JSON.parse(peticion.responseText);
        console.log(datos);
        console.log(datos.paginas);
        //PAGINACION CONTROLS
            pagCtrls = '<div class="btnContainer">';
            if (page > 1) {
                pagCtrls += `<button onclick="request_page('${recurso}',${(page-1)})">\<</button>`;
            }
            if (page < datos.paginas) {
                pagCtrls += `<button onclick="request_page('${recurso}',${(page+1)})">\></button>`;
            }
            pagCtrls += '</div>';
            pagCtrls += "<div class='pgCtrl'><b>page "+page+" - of - "+datos.paginas+"</b></div>";
            pagControls.innerHTML = pagCtrls;
            
        /////////////////////

        //pregunto el tipo de recurso que estoy solicitando
        if(recurso === 'tags') {
            resultBox.innerHTML = '<div class="header"><div class="hdrItem">ID</div><div class="hdrItem">|</div><div class="hdrItem">TAG</div></div>';
        }else{
            resultBox.innerHTML = '<div class="header"><div class="hdrItem">ID</div><div class="hdrItem">|</div><div class="hdrItem">ATTR</div></div>';
        }
        
        for(var i = 0; i < datos.registros.length; i++){
            resultBox.innerHTML += '<div class="header"><div class="hdrItem">' + datos.registros[i]['id'] + '</div><div class="hdrItem">|</div><div class="hdrItem">' + datos.registros[i]['name'] + '</div></div>';
        }
        
    }

    peticion.onreadystatechange = function() {
        if(peticion.readyState == 4 && peticion.status == 200) {
            loader.classList.remove('active');
        }
    }

    //envio la peticion
    peticion.send();
}
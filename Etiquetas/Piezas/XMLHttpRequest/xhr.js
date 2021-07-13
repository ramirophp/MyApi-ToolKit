const getBtn = document.getElementById('get-btn');
const postBtn = document.getElementById('post-btn');

const sendHttpRequest = (method, url, data) => {

    //Promesa
    const promise = new Promise((resolve, reject) => {

        const xhr = new XMLHttpRequest();

        xhr.open(method, url);

        xhr.responseType = 'json';

        if (data) {
            //agrego el header extra para que funcione la peticion post
            xhr.setRequestHeader('Content-Type', 'application/json');
        }

        xhr.onload = () => {
            //no todos los navegadores soportan este metodo

            /*para evitar el JSON.parse
            podemos utilizar xhr.responseType = 'json';
            /*y la respuesta xhr.response nos retornara un json*/

            //const data = JSON.parse(xhr.response);

            //console.log(data);

            resolve(xhr.response);

        }

        //Asi manejamos errores con XMLHttpRequest y promesa
        xhr.onerror = () => {

            if(xhr.status >= 400) {
                reject('Algo salio mal!');
            } else {

                resolve(xhr.response);

            }

        }

        xhr.send(JSON.stringify(data));

    });

    return promise;

}

const getData = () => {

    sendHttpRequest('GET', 'https://reqres.in/api/users').then(responseData => {

        console.log(responseData);

    });

}

const sendData = () => {

    sendHttpRequest('POST', 'https://reqres.in/api/register', {
        email: 'eve.holt@reqres.in',
        password: 'pistol'
    }).then(responseData => {

        console.log(responseData);

    }).catch(err => {

        console.log(err);

    });

}

getBtn.addEventListener('click', getData);
postBtn.addEventListener('click', sendData);
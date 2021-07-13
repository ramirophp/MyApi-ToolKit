const getBtnFetch = document.getElementById('get-btn-fetch');
const postBtnFetch = document.getElementById('post-btn-fetch');

const enviarHttpRequest = (method, url , data) => {

    return fetch(url,{
        method: method,
        body: JSON.stringify(data),
        headers: data ? {'Content-Type':'application/json'} : {}
    }).then(response => {

        if(response.status >= 400) {
            return response.json().then(errResData => {

                const error = new Error('algo salio mal !');
                error.data = errResData;
                throw error;

            });
        }
        return response.json();

    });

}

const getDataFetch = () => {
    
    //fetch usa promesas por default, no tengo que crear un wrapper con con xmlhttprequest
    enviarHttpRequest('GET','https://reqres.in/api/users').then(responseData => {

        console.log(responseData);

    });

}

const sendDataFetch = () => {

    enviarHttpRequest('POST','https://reqres.in/api/register',{
        email: 'eve.holt@reqres.in',
        //password: 'pistol'
    })
    .then(responseData => {

        console.log(responseData);

    })
    .catch(err => {

        console.log(err, err.data);

    });

}

getBtnFetch.addEventListener('click', getDataFetch);
postBtnFetch.addEventListener('click', sendDataFetch);
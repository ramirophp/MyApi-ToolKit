const getBtnAxios = document.getElementById('get-btn-axios');
const postBtnAxios = document.getElementById('post-btn-axios');

const getDataAxios = () => {
    axios.get('https://reqres.in/api/users').then(response => {
        console.log(response);
    });
}

const sendDataAxios = () => {
    axios.post('https://reqres.in/api/register',{
        email: 'eve.holt@reqres.in',
        //password: 'pistol'
    }).then(response => {
        console.log(response);
    }).catch(err => {

        console.log(err, err.response);

    });
}

getBtnAxios.addEventListener('click', getDataAxios);
postBtnAxios.addEventListener('click', sendDataAxios);
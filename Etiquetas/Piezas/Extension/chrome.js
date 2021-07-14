let myLeads = [];

const inputEl = document.querySelector('#input-el');

const inputBtn = document.querySelector('#input-btn');

const ulEl = document.querySelector('#ul-el');

function renderLeads () {

    let listItems = '';

    for(let i = 0; i < myLeads.length; i++) {

        listItems += `
        <li>
            <a target="_blank" href="https://${myLeads[i]}">
                ${myLeads[i]}
            </a>
        </li>`;

    }

    ulEl.innerHTML = listItems;

}

function saveLead () {

    myLeads.push(inputEl.value);

    renderLeads();

}

inputBtn.addEventListener('click', saveLead);
let cards = [];

let sum = 0;

let hasBlackjack = false;

let isAlive = false;

let message = '';

let messageEl = document.getElementById('message-el');

let sumEl = document.querySelector('#sum-el');

let cardsEl = document.querySelector('#cards-el');

let player = {
    name: "player",
    chips: "&infin;"
}

let playerEl = document.querySelector('#player-el');

playerEl.innerHTML = `${player.name} : $ ${player.chips}`;

function getCard () {

    let number = Math.floor(Math.random() * 13) + 1;

    if(number === 1) {
        return 11;
    }else if(number > 10){
        return 10;
    } else {
        return number;
    }

}

function startGame () {

    isAlive = true;

    let firstCard = getCard();

    let secondCard = getCard();

    cards = [firstCard,secondCard];

    sum = firstCard + secondCard;

    renderGame();

}

function renderGame () {

    cardsEl.textContent = "Cards : ";

    for(let i = 0; i < cards.length; i++) {

        cardsEl.textContent += cards[i] + ' ';

    }

    sumEl.textContent = 'Sum : ' + sum;

    if ( sum <= 20 ) {

        message = '+ new card ?';
    
    } else if ( sum === 21 ) {
    
        message = 'You Got BlackJack !!!';
    
        hasBlackjack = true;
    
    } else {
    
        message = 'You are out of the game :(';
    
        isAlive = false;
    
    }
    
    messageEl.textContent = message;

}
 
function newCard () {

    if (isAlive === true && hasBlackjack === false) {

        let newCard = getCard();

        sum += newCard;

        cards.push(newCard);

        renderGame();

    }

}
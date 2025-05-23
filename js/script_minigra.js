var board = document.getElementById("board");
var score = 0;
var wynik = document.getElementById("wynik");
var timer = document.getElementById("timer");
var czas = 30;
var tablicaelem = {};
var zdj = '../img/szyszka.png';
var blank = '../img/blank.png';
var lilija = '../img/lilija.png';
let on = true;
let can = true;
var btn = document.getElementById("startbtn")
var againbtn = document.getElementById("againbtn");

function start(){
    timer.textContent = "czas: " + czas

    var x = setInterval(function() {
        if(on){
        timer.textContent = "czas: " + (czas-1)
        czas--
        }
    }, 1000);

    againbtn.style.display = "none";

btn.remove();

for (let i = 1; i < 5; i++) {
    var row = document.createElement('div');
    row.className = 'row row-2 justify-content-center';
    board.appendChild(row);
    for (let a = 1; a < 5; a++) {
        var block = document.createElement('div');
        block.id = (i - 1) * 4 + a;
        block.className = 'col col-1 border border-3 border-warning-subtle rounded-3 p-2 game-width'; //Fix - Adaptacja szerokości do erkanu
        row.appendChild(block);
        var img = document.createElement('img');
        img.src = blank;
        img.className = 'col col-12';
        img.ondragstart = function() { return false}; //Fix przeciagania zdjecia
        img.style = '-moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; user-select: none; -moz-user-drag: none; -khtml-user-drag: none; -webkit-user-drag: none; user-drag: none;';
        block.appendChild(img);
        block.style = '-moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; user-select: none; -moz-user-drag: none; -khtml-user-drag: none; -webkit-user-drag: none; user-drag: none; background-color: #F2F6D0;';
        tablicaelem[block.id] = document.getElementById(block.id);
    }
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function klik(bloczek) {
    score++;
    wynik.textContent = "Wynik: " + score;
    bloczek.firstChild.src = blank;
    can = true;
    rand();
}

function klikLil(bloczek) {
    score+=2;
    wynik.textContent = "Wynik: " + score;
    bloczek.firstChild.src = blank;
    can = true;
    rand();
}

function rand() {
    if (can && on) {
        let czyLil = randomIntFromInterval(1, 100);

        if(czyLil >=30){

        let randomowa = randomIntFromInterval(1, 16);
        let bloczek = document.getElementById(randomowa);
        bloczek.firstChild.src = zdj;
        can = false;

        const clickHandler = function() {
            klik(bloczek);
        };

        bloczek.addEventListener('click', clickHandler, { once: true });
        bloczek.clickHandler = clickHandler;

        }else if(czyLil <30){

        let randomowa = randomIntFromInterval(1, 16);
        let bloczek = document.getElementById(randomowa);
        bloczek.firstChild.src = lilija;
        can = false;

        const clickHandler = function() {
            klikLil(bloczek);
        };

        bloczek.addEventListener('click', clickHandler, { once: true });
        bloczek.clickHandler = clickHandler;

        }
    }
}

window.setTimeout(function time() {
    // for (let a = 1; a <= 16; a++) {
    //     var block = document.getElementById(a);
    //     if (block.clickHandler) {
    //         block.firstChild.src = blank;
    //         block.removeEventListener('click', block.clickHandler);
    //         delete block.clickHandler;
    //     }
    // }
    for (let a = 1; a <= 16; a++) {
        var block = document.getElementById(a);
        block.remove()
    }
    var board = document.createElement('div');
    board.className = 'row row-10 justify-content-center';
    board.id = 'board';
    document.getElementById('cont').appendChild(board)
    board.textContent = 'Udało ci się zakończyć grę z wynikiem: ' + score;

    // const orm = require('orm'); 
    // const db = orm.connect('mysql://localhost/dbName');  
    // db.query('SELECT id, name FROM user WHERE age = 25', (err, rows) => {   if (err) throw err;   console.log(rows); }).end(); 
    
    fetch('../php/add_points.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `score=${encodeURIComponent(score)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Odpowiedź od PHP
    })

    on = false;

    againbtn.style.display = "inherit";
    againbtn.onclick = function(){
        clearInterval(x);
        board.remove();
        czas = 30;
        score = 0;
        on = true;
        can = true;
        start();
    };
}, 30000);

rand();


}

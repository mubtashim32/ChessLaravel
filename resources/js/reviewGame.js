let idx = -1;
let moves = [];
for (let i in movesJSON) {
    moves.push(movesJSON[i]);
}
console.log(moves);
function performMove(x1, y1, x2, y2) {
    let square1 = document.getElementById("board" + x1 + y1);
    let square2 = document.getElementById("board" + x2 + y2);

    let images1 = square1.getElementsByTagName('img');
    let image1 = images1[0];
    while(square2.firstChild) {
        square2.removeChild(square2.firstChild);
    }
    square2.appendChild(image1);
}
var modal = document.getElementById('modal');
var modalBg = document.getElementById('modalBg');

function performMoveIdx(inc) {
    if (inc) {
        idx++;
        if (idx >= moves.length) {
            modal.style.visibility = 'visible';
            modalBg.style.visibility = 'visible';
            modal.style.animation = 'ani 2s';
            modalBg.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        }
        let move = moves[idx];
        let x1 = move['x1'], y1 = move['y1'], x2 = move['x2'], y2 = move['y2'];
        console.log(x1 + " " + y1 + " " + x2 + " " + y2);
        performMove(x1, y1, x2, y2);
    } else {
        let move = moves[idx];
        let x1 = move['x1'], y1 = move['y1'], x2 = move['x2'], y2 = move['y2'];
        console.log(x1 + " " + y1 + " " + x2 + " " + y2);
        performMove(x2, y2, x1, y1);
        idx--;
    }
    if (idx % 2 == 0) p1(); else p2();
}

document.onkeydown = checkKey;
function checkKey(e) {
    console.log(e.key);
    if (e.key == 'ArrowRight') {
        performMoveIdx(true);
    }
    else if (e.key == 'ArrowLeft') {
        performMoveIdx(false);
    }
}

function p1() {
    player1.style.backgroundColor = '#004D40';
    player2.style.backgroundColor = 'white';

    player1.style.color = 'white';
    player2.style.color = 'black';
}
function p2() {
    player2.style.backgroundColor = '#004D40';
    player1.style.backgroundColor = 'white';

    player2.style.color = 'white';
    player1.style.color = 'black';
}

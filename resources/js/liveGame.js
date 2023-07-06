import './bootstrap';
const channel = Echo.channel(window.channelName);
const verdictChannel = Echo.channel(window.channelName);
let cnt = 0;
channel.subscribed(() => {
    let moves = [];
    for (let i in movesJSON) {
        moves.push(movesJSON[i]);
    }

    for (let i = 0; i < moves.length; ++i) {
        let move = moves[i];
        let x1 = move['x1'], y1 = move['y1'], x2 = move['x2'], y2 = move['y2'];
        console.log(x1 + " " + y1 + " " + x2 + " " + y2);
        performMove(x1, y1, x2, y2);
    }
}).listen('.livex', (response) => {
    let move = response['move'];
    let x1 = move['x1'], y1 = move['y1'], x2 = move['x2'], y2 = move['y2'], color = move['color'];
    performMove(x1, y1, x2, y2);
});
var modal = document.getElementById('modal');
var modalBg = document.getElementById('modalBg');

var heading = document.getElementById('heading');
var username1 = document.getElementById('username1');
var username2 = document.getElementById('username2');
var result = document.getElementById('result');
var delta = document.getElementById('delta');
verdictChannel.subscribed(() => {
}).listen('.over', (response) => {
    console.log(window.color);
    var gameR, player1R, player2R;
    axios.post('/gameOver', {
        id: window.id
    })
    .then(function (response) {
        console.log(response);
        gameR = response.data.game;
        player1R = response.data.player1;
        player2R = response.data.player2;
        username1.innerHTML = player1R.username;
        username2.innerHTML = player2R.username;

        var prevRating1 = player1R.rating, prevRating2 = player2R.rating;
        var r1 = Math.pow(10, prevRating1 / 400), r2 = Math.pow(10, prevRating2 / 400);
        var e1 = r1 / (r1 + r2), e2 = r2 / (r1 + r2);
        var s1, s2;
        if (gameR.winner == 1) {
            heading.innerHTML = "Black Won";
            result.innerHTML = "0-1";
            s1 = 0, s2 = 1;
        } else {
            heading.innerHTML = "White Won";
            result.innerHTML = "1-0";
            s1 = 1, s2 = 0;
        }
        var del1 = 32 * (s1 - e1), del2 = 32 * (s2 - e2);
        del1 = parseInt(del1), del2 = parseInt(del2);
        delta.innerHTML = del1;
        modal.style.visibility = 'visible';
        modalBg.style.visibility = 'visible';
        modal.style.animation = 'ani 2s';
        modalBg.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
    })
    .catch(function (error) {
        console.log(error);
    });
});
let player1 = document.getElementById('player1');
let player2 = document.getElementById('player2');
function performMove(x1, y1, x2, y2) {
    let square1 = document.getElementById("board" + x1 + y1);
    let square2 = document.getElementById("board" + x2 + y2);

    let images1 = square1.getElementsByTagName('img');
    let image1 = images1[0];
    while(square2.firstChild) {
        square2.removeChild(square2.firstChild);
    }
    square2.appendChild(image1);

    if (cnt % 2 == 0) p1(); else p2();
    ++cnt;
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

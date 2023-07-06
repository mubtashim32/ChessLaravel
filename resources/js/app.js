import './bootstrap';

const channel = Echo.channel(window.channelName);
const verdictChannel = Echo.channel(window.channelName);
const startChannel = Echo.channel(window.channelName);

let moveShown = false;
let currentColor = 0;
let highlighedX, highlighedY;
let curX, curY;

let getIdFromColor = new Map();
getIdFromColor.set("x", -1);
getIdFromColor.set("white", 0);
getIdFromColor.set("black", 1);

let getIdFromPiece = new Map();
getIdFromPiece.set("x", -1);
getIdFromPiece.set("pawn", 0);
getIdFromPiece.set("knight", 1);
getIdFromPiece.set("bishop", 2);
getIdFromPiece.set("rook", 3);
getIdFromPiece.set("queen", 4);
getIdFromPiece.set("king", 5);

let getColorFromId = new Map();
getColorFromId.set(-1, "x");
getColorFromId.set(0, "white");
getColorFromId.set(1, "black");

let getPieceFromId = new Map();
getPieceFromId.set(-1, "x");
getPieceFromId.set(0, "pawn");
getPieceFromId.set(1, "knight");
getPieceFromId.set(2, "bishop");
getPieceFromId.set(3, "rook");
getPieceFromId.set(4, "queen");
getPieceFromId.set(5, "king");
let final = false;
var status = document.getElementById('status');


// modal
var modal = document.getElementById('modal');
var modalBg = document.getElementById('modalBg');

var heading = document.getElementById('heading');
var player1 = document.getElementById('username1');
var player2 = document.getElementById('username2');
var result = document.getElementById('result');
var rating = document.getElementById('rating');
var delta = document.getElementById('delta');

var pic1 = document.getElementById('p1');
var pic2 = document.getElementById('p2');

var u2 = document.getElementById('u2Box');
var r2 = document.getElementById('r2Box');
var p2 = document.getElementById('p2Box');

if (window.color == 1) p2.style.visibility = 'visible';

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
        player1.innerHTML = player1R.username;
        player2.innerHTML = player2R.username;

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
        var newRating1 = prevRating1 + del1, newRating2 = prevRating2 + del2;
        if (window.color == gameR.winner) {
            console.log("I am the winner");
            axios.post('/updateRating', {
                id: window.channelName,
                id1: player1R.id,
                id2: player2R.id,
                winner: gameR.winner,
                rating1: newRating1,
                rating2: newRating2,
                cnt: cnt
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        else {
            console.log("I am a losser");
        }
        var rat, del;
        if (window.color == 0) {
            rat = newRating1, del = del1;
        } else {
            rat = newRating2, del = del2;
        }
        if (del >= 0) del = '+' + del;
        rating.innerHTML = rat;
        delta.innerHTML = del;
        modal.style.visibility = 'visible';
        modalBg.style.visibility = 'visible';
        modal.style.animation = 'ani 2s';
        modalBg.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
    })
    .catch(function (error) {
        console.log(error);
    });
});
channel.subscribed(() => {
}).listen('.livex', (response) => {
    console.log(window.color);
    var move = response['move'];
    var x1 = move['x1'], y1 = move['y1'], x2 = move['x2'], y2 = move['y2'], color = move['color'];
    const divElement = document.getElementById("board" + x1 + y1);
    const imageElements = divElement.getElementsByTagName('img');
    const sourceImage = imageElements[0];
    const destinationDiv = document.getElementById("board" + x2 + y2);
    while (destinationDiv.firstChild) {
        destinationDiv.removeChild(destinationDiv.firstChild);
    }
    destinationDiv.appendChild(sourceImage);
    pieceAtPosition[x1][y1].x = x2, pieceAtPosition[x1][y1].y = y2;
    pieceAtPosition[x2][y2] = pieceAtPosition[x1][y1];
    pieceAtPosition[x2][y2].moved = true;
    pieceAtPosition[x1][y1] = new Piece(-1, -1, -1, x1, y1);

    document.getElementById("board" + x1 + y1).innerHTML = '';
    // king trapped?
    let tempColor = currentColor;
    currentColor = window.color;
    var good = true;
    for (let i = 0; i < 8 && good; ++i) {
        for (let j = 0; j < 8 && good; ++j) {
            if (pieceAtPosition[i][j].color == currentColor) {
                highlighedX = i, highlighedY = j;
                generateMoves(pieceAtPosition[i][j]);
            }
        }
    }
    currentColor = tempColor;
    console.log(nextCoordinates.length);
    ++cnt;
    if (cnt % 2 == 0) xx1(); else xx2();
    if (nextCoordinates.length == 0) {
        console.log("Hello");
        let winner = 1 - window.color;
        let id = window.id;
        axios.post('/play/start/over', {
            winner: winner,
            id: id,
            cnt: cnt,
        })
            .then(function (response) {
            })
            .catch(function (error) {
            });
    } else {
        nextCoordinates = [];
    }
    // king trapped?
    currentColor = 1 - currentColor;
    // ++cnt;
    // if (cnt % 2 == 0) xx1(); else xx2();
});
startChannel.subscribed(() => {
    console.log("Started");
}).listen('.start', (response) => {
    console.log(response);
    if (window.color == 0) {
        u2.innerHTML = response['username'];
        r2.innerHTML = "(" + response['rating'] + ")";
        p2.style.visibility = 'visible';
    }
});
let x1 = document.getElementById('player1');
let x2 = document.getElementById('player2');
let cnt = 0;
xx1();
function xx1() {
    x1.style.backgroundColor = '#004D40';
    x2.style.backgroundColor = 'white';

    x1.style.color = 'white';
    x2.style.color = 'black';
}
function xx2() {
    x2.style.backgroundColor = '#004D40';
    x1.style.backgroundColor = 'white';

    x2.style.color = 'white';
    x1.style.color = 'black';
}
window.hide = function() {
    modal.style.visibility = 'hidden';
    modalBg.style.visibility = 'hidden';
}
class Coordinates {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
}
let nextCoordinates = [];

window.getSquareColor = function (x, y) {
    if ((x+y) % 2 == 0) return "#F7F769";
    else return "#BBCB2B";
}
window.showMoves2 = function () {
    for (let i = 0; i < nextCoordinates.length; ++i) {
        let x = nextCoordinates[i].x, y = nextCoordinates[i].y;
        if ((x+y) % 2 == 0) document.getElementById("board" + x + y).setAttribute("style", "background-color: #D6D6BD; height: 3vh; width: 3vh; margin: 3vh; border-radius: 50%;");
        else document.getElementById("board" + x + y).setAttribute("style", "background-color: #6A874D; height: 3vh; width: 3vh; margin: 3vh; border-radius: 50%;");
    }
}
window.checkBound = function (coordinates) {
    return coordinates.x >= 0 && coordinates.x < 8 && coordinates.y >= 0 && coordinates.y < 8;

}
window.checkEmptyPiece = function (coordinates) {
    return pieceAtPosition[coordinates.x][coordinates.y].color == -1;

}
window.checkSamePiece = function (coordinates, currentColor) {
    return pieceAtPosition[coordinates.x][coordinates.y].color == currentColor;

}
window.checkOppositePiece = function (coordinates, currentColor) {
    return pieceAtPosition[coordinates.x][coordinates.y].color == !currentColor;

}

window.performMove = function (x1, y1, x2, y2, online) {
    if (!online) {
        var data = {game: window.channelName, x1: x1, y1: y1, x2: x2, y2: y2, color: (currentColor ? 1 : 0)};
        axios.post('/up', {
            move: data,
        })
            .then(function (response) {
            })
            .catch(function (error) {
            });
    }

}
window.reset = function (x1, y1) {
    moveShown = false;
    for (let i = 0; i < nextCoordinates.length; ++i) {
        let x = nextCoordinates[i].x, y = nextCoordinates[i].y;
        document.getElementById("board" + x + y).removeAttribute("style");
    }
    nextCoordinates = [];
    document.getElementById("board" + x1 + y1).removeAttribute("style");
}
class Piece {
    moved = false;
    constructor(color, type, no, x, y) {
        this.color = color;
        this.type = type;
        this.no = no;
        this.x = x;
        this.y = y;
    }
    showMoves() {
        if (moveShown) {
            let found = false;
            for (let i = 0; i < nextCoordinates.length; ++i) {
                let x = nextCoordinates[i].x, y = nextCoordinates[i].y;
                if (x == curX && y == curY) {
                    found = true;
                }
            }
            if (found) {
                performMove(highlighedX, highlighedY, curX, curY, false);
            }
            reset(highlighedX, highlighedY);
        }
        if (moveShown == false && pieceAtPosition[curX][curY].color == window.color && pieceAtPosition[curX][curY].color == currentColor) {
            highlighedX = curX, highlighedY = curY;
            moveShown = true;
            document.getElementById("board" + this.x + this.y).style.backgroundColor = getSquareColor(this.x, this.y);
            generateMoves(this);
            showMoves2();
        }
    }
}
let tempCoordinates = [];
function fill(x0, y0, amp, val, flag, cnt, check) {
    for (let i = -amp; i <= amp; ++i) {
        for (let j = -amp; j <= amp; ++j) {
            if ((Math.abs(i) + Math.abs(j) == val) == flag) {
                for (let c = 1; c <= cnt; ++c) {
                    let x = x0 + c * i, y = y0 + c * j;
                    let pnt = new Coordinates(x, y)
                    if (x >= 0 && x < 8 && y >= 0 && y < 8) {
                        if (pieceAtPosition[x][y].color == currentColor) break;
                        if (check && checkValidMove(pnt)) nextCoordinates.push(pnt);
                        else if (!check) tempCoordinates.push(pnt);
                        if (pieceAtPosition[x][y].color != -1 && pieceAtPosition[x][y].color != currentColor) break;
                    }
                }
            }
        }
    }
}
function generateMoves(piece) {
    let x = piece.x, y = piece.y;
    if (getPieceFromId.get(piece.type) == "pawn") {
        generatePawnMoves(piece.x, piece.y, piece.color, piece.moved);
    }
    else if (getPieceFromId.get(piece.type) == "knight") fill(x, y, 2, 3, true, 1, true);
    else if (getPieceFromId.get(piece.type) == "bishop") fill(x, y, 1, 2, true, 7, true);
    else if (getPieceFromId.get(piece.type) == "rook") fill(x, y, 1, 1, true, 7, true);
    else if (getPieceFromId.get(piece.type) == "queen") fill(x, y, 1, 0, false, 7, true);
    else if (getPieceFromId.get(piece.type) == "king") fill(x, y, 1, 0, false, 1, true);
}
function generatePawnMoves(x, y, color, moved) {
    if (getColorFromId.get(color) == "white") {
        let coordinates = new Coordinates(x-1, y);
        if (checkBound(coordinates) && checkValidMove(coordinates) && checkEmptyPiece(coordinates)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x-1, y-1);
        if (checkBound(coordinates) && checkOppositePiece(coordinates, 0) && checkValidMove(coordinates)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x-1, y+1);
        if (checkBound(coordinates) && checkOppositePiece(coordinates, 0) && checkValidMove(coordinates)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x-2, y);
        if (moved == false && checkBound(coordinates) && checkValidMove(coordinates) && checkEmptyPiece(coordinates)) nextCoordinates.push(coordinates);
    } else if (getColorFromId.get(color) == "black") {
        let coordinates = new Coordinates(x+1, y);
        if (checkBound(coordinates) && checkValidMove(coordinates) && checkEmptyPiece(coordinates)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x+1, y-1);
        if (checkBound(coordinates) && checkValidMove(coordinates) && checkOppositePiece(coordinates, 1)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x+1, y+1);
        if (checkBound(coordinates) && checkValidMove(coordinates) && checkOppositePiece(coordinates, 1)) nextCoordinates.push(coordinates);
        coordinates = new Coordinates(x+2, y);
        if (checkBound(coordinates) && checkValidMove(coordinates) && moved == false && checkEmptyPiece(coordinates)) nextCoordinates.push(coordinates);
    }
}
let pieceAtPosition = [];
for (let i = 0; i < 8; ++i) {
    pieceAtPosition[i] = [];
}
let temp2p;
window.checkValidMove = function (coordinates) {
    temp2p = pieceAtPosition[coordinates.x][coordinates.y];
    let p1 = pieceAtPosition[highlighedX][highlighedY];
    pieceAtPosition[highlighedX][highlighedY] = new Piece(-1, -1, -1, highlighedX, highlighedY);
    pieceAtPosition[coordinates.x][coordinates.y] = p1;

    currentColor = 1 - currentColor;
    for (let ii = 0; ii < 8; ++ii) {
        for (let jj = 0; jj < 8; ++jj) {
            let p = pieceAtPosition[ii][jj];
            let x = p.x, y = p.y;
            if (p.color == currentColor) {
                if (getPieceFromId.get(p.type) == "pawn") {
                    if (getColorFromId.get(p.color) == "white") {
                        for (let i = p.x-1; i >= Math.max(0, p.x-2); --i) {
                            let coordinates = new Coordinates(i, p.y);
                            tempCoordinates.push(coordinates);
                        }
                    } else if (getColorFromId.get(p.color) == "black") {
                        for (let i = p.x+1; i <= Math.min(7, p.x+2); ++i) {
                            let coordinates = new Coordinates(i, p.y);
                            tempCoordinates.push(coordinates);
                        }
                    }
                }
                else if (getPieceFromId.get(p.type) == "knight") fill(x, y, 2, 3, true, 1, false);
                else if (getPieceFromId.get(p.type) == "bishop") fill(x, y, 1, 2, true, 7, false);
                else if (getPieceFromId.get(p.type) == "rook") fill(x, y, 1, 1, true, 7, false);
                else if (getPieceFromId.get(p.type) == "queen") fill(x, y, 1, 0, false, 7, false);
                else if (getPieceFromId.get(p.type) == "king") fill(x, y, 1, 0, false, 1, false);
            }
        }
    }
    currentColor = 1 - currentColor;
    let good = true;
    for (let i = 0; i < tempCoordinates.length; ++i) {
        let x = tempCoordinates[i].x, y = tempCoordinates[i].y;
        if (pieceAtPosition[x][y].type == getIdFromPiece.get("king")) {
            good = false;
            break;
        }
    }
    pieceAtPosition[highlighedX][highlighedY] = p1;
    pieceAtPosition[coordinates.x][coordinates.y] = temp2p;
    tempCoordinates = [];
    return good;
}
window.onload = function initializeBoard() {
    for (let i = 2; i < 6; ++i) {
        for (let j = 0; j < 8; ++j) {
            pieceAtPosition[i][j] = new Piece(-1, -1, -1, i, j);
        }
    }
    pieceAtPosition[0][0] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("rook"), 0, 0, 0);
    pieceAtPosition[0][1] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("knight"), 0, 0, 1);
    pieceAtPosition[0][2] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("bishop"), 0, 0, 2);
    pieceAtPosition[0][3] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("queen"), 0, 0, 3);
    pieceAtPosition[0][4] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("king"), 0, 0, 4);
    pieceAtPosition[0][5] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("bishop"), 1, 0, 5);
    pieceAtPosition[0][6] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("knight"), 1, 0, 6);
    pieceAtPosition[0][7] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("rook"), 1, 0, 7);

    for (let j = 0; j < 8; ++j) {
        pieceAtPosition[1][j] = new Piece(getIdFromColor.get("black"), getIdFromPiece.get("pawn"), j, 1, j);
        pieceAtPosition[6][j] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("pawn"), j, 6, j);
    }

    pieceAtPosition[7][0] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("rook"), 0, 7, 0);
    pieceAtPosition[7][1] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("knight"), 0, 7, 1);
    pieceAtPosition[7][2] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("bishop"), 0, 7, 2);
    pieceAtPosition[7][3] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("queen"), 0, 7, 3);
    pieceAtPosition[7][4] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("king"), 0, 7, 4);
    pieceAtPosition[7][5] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("bishop"), 1, 7, 5);
    pieceAtPosition[7][6] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("knight"), 1, 7, 6);
    pieceAtPosition[7][7] = new Piece(getIdFromColor.get("white"), getIdFromPiece.get("rook"), 1, 7, 7);
}
window.perform = function (ID) {
    let id = ID.id;
    let x = id.at(5), y = id.at(6);
    x = parseInt(x), y = parseInt(y);
    curX = x, curY = y;
    pieceAtPosition[x][y].showMoves();
}

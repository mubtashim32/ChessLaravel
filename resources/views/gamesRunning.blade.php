<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Games</title>
    <link rel="stylesheet" href="{{ asset('css/gamesRunning.css') }}">
</head>
<body>
    <div class="topbar">Live Games</div>
    <div class="mainContainer">
    @foreach ($games as $game)
        <a class="cardContainer" href="/watchGame/{{ $game->id }}">
            <div class="player1">{{ $game->username1 }}</div>
            <div class="circle"></div>
            <div class="vs">VS</div>
            <div class="player2">{{ $game->username2 }}</div>
        </a>
    @endforeach
    </div>
    <script>
        var cards = document.getElementsByClassName('cardContainer');
        var bgColor = ['#FFCDD2', '#F8BBD0', '#E1BEE7','#D1C4E9', '#C5CAE9', '#BBDEFB', '#B3E5FC', '#B2EBF2', '#B2DFDB', '#C8E6C9', '#DCEDC8','#F0F4C3', '#FFF9C4', '#FFECB3', '#FFE0B2', '#FFCCBC', '#D7CCC8', '#F5F5F5', '#CFD8DC'];
        for (var i = 0; i  < cards.length; ++i) {
            cards[i].style.backgroundColor = bgColor[Math.floor(Math.random() * bgColor.length)];
        }
    </script>
</body>
</html>

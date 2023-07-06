<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="{{ asset('css/leaderboard.css') }}">
</head>
<body>
    <div class="container">
        <h1>Leaderboard</h1>
        <table>
            <tr>
                <td class="rankh">Rank</td>
                <td class="playerh">Player</td>
                <td class="ratingh">Rating</td>
                <td class="wdlh">Won/Draw/Lost</td>
            </tr>
                @foreach ($players as $player)
                <tr>
                    <td>
                        <a href="/profile/{{ $player->id }}" class="rank">
                            #{{ $loop->iteration }}
                        </a>
                    </td>
                    <td>
                        <a href="/profile/{{ $player->id }}" class="player">
                            <img src="{{ asset('images/g1.png') }}" alt="">
                            <div class="prank">GM</div>
                            <div class="username">{{ $player->username }}</div>
                        </a>
                    </td>
                    <td>
                        <a href="/profile/{{ $player->id }}" class="rating">
                            {{ $player->rating }}
                        </a>
                    </td>
                    <td>
                        <a href="/profile/{{ $player->id }}" class="wdl">
                            {{ $player->win }}/{{ $player->draw }}/{{ $player->lose }}
                        </a>
                    </td>
                </tr>
                @endforeach

        </table>
    </div>
</body>
</html>

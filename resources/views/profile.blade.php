<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    </head>
    <body>
        <div class="container">
            <div class="overview">
                <div class="user-info">
                    <img src="{{ asset('images/profile/player-photo.png') }}">
                    <div class="info">
                        <div id="username">{{ '@' }}{{ $user->username }}</div>
                        <div id="fullname">{{ $user->firstname }} {{ ' ' }} {{ $user->lastname }}</div>
                        <div id="country">Bangladesh</div>
                        <div id="join-date">Joined on {{ \Carbon\Carbon::parse($user->joining_date)->format('d M Y')}} </div>
                    </div>
                </div>
                <div class="player-info">
                    <div id="rank">Grandmaster</div>
                    <div id="rating">{{ $user->rating }}</div>
                </div>
            </div>
            <div class="statistics">
                <div class="statistics-box" id="all-box">
                    <img src="{{ asset('images/profile/all.png') }}" alt="">
                    <div class="statistics-box-text">
                        Total: {{ $user->total }}
                    </div>
                </div>
                <div class="statistics-box" id="win-box">
                    <img src="{{ asset('images/profile/win.png') }}" alt="">
                    <div class="statistics-box-text">
                        Win: {{ $user->win }}
                    </div>
                </div>
                <div class="statistics-box" id="draw-box">
                    <img src="{{ asset('images/profile/draw.png') }}" alt="">
                    <div class="statistics-box-text">
                        Draw: {{ $user->draw }}
                    </div>
                </div>
                <div class="statistics-box" id="lose-box">
                    <img src="{{ asset('images/profile/lose.png') }}" alt="">
                    <div class="statistics-box-text">
                        Lose: {{ $user->lose }}
                    </div>
                </div>
            </div>
            <div class="played-games">
                <table>
                    <tr>
                        <th class="playerH">Players</th>
                        <th class="resultH">Result</th>
                        <th class="movesH">Moves</th>
                        <th class="dateH">Date</th>
                    </tr>
                        @foreach ($games as $game)
                        <tr>
                            <td class="player">
                                <a href="/review/{{ $game->id }}">
                                    <div class="player1">
                                        <div class="player1-color"></div>
                                        <div class="player-rank">GM</div>
                                        <div class="player-username">{{ $game->username1 }}</div>
                                        <div class="player-rating">({{ $game->rating1 }})</div>
                                    </div>
                                    <div class="player2">
                                        <div class="player2-color"></div>
                                        <div class="player-rank">GM</div>
                                        <div class="player-username">{{ $game->username2 }}</div>
                                        <div class="player-rating">({{ $game->rating2 }})</div>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="/review/{{ $game->id }}">
                                    <div class="result-container">
                                        <div class="result">
                                            <div class="player-result">
                                                @if ($game->winner == 0)
                                                    {{ '1' }}
                                                @elseif ($game->winner == 1)
                                                    {{ '0' }}
                                                @else
                                                    {{ '1/2' }}
                                                @endif
                                            </div>
                                            <div class="player-result">
                                                @if ($game->winner == 0)
                                                    {{ '0' }}
                                                @elseif ($game->winner == 1)
                                                    {{ '1' }}
                                                @else
                                                    {{ '1/2' }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="result-icon">
                                            <img src="{{ asset('images/profile/plus.png') }}" alt="" height="15px" width="15px">
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="moves">
                                <a href="/review/{{ $game->id }}">
                                    {{ $game->moves }}
                                </a>
                            </td>
                            <td class="date">
                                <a href="/review/{{ $game->id }}">
                                    {{ \Carbon\Carbon::parse($game->started_at)->format('d M Y')}}
                                </a>
                            </td>
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </body>
</html>

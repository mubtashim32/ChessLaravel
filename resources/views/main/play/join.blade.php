<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/join.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    </head>
    <body>
        <div class="topbar">Available Games</div>
        <div class="main-container">
            @foreach($games as $game)
            @php
                $total = $game->win + $game->draw + $game->lose;
                $rating1 = $game->rating;
                $rating2 = Auth::user()->rating;
                $del = $rating2 - $rating1;
                $sigma = 100 / (1 + pow(10, -$del / 400));
            @endphp
                <div class="container">
                    <div class="top">
                        <div class="left">
                            <div class="username">{{ $game->username }}</div>
                            <div class="rating">Rating: {{ $game->rating }}</div>
                            <div class="stat">
                                <div class="c-stat">
                                    <div class="stat-t">W:</div>
                                    <div id="p-win" style="width: {{ 80 / 100 * ($total > 0 ? $game->win * 100 / $total : 0) }}"></div>
                                    <div class="t-stat">
                                        @if ($total > 0)
                                            {{ (int)($game->win * 100 / $total) }}
                                        @else
                                            {{ '0' }}
                                        @endif
                                        {{ '%' }}
                                    </div>
                                </div>
                                <div class="c-stat">
                                    <div class="stat-t">D:</div>
                                    <div id="p-draw" style="width: {{ 80 / 100 * ($total > 0 ? $game->draw * 100 / $total : 0) }}"></div>
                                    <div class="t-stat">
                                        @if ($total > 0)
                                            {{ (int)($game->draw * 100 / $total) }}
                                        @else
                                            {{ '0' }}
                                        @endif
                                        {{ '%' }}
                                    </div>
                                </div>
                                <div class="c-stat">
                                    <div class="stat-t">L:</div>
                                    <div id="p-lose" style="width: {{ 80 / 100 * ($total > 0 ? $game->lose * 100 / $total : 0) }}"></div>
                                    <div class="t-stat">
                                        @if ($total > 0)
                                            {{ (int)($game->lose * 100 / $total) }}
                                        @else
                                            {{ '0' }}
                                        @endif
                                        {{ '%' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cc">
                            <div class="c-chance">
                                <div class="chance-wheel" style="background: conic-gradient(#388E3C {{ 360 * $sigma / 100 }}deg, #F44336 0deg);"></div>
                                <div class="chance">{{ (int)$sigma }}%</div>
                            </div>
                            <div class="t">Win Chance</div>
                        </div>

                    </div>
                    <div class="bottom">
                        <a class="btn" href="/play/join/link/{{ $game->id }}">Play as Black</a>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Game</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.channelName = '{{ $channelName }}';
        window.color = '{{ $color }}';
        window.id = '{{ $id }}';
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @php
        $p1 = Auth::user();
        $u1 = $p1->username;
        $r1 = $p1->rating;
        $c1 = $p1->country;
        $c11 = "Null";
    @endphp
    <div class="playerContainer" id="pc2">
        <div class="playerX" id="player2">
            <div class="avatar"><img src="{{ asset('images/avatars/g1.png') }}" alt=""></div>
            <div class="info">
                <div class="usernameX" id="u2Box">
                    @if ($color == 1)
                        {{ $u1 }}
                    @endif
                </div>
                <div class="rating" id="r2Box">
                    @if ($color == 1)
                        {{ "(" }}{{  $r1 }}{{ ")" }}
                    @endif
                </div>
                <div class="country">
                    <img src="{{ asset('images/flags/bangladesh.png') }}" alt="" id="p2Box" style="visibility: hidden">
                </div>
            </div>
        </div>
    </div>
<div class="board-container">
    <div class="board-base">
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
        <div class="square black"></div>
        <div class="square white"></div>
    </div>
    <div class="interactive-board">
        <div class="square" id="board00" onClick="perform(this)"><img src="/images/black-rook.png" alt=""></div>
        <div class="square" id="board01" onClick="perform(this)"><img src="/images/black-knight.png" alt=""></div>
        <div class="square" id="board02" onClick="perform(this)"><img src="/images/black-bishop.png" alt=""></div>
        <div class="square" id="board03" onClick="perform(this)"><img src="/images/black-queen.png" alt=""></div>
        <div class="square" id="board04" onClick="perform(this)"><img src="/images/black-king.png" alt=""></div>
        <div class="square" id="board05" onClick="perform(this)"><img src="/images/black-bishop.png" alt=""></div>
        <div class="square" id="board06" onClick="perform(this)"><img src="/images/black-knight.png" alt=""></div>
        <div class="square" id="board07" onClick="perform(this)"><img src="/images/black-rook.png" alt=""></div>
        <div class="square" id="board10" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board11" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board12" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board13" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board14" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board15" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board16" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board17" onClick="perform(this)"><img src="/images/black-pawn.png" alt=""></div>
        <div class="square" id="board20" onClick="perform(this)"></div>
        <div class="square" id="board21" onClick="perform(this)"></div>
        <div class="square" id="board22" onClick="perform(this)"></div>
        <div class="square" id="board23" onClick="perform(this)"></div>
        <div class="square" id="board24" onClick="perform(this)"></div>
        <div class="square" id="board25" onClick="perform(this)"></div>
        <div class="square" id="board26" onClick="perform(this)"></div>
        <div class="square" id="board27" onClick="perform(this)"></div>
        <div class="square" id="board30" onClick="perform(this)"></div>
        <div class="square" id="board31" onClick="perform(this)"></div>
        <div class="square" id="board32" onClick="perform(this)"></div>
        <div class="square" id="board33" onClick="perform(this)"></div>
        <div class="square" id="board34" onClick="perform(this)"></div>
        <div class="square" id="board35" onClick="perform(this)"></div>
        <div class="square" id="board36" onClick="perform(this)"></div>
        <div class="square" id="board37" onClick="perform(this)"></div>
        <div class="square" id="board40" onClick="perform(this)"></div>
        <div class="square" id="board41" onClick="perform(this)"></div>
        <div class="square" id="board42" onClick="perform(this)"></div>
        <div class="square" id="board43" onClick="perform(this)"></div>
        <div class="square" id="board44" onClick="perform(this)"></div>
        <div class="square" id="board45" onClick="perform(this)"></div>
        <div class="square" id="board46" onClick="perform(this)"></div>
        <div class="square" id="board47" onClick="perform(this)"></div>
        <div class="square" id="board50" onClick="perform(this)"></div>
        <div class="square" id="board51" onClick="perform(this)"></div>
        <div class="square" id="board52" onClick="perform(this)"></div>
        <div class="square" id="board53" onClick="perform(this)"></div>
        <div class="square" id="board54" onClick="perform(this)"></div>
        <div class="square" id="board55" onClick="perform(this)"></div>
        <div class="square" id="board56" onClick="perform(this)"></div>
        <div class="square" id="board57" onClick="perform(this)"></div>
        <div class="square" id="board60" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board61" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board62" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board63" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board64" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board65" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board66" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board67" onClick="perform(this)"><img src="/images/white-pawn.png" alt=""></div>
        <div class="square" id="board70" onClick="perform(this)"><img src="/images/white-rook.png" alt=""></div>
        <div class="square" id="board71" onClick="perform(this)"><img src="/images/white-knight.png" alt=""></div>
        <div class="square" id="board72" onClick="perform(this)"><img src="/images/white-bishop.png" alt=""></div>
        <div class="square" id="board73" onClick="perform(this)"><img src="/images/white-queen.png" alt=""></div>
        <div class="square" id="board74" onClick="perform(this)"><img src="/images/white-king.png" alt=""></div>
        <div class="square" id="board75" onClick="perform(this)"><img src="/images/white-bishop.png" alt=""></div>
        <div class="square" id="board76" onClick="perform(this)"><img src="/images/white-knight.png" alt=""></div>
        <div class="square" id="board77" onClick="perform(this)"><img src="/images/white-rook.png" alt=""></div>
    </div>
</div>
<div class="playerContainer" id="pc1">
    <div class="playerX" id="player1">
        <div class="avatar"><img src="{{ asset('images/avatars/g2.png') }}" alt=""></div>
        <div class="info">
            <div class="usernameX" id="u1Box">
                @if ($color == 0)
                    {{ $u1 }}
                @else
                    {{ $firstPlayer->username }}
                @endif
            </div>
            <div class="rating" id="r1Box">
                @if ($color == 0)
                    {{ "(" }}{{  $r1 }}{{ ")" }}
                @else
                    {{ "(" }}{{  $firstPlayer->rating }}{{ ")" }}
                @endif
                </div>
            <div class="country"><img src="{{ asset("images/flags/bangladesh.png") }}" alt="" id="p1Box"></div>
        </div>
    </div>
</div>
<div class="modalContainer" id="modalBg">
    <div class="modalBg"  id="modal">
        {{-- <div class="cross" onclick="hide()">x</div> --}}
        <a href="/home" class="cross" onclick="hide()" style="text-decoration: none;">x</a>
        <div class="resultContainer">
            <div class="winner" id="heading">Black Won</div>
            <div class="type">by checkmate</div>
        </div>
        <div class="playersContainer">
            <div class="player">
                <img src="{{ asset('images/g1.png') }}" alt="" class="p1">
                <div class="username" id="username1">tangent</div>
            </div>
            <div class="pointContainer">
                <div class="point" id="result">1-0</div>
            </div>
            <div class="player">
                <img src="{{ asset('images/g2.png') }}" alt="" class="p2">
                <div class="username" id="username2">cosine</div>
            </div>
        </div>
        <div class="ratingContainer">
            <div class="text">NEW RATING</div>
            <div class="number">
                <div class="oldRating" id="rating">1234</div>
                <div class="delRating" id="delta">+123</div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    function hide() {
        modal.style.visibility = 'hidden';
        modalBg.style.visibility = 'hidden';
    }
</script> --}}
</body>
</html>

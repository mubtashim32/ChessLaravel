<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    @vite(['resources/css/home.css'])
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-top-content home" style="margin-bottom: 5px">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/logo.png') }}" alt="Home" style="height: 50px; width: 50px;">ChessX
                </a>
            </div>
            <div class="sidebar-top-content play">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/play.png') }}" alt="Play">Play
                </a>
                <div class="sidebar-top-content-panel play-panel">
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/play.png') }}" alt="Play">Play
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/computer.png') }}" alt="Computer">Computer
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/tournaments.png') }}" alt="Tournaments">Tournaments
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/4-player-&-variants.png') }}" alt="4 Player & Variants">4 Player & Variants
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/leaderboard.png') }}" alt="Leaderboard">Leaderboard
                    </a>
                </div>
            </div>
            <div class="sidebar-top-content puzzles">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/puzzles.png') }}" alt="Puzzles">Puzzles
                </a>
                <div class="sidebar-top-content-panel puzzles-panel">
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/puzzles2.png') }}" alt="Puzzles">Puzzles
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/puzzle-rush.png') }}" alt="Puzzle Rush">Puzzle Rush
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/puzzle-battle.png') }}" alt="Puzzle Battle">Puzzle Battle
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/daily-puzzle.png') }}" alt="Daily Puzzle">Daily Puzzle
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/custom-puzzles.png') }}" alt="Custom Puzzles">Custom Puzzles
                    </a>
                </div>
            </div>
            <div class="sidebar-top-content learn">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/learn.png') }}" alt="Learn">Learn
                </a>
                <div class="sidebar-top-content-panel learn-panel">
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/learn.png') }}" alt="Lessons">Lessons
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/analysis.png') }}" alt="Analysis">Analysis
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/chessable-courses.png') }}" alt="Chessable Courses">Chessable Courses
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/aimless-training.png') }}" alt="Aimless Training">Aimless Training
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/insights.png') }}" alt="Insights">Insights
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/classroom.png') }}" alt="Classroom">Classroom
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/openings.png') }}" alt="Openings">Openings
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/endgame.png') }}" alt="Endgame">Endgame
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/practice.png') }}" alt="Practice">Practice
                    </a>
                </div>
            </div>
            <div class="sidebar-top-content">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/watch.png') }}" alt="Watch">Watch
                </a>
                <div class="sidebar-top-content-panel"></div>
            </div>
            <div class="sidebar-top-content news">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/news.png') }}" alt="News">News
                </a>
                <div class="sidebar-top-content-panel news-panel">
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/chess-today.png') }}" alt="Chess Today">Chess Today
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/news.png') }}" alt="News">News
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/articles.png') }}" alt="Articles">Articles
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/res/icons/top-players.png') }}" alt="Top Players">Top Players
                    </a>
                    <a href="" class="sidebar-top-content-panel-link">
                        <img src="{{ asset('images/es/icons/chess-rankings.png') }}r" alt="Chess Rankings">Chess Rankings
                    </a>
                </div>
            </div>
            <div class="sidebar-top-content">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/social.png') }}" alt="Social">Social
                </a>
                <div class="sidebar-top-content-panel"></div>
            </div>
            <div class="sidebar-top-content">
                <a href="" class="sidebar-top-content-link">
                    <img src="{{ asset('images/res/icons/more.png') }}" alt="More">More
                </a>
                <div class="sidebar-top-content-panel"></div>
            </div>
            {{-- <div class="sign-up">
                <a href="">Sign Up</a>
            </div>
            <div class="log-in">
                <a href="">Log In</a>
            </div> --}}
        </div>
        <div class="sidebar-bottom">
            <div class="sidebar-bottom-content">
                <a href="" class="sidebar-bottom-content-link">
                    <img src="{{ asset('images/res/icons/languages.png') }}" alt="Languages">English
                </a>
            </div>
            <div class="sidebar-bottom-content">
                <a href="" class="sidebar-bottom-content-link">
                    <img src="{{ asset('images/res/icons/help.png') }}" alt="Help">Help
                </a>
            </div>
        </div>
    </div>
    <div class="mainRight">
        <div class="top1">
            <a class="notifications" href=""><i class="fi fi-rr-bell"></i></a>
            <a class="edit" href="/editProfile" title="Edit Profile"><i class="fi fi-rr-user-pen"></i></a>
            <a class="logout" href="/logout" title="Logout"><i class="fi fi-rr-sign-out-alt"></i></a>
        </div>
        <div class="mainContainer">
            <a class="top2" href="/profile">
                <div class="photo"><img src="{{ asset('images/g1.png') }}" alt=""></div>
                <div class="username">{{ $user->username }}</div>
                <div class="country"><img src="{{ asset("images/flags/$user->country.png") }}" alt=""></div>
            </a>
            <div class="container">
                <a class="cardContainer" href="/play/start">
                    <img src="{{ asset('images/play/start.png') }}" alt="">
                    <div class="text">Start a Game</div>
                </a>
                <a class="cardContainer" href="/play/join">
                    <img src="{{ asset('images/play/join.png') }}" alt="">
                    <div class="text">Join a Game</div>
                </a>
                <a class="cardContainer" href="/watch">
                    <img src="{{ asset('images/play/watch.png') }}" alt="">
                    <div class="text">Watch Games</div>
                </a>
                <a class="cardContainer" href="/leaderboard">
                    <img src="{{ asset('images/play/leaderboard.png') }}" alt="">
                    <div class="text">Leaderboard</div>
                </a>
            </div>
        </div>
        <div class="footer">
            <div class="links">
                <a href="">Help</a> |
                <a href="">Chess Terms</a> |
                <a href="">About</a> |
                <a href="">Jobs</a> |
                <a href="">Developers</a> |
                <a href="">User Agreement</a> |
                <a href="">Privacy</a> |
                <a href="">Fair Play</a> |
                <a href="">Community</a> |
                <a href="">Compliance</a> |
                <a href="">{{ Auth::id() }} © 2023</a>
            </div>
            <div class="image-links">
                <div class="image-links-left">
                    <div id="apple"></div>
                    <div id="android"></div>
                </div>
                <div class="image-links-right">
                    <div id="tiktok"></div>
                    <div id="twitter"></div>
                    <div id="youtube"></div>
                    <div id="twitch"></div>
                    <div id="instagram"></div>
                    <div id="discord"></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

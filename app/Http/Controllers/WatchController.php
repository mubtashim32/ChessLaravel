<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Moves;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WatchController extends Controller
{
    public function runningGames() {
        $runningGames = Game::all()->where('status', '=', 'running');
        return view('gamesRunning', ['games' => $runningGames]);
    }
    public function watchGame($id) {
        $moves = Moves::all()->where('game', '=', $id);
        $game = Game::find($id);
        $player1 = Player::find($game->player1);
        $player2 = Player::find($game->player2);
        return view('liveGame', ['id' => $id, 'game' => $game, 'moves' => $moves, 'player1' => $player1, 'player2' => $player2]);
    }
    public function reviewGame($id) {
        $moves = Moves::all()->where('game', '=', $id);
        $game = Game::find($id);
        $player1 = Player::find($game->player1);
        $player2 = Player::find($game->player2);
        return view('reviewGame', ['id' => $id, 'game' => $game, 'moves' => $moves, 'player1' => $player1, 'player2' => $player2]);
    }
}

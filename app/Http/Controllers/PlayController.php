<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PlayGameEvent;
use App\Events\ResultEvent;
use App\Events\StartGame;
use Illuminate\Support\Facades\DB;
use LDAP\Result;
use PharIo\Manifest\Author;

class PlayController extends Controller
{
    public function start() {
        $user = Auth::user();
        $user->total += 1;
        $user->save();
        $game = Game::create([
            'player1' => Auth::id(),
            'username1' => Auth::user()->username,
            'status' => "started",
            'winner' => -1,
            'moves' => 0,
            'rating1' => $user->rating
        ]);
        $id = $game->id;
        $channelName = $game->id;
        $color = 0;
        return view('main.play.start', compact(['channelName', 'id', 'color']));
    }
    public function link($id) {
        $game = Game::find($id);
        $game->player2 = Auth::id();
        $game->username2 = Auth::user()->username;
        $game->status = "running";
        $game->started_at = Carbon::now()->toDateTime();
        $game->rating2 = Auth::user()->rating;
        $game->save();
        $channelName = $game->id;
        $color = 1;

        $user = Auth::user();
        $user->total += 1;
        $user->save();

        $firstPlayer = Player::find($game->player1);
        event(new StartGame($game->id, $user->username, $user->rating, $user->country));
        return view('main.play.start', compact(['channelName', 'id', 'color', 'firstPlayer']));
    }
    public function join() {
        $games = DB::table('games')
                                ->where('status', '=', 'started')
                                ->where('player1', '!=', Auth::id())
                                ->join('players', 'players.id', '=', 'games.player1')
                                ->select('games.id', 'players.username', 'players.rating', 'players.win', 'players.draw', 'players.lose')
                                ->get();
        return view('main.play.join', compact('games'));
    }
    public function result(Request $request) {
        $game = Game::find($request->id);
        $game->status = "finished";
        $game->winner = $request->winner;
        $game->moves += $request->cnt;
        $game->save();
        event(new ResultEvent($request->id, $request->winner));
        return response()->json($request->winner);
    }
    public function gameOver(Request $request) {
        $game = Game::find($request->id);
        $player1 = Player::find($game->player1);
        $player2 = Player::find($game->player2);
        return response()->json([
            'game' => $game,
            'player1' => $player1,
            'player2' => $player2,
        ]);
    }
    public function updateRating(Request $request) {
        $player1 = Player::find($request->id1);
        $player2 = Player::find($request->id2);

        $player1->rating = $request->rating1;
        $player2->rating = $request->rating2;

        if ($request->winner == 0) {
            $player1->win += 1;
            $player2->lose += 1;
        } else {
            $player1->lose += 1;
            $player2->win += 1;
        }

        $player1->save();
        $player2->save();

        $game = Game::find($request->id);
        $game->moves += $request->cnt;

        return response()->json($player1);
    }
}

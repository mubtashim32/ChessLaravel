<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function play() {
        if (Auth::check()) {
            $user = Auth::user();
            return view('home')->with(['user' => $user]);
        } else {
            return redirect('/login');
        }
    }
    public function watch() {
        return view('main.watch');
    }
    public function leaderboard() {
        $players = Player::orderBy('rating', 'desc')->get();
        return view('leaderboard')->with(['players' => $players]);
    }
    public function profile() {
        return view('main.profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $games = DB::table('games')->where('player1', '=', $user->id)->orWhere('player2', '=', $user->id)->latest('started_at')->get();
        return view('profile')->with(['user' => $user, 'games' => $games]);
    }
    public function editProfile() {
        $user = Auth::user();
        return view('editProfile')->with(['user' => $user]);
    }
    public function updateInfo(Request $request) {
        $user = Auth::user();
        if (Str::length($request->firstname) > 0) {
            $user->firstname = $request->firstname;
        }
        if (Str::length($request->lastname) > 0) {
            $user->lastname = $request->lastname;
        }
        if (Str::length($request->username) > 0) {
            $user->username = $request->username;
        }
        if (Str::length($request->email) > 0) {
            $user->email = $request->email;
        }
        if (Str::length($request->country) > 0) {
            $user->country = $request->country;
        }
        if (Str::length($request->language) > 0) {
            $user->language = $request->language;
        }
        if (Str::length($request->timezone) > 0) {
            $user->timezone = $request->timezone;
        }
        $user->save();
        return response()->json($user);
    }
    public function updatePassword(Request $request) {
        $user = Auth::user();
        if ($user->password == Hash::make($request->oldpass)) {
            $user->password = Hash::make($request->newpass);
            $user->save();
            return response()->json($user);
        }
    }
    public function viewProfile($id) {
        $user = Player::find($id);
        $games = DB::table('games')
                    ->where('player1', '=', $user->id)
                    ->orWhere('player2', '=', $user->id)
                    ->latest('started_at')
                    ->get();
        return view('profile')->with(['user' => $user, 'games' => $games]);
    }
}

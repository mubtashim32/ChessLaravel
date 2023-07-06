<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        $email = session()->get('email');
        $password = session()->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/home');
        }
        return view('auth.login');
    }
    public function check(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->rem == 'true') {
                session()->put('email', $request->email);
                session()->put('password', $request->password);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
    public function register() {
        return view('auth.register');
    }
    public function logout() {
        session()->forget('email');
        session()->forget('password');
        return redirect('/login');
    }
    public function create(Request $request) {
        $data = $request->validate([
            'email' => 'required|unique:players|max:255',
            'username' => 'required|unique:players|min:6',
            'password' => 'required|min:6',
        ]);
        $player = Player::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'joining_date' => Carbon::now()->toDate(),
        ]);
        Auth::login($player);
        return redirect('/home');
    }
}

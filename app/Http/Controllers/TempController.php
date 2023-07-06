<?php

namespace App\Http\Controllers;

use App\Models\Move;
use App\Models\Moves;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\PlayGameEvent;

class TempController extends Controller
{
    public function down() {
        $data = Moves::orderBy('id', 'DESC')->first();
        return response()->json($data);
    }
    public function up(Request $request)
    {
        $game = $request->move['game'];
        $data = Moves::create([
            'game' => $request->move['game'],
            'x1' => $request->move['x1'],
            'y1' => $request->move['y1'],
            'x2' => $request->move['x2'],
            'y2' => $request->move['y2'],
            'color' => $request->move['color'],
            'moved_at' => Carbon::now()->toDateTime()
        ]);
        event(new PlayGameEvent($game, $data));
        return response()->json($data);
    }
}

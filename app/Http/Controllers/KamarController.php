<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Psy\Util\Json;

class KamarController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('room', ['rooms' => $rooms]);
    }
    public function kelaskamar(Request $request)
    {
        if ($request->has('room_kelas')) {
            $rooms_kelas = $request->input('room_kelas');
            // return $rooms_kelas;
            $room_kelas = Room::where('kelas', '=', $rooms_kelas)->get();
            return response()->json($room_kelas);
        }

    }
}

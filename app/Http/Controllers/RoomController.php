<?php

namespace App\Http\Controllers;

use App\Medical;
use App\Models\ReservationRequest;
use App\Models\Reservations;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('room', ['rooms' => $rooms]);
    }
    public function show($id)
    {
        $appointment = Room::find($id);
        return view('roomsingle', ['appointment' => $appointment]);
    }

    public function store(Request $request)
    {
        // return $request;
        // $userId = Auth::id();
        // $qrcode = rand(5, 99999);

        ReservationRequest::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'user_id' => Auth::id(),
        ]);

        return redirect('/kamar');
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

    function reservation()
    {
        $room_list = Room::groupBy('lokasi')->get();
        $user_list = User::all();
        return view('roomReservation')->with('room_list', $room_list);
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        //  cara ngefetch teko db sing ono wbere atau laine iku duduk all()->
        // tapi ndek mburi ditambahi get()
        $data = Room::where($select, $value)->groupBy($dependent)->get();
        return ['data' => $data];
    }

    function fetchResult(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $lokasi = $request->get('lokasi');
        $dependent = $request->get('dependent');

        $data = Room::where('lokasi', $lokasi)->where($select, $value)->get();
        return ['data' => $data];
    }

}

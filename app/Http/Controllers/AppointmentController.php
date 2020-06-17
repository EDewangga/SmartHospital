<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $users = User::all();
        return view('appointment', ['appointments' => $appointments , 'users' => $users]);
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);
        return view('appointmentsingle', ['appointment' => $appointment]);
    }

    public function store(Request $request)
    {
        // return $request;
        // $userId = Auth::id();
        // $qrcode = rand(5, 99999);

        Appointment::create([
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'lokasi' => $request->lokasi,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'user_id' => Auth::id(),
            'qrcode' => rand(5, 99999)
        ]);

        return redirect('periksa');
    }

}

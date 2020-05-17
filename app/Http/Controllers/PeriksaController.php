<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PeriksaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('periksa', compact($users));
    }

    public function store(Request $request)
    {
        // return $request;
        // $userId = Auth::id();
        // $qrcode = rand(5, 99999);

        Periksa::create([
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'lokasi' => $request->lokasi,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'users_id' => Auth::id(),
            'qrcode' => rand(5, 99999)
        ]);



        return redirect('periksa');
    }
}

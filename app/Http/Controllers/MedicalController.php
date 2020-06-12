<?php

namespace App\Http\Controllers;

use App\Medical;
use App\User;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index()
    {
        $medical = Medical::all();
        $users = User::all();
        return view('medical', ['medical' => $medical , 'users' => $users]);
    }

    // public function show($id)
    // {
    //     $medical = Medical::();
    //     return view('appointmentsingle)', ['appointment' => $appointment]);
    // }

    function preception()
    {
        $medical_list = Medical::groupBy('jenis')->get();
        return view('medicalPreception')->with('medical_list', $medical_list);
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        //  cara ngefetch teko db sing ono wbere atau laine iku duduk all()->
        // tapi ndek mburi ditambahi get()
        $data = Medical::where($select, $value)->groupBy($dependent)->get();
        return ['data' => $data];
    }

    function fetchResult(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $jenis = $request->get('jenis');
        $dependent = $request->get('dependent');

        $data = Medical::where('jenis', $jenis)->where($select, $value)->get();
        return ['data' => $data];
    }
}

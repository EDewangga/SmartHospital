<?php

namespace App\Http\Controllers;

use App\Appointmentsegment;

use App\Medical;
use App\Models\appointment;
use App\Models\Doctor;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $users = User::all();
        $doctor = Doctor::all();
        $data = [
            'appointments' => $appointments ,
            'users' => $users,
            'doctor' => $doctor
        ];
        return view('appointment')->with(compact('data'));
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);
        return view('appointmentsingle', ['appointment' => $appointment]);
    }

    // public function store(Request $request)
    // {
    //     // return $request;
    //     // $userId = Auth::id();
    //     // $qrcode = rand(5, 99999);

    //     Appointment::create([
    //         'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
    //         'lokasi' => $request->lokasi,
    //         'nama' => $request->nama,
    //         'telp' => $request->telp,
    //         'email' => $request->email,
    //         'user_id' => Auth::id(),
    //         'qrcode' => rand(5, 99999)
    //     ]);

    //     return redirect('periksa');
    // }

    public function store(Request $request) {
        if($request->segment_time == 'pagi'){
            $cek_segment = Appointment::where('segment_time', 'pagi')
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->where('doctor_id', $request->doctor_id)
                                    ->max('urutan');

            if($cek_segment){
                $get = Appointment::where('segment_time', 'pagi')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment)->first();
                $jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            }

            if(!$cek_segment){
                Appointment::create([
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                    'lokasi' => $request->lokasi,
                    'nama' => $request->nama,
                    'segment_time' => $request->segment_time,
                    'telp' => $request->telp,
                    'urutan' => 1,
                    'email' => $request->email,
                    'doctor_id' => $request->doctor_id,
                    'user_id' => Auth::id(),
                    // 'qrcode' => rand(5, 99999)
                ]);
            } else if (Carbon::parse($jam->jam_layanan)->addMinutes(15)->format('Hi') < Carbon::parse("12:00")->format('Hi')){
                Appointment::create([
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                    'lokasi' => $request->lokasi,
                    'nama' => $request->nama,
                    'segment_time' => $request->segment_time,
                    'telp' => $request->telp,
                    'urutan' => $cek_segment+1,
                    'email' => $request->email,
                    'doctor_id' => $request->doctor_id,
                    'user_id' => Auth::id(),
                    // 'qrcode' => rand(5, 99999)
                ]);
            } else {
                //Melebihi Batas Segment Pagi
                return redirect('periksa');
            }
            //Get data from appointment_time where id_appointment no urut cek_segment
            $cek_segment2 = Appointment::where('segment_time', 'pagi')
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->max('urutan');
            $get_appointment = Appointment::where('segment_time', 'pagi')
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('urutan',$cek_segment2)->first();

            if(!$cek_segment){
                $get_appointmentBefore = Appointment::where('segment_time', 'pagi')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment2)->first();
                $cek_jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get_appointmentBefore->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            } else {
                $get_appointmentBefore = Appointment::where('segment_time', 'pagi')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment2 - 1)->first();
                $cek_jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get_appointmentBefore->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            }

            if(!$cek_jam){
                Appointmentsegment::create([
                    'urutan' => $get_appointment->urutan,
                    'appointment_id' => $get_appointment->id,
                    'doctor_id' => $get_appointment->doctor_id,
                    'date' => $get_appointment->tanggal,
                    'jam_layanan' => Carbon::createFromTime(8, 0, 0)->format('H:i'),
                ]);
            } else if(Carbon::parse($cek_jam->jam_layanan)->addMinutes(15)->format('Hi') < Carbon::parse("12:00")->format('Hi')){
                Appointmentsegment::create([
                    'appointment_id' => $get_appointment->id,
                    'urutan' => $get_appointment->urutan,
                    'doctor_id' => $get_appointment->doctor_id,
                    'date' => $get_appointment->tanggal,
                    'jam_layanan' => Carbon::parse($cek_jam->jam_layanan)->addMinutes(45)->format('H:i'),
                ]);
            } else {
                //Melebihi Batas Segment Pagi
                return redirect('periksa');
            }
        } else if($request->segment_time == 'siang'){
            $cek_segment = Appointment::where('segment_time', 'siang')
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->where('doctor_id', $request->doctor_id)
                                    ->max('urutan');

            if($cek_segment){
                $get = Appointment::where('segment_time', 'siang')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment)->first();
                $jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            }

            if(!$cek_segment){
                Appointment::create([
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                    'lokasi' => $request->lokasi,
                    'nama' => $request->nama,
                    'segment_time' => $request->segment_time,
                    'telp' => $request->telp,
                    'urutan' => 1,
                    'email' => $request->email,
                    'doctor_id' => $request->doctor_id,
                    'user_id' => Auth::id(),
                    // 'qrcode' => rand(5, 99999)
                ]);
            } else if (Carbon::parse($jam->jam_layanan)->addMinutes(15)->format('Hi') < Carbon::parse("16:00")->format('Hi')){
                Appointment::create([
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                    'lokasi' => $request->lokasi,
                    'nama' => $request->nama,
                    'segment_time' => $request->segment_time,
                    'telp' => $request->telp,
                    'urutan' => $cek_segment+1,
                    'email' => $request->email,
                    'doctor_id' => $request->doctor_id,
                    'user_id' => Auth::id(),
                    // 'qrcode' => rand(5, 99999)
                ]);
            } else {
                //Melebihi Batas Segment siang
                return redirect('periksa');
            }
            //Get data from appointment_time where id_appointment no urut cek_segment
            $cek_segment2 = Appointment::where('segment_time', 'siang')
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->max('urutan');
            $get_appointment = Appointment::where('segment_time', 'siang')
                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('urutan',$cek_segment2)->first();

            if(!$cek_segment){
                $get_appointmentBefore = Appointment::where('segment_time', 'siang')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment2)->first();
                $cek_jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get_appointmentBefore->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            } else {
                $get_appointmentBefore = Appointment::where('segment_time', 'siang')
                                                    ->where('doctor_id', $request->doctor_id)
                                                    ->where('tanggal', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                                    ->where('urutan',$cek_segment2 - 1)->first();
                $cek_jam = Appointmentsegment::where('date', Carbon::parse($request->tanggal)->format('Y-m-d'))
                                            ->where('appointment_id', $get_appointmentBefore->id)
                                            ->where('doctor_id', $request->doctor_id)
                                            ->first();
            }

            if(!$cek_jam){
                Appointmentsegment::create([
                    'urutan' => $get_appointment->urutan,
                    'appointment_id' => $get_appointment->id,
                    'doctor_id' => $get_appointment->doctor_id,
                    'date' => $get_appointment->tanggal,
                    'jam_layanan' => Carbon::createFromTime(12, 0, 0)->format('H:i'),
                ]);
            } else if(Carbon::parse($cek_jam->jam_layanan)->addMinutes(15)->format('Hi') < Carbon::parse("16:00")->format('Hi')){
                Appointmentsegment::create([
                    'appointment_id' => $get_appointment->id,
                    'urutan' => $get_appointment->urutan,
                    'doctor_id' => $get_appointment->doctor_id,
                    'date' => $get_appointment->tanggal,
                    'jam_layanan' => Carbon::parse($cek_jam->jam_layanan)->addMinutes(45)->format('H:i'),
                ]);
            } else {
                //Melebihi Batas Segment siang
                return redirect('periksa');
            }
        }
        return redirect('periksa');
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

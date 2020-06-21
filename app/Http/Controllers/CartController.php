<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Appointment;
use App\Models\Prescriptions;
use App\Models\PrescriptionDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function userCart($id) {
        $carts = Cart::with('medical')->where('user_id', $id)->get();
        return $carts;
    }

    public function addCart(Request $request) {
        $cart = Cart::where('medical_id', $request->id)->where('user_id', $request->user_id)->first();

        if ($cart) {
            $updateCart = DB::table('carts')
              ->where('medical_id', $request->id)
              ->where('user_id', $request->user_id)
              ->update(['quantity' => $cart->quantity + $request->quantity]);
              return $updateCart;
        } else {
            $newCart = new Cart;
            $newCart->medical_id = $request->id;
            $newCart->user_id = $request->user_id;
            $newCart->quantity = $request->quantity;
            $newCart->save();
        }
        return true;
    }

    public function deleteCart(Request $request) {
        $cart = Cart::where('medical_id', $request->id)->where('quantity', $request->quantity)->delete();

        if ($cart) {
            return true;
        }
        return false;
    }

    public function checkout(Request $request) {
        // TAMBAH APPOINTMENT 
        $appointment = new Appointment;
        // sesuai form 
        // $appointment->name = $request->name;
        // $appointment->tanggal = date('Y-m-d H:i:s');
        // $appointment->lokasi = $request->lokasi;
        // $appointment->nama = $request->name;
        // $appointment->telp = $request->phone;
        // $appointment->email =  Auth::user()->email;
        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = Auth::user()->id;
        $appointment->save();

        if (!$appointment) {
            return false;
        }

        $total = 0;
        // GET CART PUNYA PASIEN 
        $carts = Cart::with('medical')->where('user_id', $request->user_id)->get();

        // MENGHITUNG TOTAL 
        foreach ($carts as $cart) {
            $total+=($cart->quantity * $cart->medical->harga);
        }

        // TAMBAH PRESCRIPTIONS 
        $prescriptions =  new Prescriptions;
        $prescriptions->appointment_id = $appointment->id;
        $prescriptions->status = 0;
        $prescriptions->total = $total;
        // haruse ambil sesuai form kate ambile kapan?
        $prescriptions->ambil = date('Y-m-d H:i:s');
        $prescriptions->save();

        if (!$prescriptions) {
            return false;
        }

        // INSERT PRESCRIPTION DETAILS 
        foreach ($carts as $cart) {
            $detail = new PrescriptionDetails;
            $detail->prescription_id = $prescriptions->id;
            $detail->medical_id = $cart->medical_id;
            $detail->quantity = $cart->quantity;
            $detail->save();
        }

        // DELETE CARTS
        $deleteCarts = Cart::where('user_id', $request->user_id)->delete();
    }
}

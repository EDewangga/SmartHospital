<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function userCart() {
        return Cart::where('user_id', Auth::user()->id)->get();
    }
}

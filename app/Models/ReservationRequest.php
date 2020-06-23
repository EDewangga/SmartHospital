<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationRequest extends Model
{
    protected $table = 'reservations_request';
    protected $fillable = ['nama','telp','email','room_id'];
    protected $guarderd = ['id'];
}


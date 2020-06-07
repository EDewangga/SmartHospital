<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    // protected $fillable = ['tanggal','lokasi','nama','telp','email'];
    protected $guarded = ['id','created_at','updated_at'];
}

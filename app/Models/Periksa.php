<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $table = 'periksa';

    // protected $fillable = ['tanggal','lokasi','nama','telp','email'];
    protected $guarded = ['id','created_at','updated_at'];
}

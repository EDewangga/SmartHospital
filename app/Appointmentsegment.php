<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointmentsegment extends Model
{
    public $timestamps = false;
    protected $table = 'appointments_time';
    protected $fillable = ['urutan','appointment_id','doctor_id','date','jam_layanan'];
    protected $guarderd = [];


}

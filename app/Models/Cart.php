<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarderd = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function medical() {
        return $this->belongsTo('App\Models\Medical');
    }
}

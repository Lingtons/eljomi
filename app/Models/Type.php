<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Type extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function customers(){

        return $this->hasMany('App\Models\Customer');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferenceValue extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name', 'preference_id', 
    ];
}

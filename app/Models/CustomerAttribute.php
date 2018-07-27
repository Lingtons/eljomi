<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAttribute extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'option_id', 'option_value_id'
    ];
}

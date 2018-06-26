<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $fillable = [
        'name', 'code', 'email', 'nickname', 'phone', 'address', 'dob', 'gender','type_id'
    ];
}

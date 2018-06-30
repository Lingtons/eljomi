<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Preference extends Model
{
    //
    public $timestamps = false;

     protected $fillable = [
        'name'
    ];

    public function customers()
  	{
      	return $this->belongsToMany('App\Models\Customer')
        ->withPivot('value');
  	}
}

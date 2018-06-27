<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Preference;

class Customer extends Model
{
    //
     protected $fillable = [
        'name', 'code', 'email', 'nickname', 'phone', 'address', 'dob', 'gender','type_id'
    ];

    public function type(){

    	return $this->belongsTo('App\Models\Type', 'type_id');
    }

    public function preferences()
  	{
      	return $this->belongsToMany('App\Models\Preference')
        ->withPivot('value')
        ->withTimestamps();
  	}
}

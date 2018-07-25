<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Preference;

class Customer extends Model
{
    //
    protected $fillable = [
        'name', 'code', 'email', 'nickname', 'phone', 'address', 'dob', 'gender','type', 'point'
    ];

    
    public function preferences()
  	{
      	return $this->belongsToMany('App\Models\Preference')
        ->withPivot('value');
    }
      
    public function transactions(){

    	return $this->hasMany('App\Models\Transaction')->orderBy('created_at', 'DESC');;
    	
    }
}

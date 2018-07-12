<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ServiceCategory extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'hours'
    ];

    public function items(){

    	return $this->hasMany('App\Models\Item');
    	
    }
}

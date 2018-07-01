<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class ItemCategory extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function items(){

    	return $this->hasMany('App\Models\Item');
    	
    }


}

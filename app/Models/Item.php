<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;
use App\Models\ItemCategory;

class Item extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'service_category_id', 'item_category_id'
    ];

    public function service_category(){

    	return $this->belongsTo('App\Models\ServiceCategory', 'service_category_id');
    }

    public function item_category(){

    	return $this->belongsTo('App\Models\ItemCategory', 'item_category_id');
    }

}

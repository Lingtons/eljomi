<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = 	['customer_id', 'service_category_id','transaction_code','pickup_time','due_time','delivery_time','paid', 'total','short_note', 'collections'];


    protected $casts = ['collections'];

    protected $dates = ['pickup_time','due_time','delivery_time'];

    
    public function customer(){

    	return $this->belongsTo('App\Models\Customer');
    	
    }

    public function service_category(){
        return $this->belongsTo('App\Models\ServiceCategory');	        
    }

}

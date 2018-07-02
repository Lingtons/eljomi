<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;

class ExpenseCategory extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    
    public function expenses(){

    	return $this->hasMany('App\Models\Expense');
    	
    }
}

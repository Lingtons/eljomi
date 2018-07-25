<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseCategory;

class Expense extends Model
{
    //

    protected $fillable = [
        'name', 'expense_category_id', 'reason', 'description', 'amount', 'date_occurred'
    ];

    public function expense_category(){

    	return $this->belongsTo('App\Models\ExpenseCategory', 'expense_category_id');
    }

    protected $dates = ['date_occurred'];
}

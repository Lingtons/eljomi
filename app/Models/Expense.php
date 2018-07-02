<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //

    protected $fillable = [
        'name', 'expense_category_id', 'reason', 'description', 'amount', 'date_occurred'
    ];
}

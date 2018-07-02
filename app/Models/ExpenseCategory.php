<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    
}

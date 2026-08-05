<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //
    protected $table = 'expenses';

    protected $fillable = [
        'product_name',
        'product_quantity',
        'product_price',
    ];
}

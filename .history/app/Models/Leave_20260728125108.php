<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table="leave";
    protected $fillable = [
     'account_id',
     'name',
     'department',
     'leavetype',
     'leave'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sessionCheck extends Model
{
    //
    protected $table = "session_check";
    protected $fillable = [
    "user_id",
    "session_id",
    "device_type",
    "ip_address",
    "l"
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\circular;

class circularController extends Controller
{
    //

    public function(){
    circular::orderBy('id','DESC')
    }
}

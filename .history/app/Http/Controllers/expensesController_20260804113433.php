<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class expensesController extends Controller
{
    //

    public function index(){
   $data = Expenses::orderBy('id', 'desc')->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class expensesController extends Controller
{
    //

    public function index(){
   $expensise = Expenses::orderBy('id', 'desc')->get();
   return view('expenses',compact('expensise'));
    }

    public function store(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer',
            'product_price' => 'required|numeric',
        ])
    }
}

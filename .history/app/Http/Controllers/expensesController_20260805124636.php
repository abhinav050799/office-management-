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
        ]);
        
        Expenses::create([
            'product_name' => $request->input('product_name'),
            'product_quantity' => $request->input('product_quantity'),
            'product_price' => $request->input('product_price'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Expense added successfully.');
    }


    public function update(Request $request, $id){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer',
            'product_price' => 'required|numeric',
        ]);
        dd($request->);

        Expenses::where('id',$id)->updated([
 'product_name' => $request->input('product_name'),
            'product_quantity' => $request->input('product_quantity'),
            'product_price' => $request->input('product_price'),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Expense updated successfully.');
    }
}

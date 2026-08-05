<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\User;

class expensesController extends Controller
{
    //

    public function index(){
   $expensise = Expenses::orderBy('id', 'desc')->get();
      foreach ($expensise as $expense) {
        $user = User::find($expense->addby);
        $expense->name = $user->name ?? 'N/A';
    }
   return view('expenses',compact('expensise', 'name'));
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
            'addby' => session('id'),
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


        Expenses::where('id',$id)->update([
 'product_name' => $request->input('product_name'),
            'product_quantity' => $request->input('product_quantity'),
            'product_price' => $request->input('product_price'),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Expense updated successfully.');
    }

    public function destroy($id){
        Expenses::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Expense deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\circular;

class circularController extends Controller
{
    //

    public function index(){
    $circular =circular::orderBy('id','DESC')->get();
    return view('circular', compact('circular'));
    }

    public function add(Request $request){
        $request->validate([
        'title' => 'required',
        'text' => 'required',
        ]);  
        $circular =  new circular();
         $circular->title = $request->title;
        $circular->text = $request->text;
        $circular->title = $request->title;
        if($circular->save()){
            return view
        }
    }
}

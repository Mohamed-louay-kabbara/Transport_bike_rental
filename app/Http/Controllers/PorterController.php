<?php

namespace App\Http\Controllers;

use App\Models\porter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PorterController extends Controller
{
    public function index()
    {
        $porter=porter::all();
        return view('porter',compact('porter'));
        
    }

    public function create()
    {
        
    }

    					
    public function store(Request $request)
    {
        $image=$request->file('picture')->getClientOriginalName();
        $path= $request->file('picture')->storeAs('porters',$image,'imges');
        DB::table('porters')->insert([
            'name'=>$request->name,
            'name_mother'=>$request->name_mother,
            'place_birth'=>$request->place_birth,
            'data_birth'=>$request->data_birth,
            'phone'=>$request->phone,
            'national_number'=>$request->national_number,
            'residence'=>$request->residence,
            'picture'=>$path,
            'number_box'=>$request->number_box
        ]);
        return redirect()->route('Porter.index');
    }

    public function show(porter $porter)
    {
        
    }
    public function edit(porter $porter)
    {
        
    }

    public function update(Request $request, $id)
    {

        DB::table('porters')->where('id',$id)->update([
            'name'=>$request->name,
            'name_mother'=>$request->name_mother,
            'place_birth'=>$request->place_birth,
            'data_birth'=>$request->data_birth,
            'phone'=>$request->phone,
            'national_number'=>$request->national_number,
            'residence'=>$request->residence,
            'number_box'=>$request->number_box
        ]);
        return redirect()->route('Porter.index');
    }
    
    public function destroy($id)
    {
        DB::table('porters')->where('id',$id)->delete();
        return back();
    }
}

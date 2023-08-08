<?php

namespace App\Http\Controllers;

use App\Models\worker;
use App\Models\porter;
use App\Models\sale;
use App\Models\outlay;
use App\Models\straples;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    public function index()
    {
        if(auth()->user()->role==1){
        $worker=worker::where('role',1)->get();
        return view('worker',compact('worker'));}
        elseif(auth()->user()->role==2){

            $straples=straples::where('borrowed','<',date('y/m/d'))->get();
            $porter=porter::get();
            return view('porters',compact('porter','straples'));
        }
        else{
            $worker=worker::where('role',2)->get();
            $straples=straples::get();
            $outlay=outlay::all();
            return view('owner',compact('worker','straples','outlay'));
        }
    }

    public function create()
    {

    }
    public function workers()
    {
        $outlay=outlay::all();
        $worker=worker::where('role',1)->get();
        return view('worker_outlay',compact('worker','outlay'));
    }

    public function store(Request $request)
    {
        $path="null";
        if($request->role==1){
        $image=$request->file('picture')->getClientOriginalName();
        $path= $request->file('picture')->storeAs('workers',$image,'imges');}
        DB::table('workers')->insert([
            'name'=>$request->name,
            'salary'=>$request->salary,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'picture'=>$path
        ]);
        return back();
    }

    public function show(worker $worker)
    {

    }

    public function edit(worker $worker)
    {

    }

    public function update(Request $request,$id)
    {
        DB::table('workers')->where('id',$id)->update([
            'name'=>$request->name,
            'salary'=>$request->salary,
            'phone'=>$request->phone
        ]);
        return back();
    }

    public function destroy($id)
    {
        DB::table('workers')->where('id',$id)->delete();
        return back();
    }
}

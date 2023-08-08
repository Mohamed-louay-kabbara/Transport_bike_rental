<?php

namespace App\Http\Controllers;

use App\Models\straples;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\worker;
use Illuminate\Support\Facades\DB;

class StraplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=worker::where('role',2)->get();
        $straples=straples::with('User')->get();
       return view('straples',compact('straples','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('straples')->insert([
            'number'=>$request->number,
            'type'=>$request->type,
            'user_id'=>$request->user_id
        ]);
        return redirect()->route('Straples.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\straples  $straples
     * @return \Illuminate\Http\Response
     */
    public function show(straples $straples)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\straples  $straples
     * @return \Illuminate\Http\Response
     */
    public function edit(straples $straples)
    {
        //
    }


    public function update(Request $request, $id)
    {
        DB::table('straples')->where('id',$id)->update([
            'number'=>$request->number,
            'type'=>$request->type,
            'user_id'=>$request->user_id
        ]);
        return redirect()->route('Straples.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\straples  $straples
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('straples')->where('id',$id)->delete();
        return back();
    }
}

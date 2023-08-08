<?php

namespace App\Http\Controllers;

use App\Models\buy;
use Illuminate\Support\Facades\DB;
use App\Models\porter;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $buy=buy::all();
        $porter=porter::all();
        return view('buys',compact('buy','porter'));
    }
    public function create(Request $request)
    {
        if($request->password=="1234512345")
        DB::table('buys')->delete();
    return back();
    }


    public function store(Request $request)
    {

        $buy=buy::create([
            'proter_id'=>$request->proter_id,
        ]);
        return back();
    }

    public function show(buy $buy)
    {
        //
    }


    public function edit(buy $buy)
    {
        //
    }


    public function update(Request $request, buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        buy::find($id)->delete();
        return back();
    }
}

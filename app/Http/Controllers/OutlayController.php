<?php

namespace App\Http\Controllers;

use App\Models\outlay;
use App\Models\User;
use App\Models\worker;
use Illuminate\Http\Request;

class OutlayController extends Controller
{

    public function index()
    {
        $outlay=outlay::all();
        $user=worker::where('role',2)->get();
        $worker=worker::where('role',1)->get();
        return view('outlay',compact('outlay','user','worker'));

    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {

        outlay::create([
            'note'=>$request->note,
            'price'=>$request->price,
            'user_id'=>$request->user_id,
            'worker_id'=>$request->worker_id,
        ]);
        return redirect()->route('Outlay.index');
    }

    public function show(outlay $outlay)
    {
        //
    }

    public function edit(outlay $outlay)
    {
        //
    }

    public function update(Request $request, outlay $outlay)
    {
        //
    }

    public function destroy($id)
    {
        outlay::find($id)->delete();
        return back();
    }
}

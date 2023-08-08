<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $workers=DB::table('workers')->where('role',2)->get();
        return view('owner_straples',compact('workers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('owner_straples');
    }


    public function show(sale $sale)
    {
        //
    }


    public function edit(sale $sale)
    {
        //
    }


    public function update(Request $request,$id)
    {
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('owner_straples');
    }


    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return back();
    }

}

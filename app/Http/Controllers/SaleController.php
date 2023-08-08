<?php

namespace App\Http\Controllers;

use App\Models\sale;
use App\Models\porter;
use App\Models\straples;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SaleController extends Controller
{

    public function index()
    {
        
        $sale=sale::all();
        $straples=straples::all();


        $porter=porter::all();
        return view('sales',compact('sale','porter','straples'));

    }

    public function create(Request $request)
    {
        if($request->password=="1234512345")
            DB::table('sales')->delete();
        return back();
    }
   //1 -> 500 7000 كراجة
   // 501 -> 1500  4000 عرباية
   //-> addHours(3)
    public function store(Request $request)
    {

        $price=0;
        if($request->Borrow_Type=="يومي"){
        if($request->proter_id>0 && $request->proter_id<501){
            $price=7000;
        }
        else{

            $price=4000;
        }}
        if($request->Borrow_Type=="أسبوعي"){
            DB::table('straples')->where('id',$request->straple_id)->update(['borrowed'=>now()->addDay(7)]);
        }

        DB::table('sales')->insert([
            'Borrow_Type'=>$request->Borrow_Type,
            'proter_id'=>$request->proter_id,
            'straple_id'=>$request->straple_id,
            'price'=>$price,
            'created_at'=>date('y/m/d H:i:s')
        ]);
        return  back();
    }


    public function show(sale $sale)
    {
        //
    }


    public function edit(sale $sale)
    {

    }


    public function update(Request $request,$id)
    {
        DB::table('sales')->where('id',$id)->update([
            'straple_id'=>$request->straple_id,
            'proter_id'=>$request->proter_id,
            'Borrow_Type'=>$request->Borrow_Type
        ]);
        return redirect()->route('Sale.index');
    }


    public function destroy($id)
    {


    }
}

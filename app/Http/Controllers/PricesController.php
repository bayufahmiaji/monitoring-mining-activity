<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = Price::all();
        return view('monitoring.admin.price.index',compact('price'));
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
    public $error;
    public function store(Request $request)
    {
         $price = Price::all();
        if (count($price)) {
            foreach ($price as $price) {
                if($request->jenis == $price->jenis){
                      $error = true;
                      break;
                   }else{
                    $error = false;
                   }
            }
        }else{
            $error = false;
        }


        if ($error) {
            return back()->with('error','Data untuk '.$request->jenis.' Telah ada');
        }else{
            $price = Price::create($request->all());
            return back()->with('success','Data Berhasil Disimpan');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $price = Price::find($price)->update($request->all());
        return back()->with('success','Data Berhsail Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete($price);
        return back()->with('success','Data Berhsail Dihapus');

    }
}

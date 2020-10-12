<?php

namespace App\Http\Controllers;

use App\Overburden;
use App\Location;
use App\Company;
use App\Price;
use Auth;
use Illuminate\Http\Request;

class OverburdensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "admin"){
            $overburden = Overburden::all();
            return view('monitoring.admin.pengupasan.index',compact('overburden'));
         }else{
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
            $price = Price::where('jenis','LIKE','%Pengupasan%')->first();   
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $asu = $location;
            $overburden = Overburden::where('id_company','=',auth()->user()->id_company)->whereYear('date','=',2020)->get();
            return view('monitoring.user.pengupasan.index',compact('overburden','location','company','asu','price'));
         }
       
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
        $overburden = Overburden::where('id_company','=',auth()->user()->id_company)->get();
        if (count($overburden)) {
            foreach ($overburden as $overburden) {
                if($request->lokasi == $overburden->lokasi && $request->date == $overburden->date->format('Y-m-d')){
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
            return back()->with('error','Data untuk '.$request->lokasi.' untuk tanggal '.$request->date.' Telah ada');
        }else{
                $over = new Overburden();
                $over->id_company = $request->id_company;
                $over->biaya = $request->biaya;
                $over->bcm = $request->bcm;
                $over->date = $request->date;
                $over->lokasi = $request->lokasi;
                $over->company = $request->company;
                $over->jenis = $request->jenis;
                $over->save();

                return back()->with('success','Data Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Overburden  $overburden
     * @return \Illuminate\Http\Response
     */
    public function show(Overburden $overburden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Overburden  $overburden
     * @return \Illuminate\Http\Response
     */
    public function edit(Overburden $overburden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Overburden  $overburden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $over = Overburden::find($request->id);
        $over->id_company = $request->id_company;
        $over->biaya = $request->biaya;
        $over->bcm = $request->bcm;
        $over->date = $request->date;
        $over->lokasi = $request->lokasi;
        $over->company = $request->company;
        $over->jenis = $request->jenis;
        $over->update();

        return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Overburden  $overburden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overburden $overburden)
    {
        $overburden->delete($overburden);
        return back()->with('success','Data Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exavation;
use App\Location;
use App\Company;
use App\Price;
use Auth;
use Illuminate\Http\Request;

class ExavationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "admin"){
            $exavation = Exavation::all();

            return view('monitoring.admin.penggalian.indax',compact('exavation'));
         }else{
            
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
            $price = Price::where('jenis','LIKE','%Penggalian%')->first();   
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $asu = $location;
            $exavation = Exavation::where('id_company','=',auth()->user()->id_company)->get();;

            return view('monitoring.user.penggalian.index',compact('exavation','location','company','asu','price'));  
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

         $overburden = Exavation::where('id_company','=',auth()->user()->id_company)->get();
         if (count($overburden)) {
            foreach ($overburden as $overburden) {
                if($request->lokasi == $overburden->lokasi && $request->date == $overburden->date->format('Y-m-d')){
                      $error = true;
                      break;
                   }else{
                    $error = false;
                   }
            }
         }else {
             $error = false;
         }

         if ($error) {
            return back()->with('error','Data untuk '.$request->lokasi.' untuk tanggal '.$request->date.' Telah ada');
        }else{
        $exa = new Exavation();
            $exa->id_company = $request->id_company;
            $exa->biaya = $request->biaya;
            $exa->jumlah = $request->jumlah;
            $exa->date = $request->date;
            $exa->lokasi = $request->lokasi;
            $exa->hasil = $request->hasil;
            $exa->company = $request->company;
            $exa->jenis = $request->jenis;
            $exa->save();

            return back()->with('success','Data Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exavation  $exavation
     * @return \Illuminate\Http\Response
     */
    public function show(Exavation $exavation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exavation  $exavation
     * @return \Illuminate\Http\Response
     */
    public function edit(Exavation $exavation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exavation  $exavation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $exa = Exavation::find($request->id);
            $exa->id_company = $request->id_company;
            $exa->biaya = $request->biaya;
            $exa->jumlah = $request->jumlah;
            $exa->date = $request->date;
            $exa->lokasi = $request->lokasi;
            $exa->hasil = $request->hasil;
            $exa->company = $request->company;
            $exa->jenis = $request->jenis;
        $exa->update();

        return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exavation  $exavation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exavation $exavation)
    {
        $exavation->delete($exavation);
        return back()->with('success','Data Berhasil dihapus');
    }
}

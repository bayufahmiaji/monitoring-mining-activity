<?php

namespace App\Http\Controllers;

use App\Transport;
use App\Location;
use App\Company;
use App\Price;
use Auth;
use Illuminate\Http\Request;

class TransportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->role == "admin"){
           
         }else{
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
            $price = Price::where('jenis','LIKE','%Penggalian%')->first();   
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $asu = $location;
            $transport = Transport::where('id_company','=',auth()->user()->id_company)->get();;

            return view('monitoring.user.pengangkutan.index',compact('transport','location','company','asu','price'));
           
         }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $overburden = Transport::where('id_company','=',auth()->user()->id_company)->get();
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
            $trans = new Transport();
            $trans->id_company = $request->id_company;
            $trans->biaya = $request->biaya;
            $trans->jumlah = $request->jumlah;
            $trans->jarak = $request->jarak;
            $trans->date = $request->date;
            $trans->lokasi = $request->lokasi;
            $trans->company = $request->company;
            $trans->jenis = $request->jenis;
            $trans->save();

            return back()->with('success','Data Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        $trans = Transport::find($request->id);
            $trans->id_company = $request->id_company;
            $trans->biaya = $request->biaya;
            $trans->jumlah = $request->jumlah;
            $trans->jarak = $request->jarak;
            $trans->date = $request->date;
            $trans->lokasi = $request->lokasi;
            $trans->company = $request->company;
            $trans->jenis = $request->jenis;
        $trans->update();

        return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        $transport->delete($transport);
        return back()->with('success','Data Berhasil dihapus');
    }
}

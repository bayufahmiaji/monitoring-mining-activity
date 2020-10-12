<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Company;
use App\Location;
use Auth;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Auth::user()->role == "admin"){
            return view('monitoring.404');
         }else{
            
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $asu = $location;
            $equipment = Equipment::where('id_company','=',auth()->user()->id_company)->get();

            return view('monitoring.user.alat.index',compact('equipment','company','location','asu'));  
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
    public function store(Request $request)
    {
        $alat = Equipment::create($request->all());
        return back()->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $equipment = Equipment::find($request->id)->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,]);
        return back()->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete($equipment);
        return redirect('/alat')->with('success','Data Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Company;
use App\Location;
use Auth;
use Illuminate\Http\Request;

class AccidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "admin"){
            $overburden = Accident::all();
            return view('monitoring.admin.kecelakaan.index',compact('accident'));
         }else{
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
          
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $asu = $location;
            $accident = Accident::where('id_company','=',auth()->user()->id_company)->get();
            return view('monitoring.user.kecelakaan.index',compact('accident','location','company','asu'));
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
        $acc = Accident::create($request->all());
        return back()->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $accident = Accident::find($request->id)->update($request->all());
         return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        $accident = Accident::delete($accident);
        return back()->with('success','Data Berhasil Dihapu');
    }
}

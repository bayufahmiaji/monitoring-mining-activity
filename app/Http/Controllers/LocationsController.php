<?php

namespace App\Http\Controllers;

use App\Location;
use App\Company;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::where('id_company','=',auth()->user()->id_company)->get();
        $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   

       return view('monitoring.user.project.lokasi.index',compact('location','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
         return view('monitoring.user.project.lokasi.add',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = Location::create($request->all());
        return redirect('/lokasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $locations)
    {
        $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   

        return view('monitoring.user.project.lokasi.edit',compact('locations','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locations = Location::find($id)->update($request->all());
        return redirect('/lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locations $locations)
    {
         $locations->delete($locations);
        return redirect('/lokasi');
    }
}

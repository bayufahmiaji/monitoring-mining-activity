<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Company;

class LocationController extends Controller
{
    public function edit(Location $location){
    	   $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();   
        return view('monitoring.user.project.lokasi.edit',compact('location','company'));
    }
    
     public function update(Request $request, Locations $locations)
    {
        $location = Location::update($request->all());
        return redirect('/lokasi');
    }
    public function destroy(Location $location)
    {
        $location->delete($location);
        return redirect('/lokasi');
    }

}

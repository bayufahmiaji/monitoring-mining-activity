<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Locations extends Controller
{
    public function update(Request $request, Locations $locations)
    {
        $location = Location::update($request->all());
        return redirect('/lokasi');
    }
}

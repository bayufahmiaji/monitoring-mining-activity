<?php

namespace App\Http\Controllers;

use App\Turnover;
use App\Company;
use Illuminate\Http\Request;

class TurnoversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
        return view('monitoring.user.penjualan.index',compact('company'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turnover  $turnover
     * @return \Illuminate\Http\Response
     */
    public function show(Turnover $turnover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turnover  $turnover
     * @return \Illuminate\Http\Response
     */
    public function edit(Turnover $turnover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turnover  $turnover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turnover $turnover)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turnover  $turnover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turnover $turnover)
    {
        //
    }
}

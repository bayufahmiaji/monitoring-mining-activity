<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monitoring.admin.login');
    }
     public function logout()
    {
       Auth::logout();
       return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoring.admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if($request->company == "Puslitbang TekMIRA"){
        $company =  $request->company;
        $id_company = 0; 
    }else{
        $company = Company::select('nama')->where('id','=',$request->company)->get(); 
        $id_company =  $request->company;
    }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'id_company' => $id_company,
            'password' => $request->password,

        ]);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('monitoring.admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete($user);
        return back();
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }else{
            return redirect('/login')->with('gagal','Password atau Username Salah');
        }    
    }
    
}

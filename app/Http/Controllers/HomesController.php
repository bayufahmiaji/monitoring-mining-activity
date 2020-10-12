<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Company;
use App\Equipment;
use App\Location;
use App\Worker;
use App\Accident;
use App\User;
use App\Mail;
use App\News;

class HomesController extends Controller
{

    public function home(){
        if(Auth::user()->role == "admin"){
            $cloc = Location::all()->count();
            $location = Location::all();
            $cp = Company::all()->count();
            $cu = User::all()->count();
            $cm = Mail::where('receiver','LIKE',auth()->user()->email)->Where('status','LIKE','not_read')->count();
            return view('monitoring.admin.index',compact('location','cloc','cp','cu','cm'));
         }else{
            $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
            $location = Location::where('id_company','=',auth()->user()->id_company)->get();
            $locations = Location::where('id_company','=',auth()->user()->id_company)->count();
            $worker = Worker::where('id_company','=',auth()->user()->id_company)->count();
            $accident = Accident::where('id_company','=',auth()->user()->id_company)->count();
            $equipment = Equipment::where('id_company','=',auth()->user()->id_company)->count();

            return view('monitoring.user.index',compact('company','location','locations','worker','accident','equipment')); 
         }
    }
}

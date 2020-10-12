<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Company;
use Illuminate\Http\Request;
use Auth;

class MailController extends Controller
{
   

    public function inbox(){
            $mail = Mail::where('receiver','LIKE',auth()->user()->email)->orderBy('created_at','DESC')->get();
         if(Auth::user()->role == "admin"){
            return view('monitoring.admin.mail.inbox',compact('mail'));
         }else{
               $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
          
            return view('monitoring.user.mail.inbox',compact('mail','company'));
         }
    }
    public function compose(){
        if(Auth::user()->role == "admin"){
            return view('monitoring.admin.mail.compose');
          }else{
               $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
            return view('monitoring.user.mail.compose',compact('company'));
         }
    }

    public function sent(){
        $mail = Mail::where('sender','LIKE',auth()->user()->email)->orderBy('created_at','DESC')->get();
        if(Auth::user()->role == "admin"){
            return view('monitoring.admin.mail.sent',compact('mail'));
         }else{
               $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
            return view('monitoring.user.mail.sent',compact('mail','company'));
         }
    }

    public function show(Mail $mail){
        $mail = Mail::find($mail->id);
        $mail->status = "Read";
        $mail->update();
        if(Auth::user()->role == "admin"){
            return view('monitoring.admin.mail.view',compact('mail'));
         }else{
               $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
            return view('monitoring.user.mail.view',compact('mail','company'));
         }
    }

    public function store(Request $request)
    {
        $mail = Mail::create($request->all());
        return redirect('/mail_sent');
    }
    public function stores(Request $request)
    {
        $mail = Mail::create($request->all());
        return redirect('/mail_sent');
}
    public function destroy(Mail $mail){
        $mail = Mail::find($mail)->first();
        $mail->receiver = "";
        $mail->update();
        return back();
    }

}

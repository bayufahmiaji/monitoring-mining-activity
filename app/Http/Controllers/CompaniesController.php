<?php

namespace App\Http\Controllers;

use App\Company;
use App\Location;
use App\Worker;
use App\Equipment;
use App\Accident;
use App\Overburden;
use App\Transport;
use App\Exavation;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "admin"){
            $company = Company::all();
            return view('monitoring.admin.company.index',compact('company'));
         }else{

            return view('monitoring.404');
           
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoring.admin.company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
             'nama' => 'required',
        ]);
   

        $image = $request->file('image');
        $nama_file = $image->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/uploads/logo';
        $tujuan_upload2 = 'assets/uploads/user';
        
        $image->move($tujuan_upload,$nama_file);

        $company = new Company();
            $company->nama = $request->nama;
            $company->pemegangsaham = $request->pemegangsaham;
            $company->jperizinan = $request->jperizinan;
            $company->tkontrak = $request->tkontrak;
            $company->email = $request->email;
            $company->alamat = $request->alamat;
            $company->galian = $request->galian;
            $company->photo = $nama_file;
     $company->save();
        
        User::create([
            'name' => $request->nama,
            'id_company' => $company->id,
            'email' => $request->email,
            'role' => "user",
            'password' => $request->password,

        ]);

        return redirect ('/perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {   
        $location = Location::where('id_company','=',$company->id)->count();
        $worker = Worker::where('id_company','=',$company->id)->count();
        $equipment = Equipment::where('id_company','=',$company->id)->count();
        $accident = Accident::where('id_company','=',$company->id)->count();
        return view('monitoring.admin.company.detail',compact('company','location','worker','equipment','accident'));
    }

    public function shows(Company $company)
    {   
        $location = Location::where('id_company','=',$company->id)->get();
      
        $overburden = Overburden::where('id_company','=',$company->id)->get();
        $exavation = Exavation::where('id_company','=',$company->id)->get();
        $transport = Transport::where('id_company','=',$company->id)->get();
        return view('monitoring.admin.company.details',compact('location','overburden','exavation','transport','company'));
    }
    
    public function lokasi(Company $company)
    {
         $location = Location::where('id_company','=',$company->id)->get();
        return view('monitoring.admin.lokasi',compact('company','location'));
    }
     public function equipment(Company $company)
    {
         $equipment = Equipment::where('id_company','=',$company->id)->get();
        return view('monitoring.admin.alat.index',compact('company','equipment'));
    }
    public function pegawai(Company $company)
    {
         $worker = Worker::where('id_company','=',$company->id)->get();
         $indo = Worker::where('id_company','=',$company->id)->where('kewarganegaraan','Like','%Indonesia%')->count();
         $luars = Worker::where('id_company','=',$company->id)->count();
         $luar = $luars-$indo;
        return view('monitoring.admin.pegawai.index',compact('company','worker','indo','luar'));
    }
    public function kecelakaan(Company $company)
    {
         $accident = Accident::where('id_company','=',$company->id)->get();
        return view('monitoring.admin.kecelakaan.index',compact('company','accident'));
    }
     public function Produksi(Company $company)
    {
         $exavation = Exavation::where('id_company','=',$company->id)->get();
         $overburden = Overburden::where('id_company','=',$company->id)->get();
         $transport = Transport::where('id_company','=',$company->id)->get();
         $transports = $transport;
         $overburdens = $overburden;
         $exavations = $exavation;
        return view('monitoring.admin.produksi.index',compact('company','exavation','overburden',
            'transport','overburdens','exavations','transports'));
    }

    public function biaya(Company $company)
    {
         $exavation = Exavation::where('id_company','=',$company->id)->get();
         $overburden = Overburden::where('id_company','=',$company->id)->get();
         $transport = Transport::where('id_company','=',$company->id)->get();
         $transports = Transport::where('id_company','=',$company->id)->sum('biaya');
         $overburdens = Overburden::where('id_company','=',$company->id)->sum('biaya');
         $exavations = Exavation::where('id_company','=',$company->id)->sum('biaya');
        return view('monitoring.admin.produksi.biaya',compact('company','exavation','overburden',
            'transport','overburdens','exavations','transports'));
    }

    public function biayas()
    {
        $company = Company::select('id','nama','photo')->where('id','=',auth()->user()->id_company)->get();
         $exavation = Exavation::where('id_company','=',auth()->user()->id_company)->get();
         $overburden = Overburden::where('id_company','=',auth()->user()->id_company)->get();
         $transport = Transport::where('id_company','=',auth()->user()->id_company)->get();
         $transports = Transport::where('id_company','=',auth()->user()->id_company)->sum('biaya');
         $overburdens = Overburden::where('id_company','=',auth()->user()->id_company)->sum('biaya');
         $exavations = Exavation::where('id_company','=',auth()->user()->id_company)->sum('biaya');
        return view('monitoring.user.biaya',compact('company','exavation','overburden',
            'transport','overburdens','exavations','transports','company'));
    }

    public function ptambang()
    {
        $now = \Carbon\Carbon::now();
        $month = $now->format('m');
        $year = $now->format('Y');
         $company = Location::orderBy('company','ASC')->get();
         $exavation = Exavation::whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
         $overburden = Overburden::whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
         $transport = Transport::whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
         $transports = $transport;
         $overburdens = $overburden;
         $exavations = $exavation;
         $companys = $company;
         $companyst = $company;
        return view('monitoring.admin.produksi.produksi',compact('company','exavation','overburden',
            'transport','overburdens','exavations','transports','companys','companyst','now','month','year'));
    }
     public function ptambangs(Request $request)
    {
        $lokasi = $request->lokasi;
        $month = $request->bulan;
        $year = $request->tahun;
        $id = $request->company_id;
        $company = Company::where('id','=',$id)->first();
          $location = Location::where('id_company','=',$id)->get();
         $exavation = Exavation::where('id_company','=',$id)->where('lokasi','LIKE',$lokasi)->whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
         $overburden = Overburden::where('id_company','=',$id)->where('lokasi','LIKE',$lokasi)->whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
         $transport = Transport::where('id_company','=',$id)->where('lokasi','LIKE',$lokasi)->whereYear('date','=',$year)->whereMonth('date','=',$month)->get();
        return view('monitoring.admin.company.details',compact('exavation','overburden',
            'transport','company','location','month','lokasi','year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view ('monitoring.admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete($company);
        return back();
    }
}

@extends('layouts.monitoring.user.app')
@section('title')
		@foreach($company as $company) 
	{{$company->nama}}
@endsection
@section('nav')
	<h4>
		<img src="{{ url('/assets/uploads/logo/'.$company -> photo) }}" class="admin_img" style="width: 35px;" alt="logo"> 
		{{$company->nama}}</h4>
		@endforeach
@stop
@section('header_styles')
   <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
    <!--End of page level styles-->
@stop


    
@section('content')
<header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-home"></i>
                        Company List
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
    <div class="outer">
        <a href="/perusahaan/add" class="btn btn-primary">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Add Company
        </a>
    </div>
    <div class="outer">
        <table id="example1" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>Pem Saham</th>
                    <th>Perizinan</th>
                    <th>Kontrak</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Pekerja</th>
                    <th>Galian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
       
                <tr>
                    <td><a href="/user/{{$company->id}}/show" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="/user/{{$company->id}}/edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/user/{{$company->id}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>Pem Saham</th>
                    <th>Perizinan</th>
                    <th>Kontrak</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Pekerja</th>
                    <th>Galian</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endsection                
@section('footer_scripts')
   <!--plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/dataTables.tableTools.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
    <!-- end of global scripts-->
@stop


@extends('layouts.monitoring.admin.app')
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
                        Pegawai Tambang
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
    <div class="outer">
    <strong>
    <table>
      <tr>
        <td>Total</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>   {{$luar+$indo}} Orang</td>
      </tr>
      <tr>
        <td>Indonesia</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>  {{$indo}} Orang</td>
      </tr>
      <tr>
        <td>Asing</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>  {{$luar}} Orang</td>
      </tr>
    </table>
    </strong>
    </div>
   <div class="outer">
    <table table id="example3" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>Lokasi Tambang</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($worker as $worker)
                <tr>
                    <td>{{$worker->company}}</td>
                    <td>{{$worker->nama}}</td>
                    <td>{{$worker->alamat}}</td>
                    <td>{{$worker->lokasi}}</td>
                    <td>{{$worker->kewarganegaraan}}</td>
                     <td
                     @if($worker->status == "Aktif") 
                     class="bg-success"
                     @else
                    class="bg-danger"
                     @endif
                     >{{$worker->status}}</td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Perusahaan</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>Lokasi Tambang</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>                
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Button trigger modal -->

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

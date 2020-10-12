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
@stop
 
@section('content')
<header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-home"></i>
                        Pengupasan Tambang
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
   <div class="outer">
        <table id="example1" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>Bank Cubik Metre</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Biaya Produksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($overburden as $overburden)
                <tr>
                    <td>{{$overburden->bcm}}</td>
                    <td>{{$overburden->lokasi}}</td>
                    <td>{{$overburden->date}}</td>
                    <td>$ {{$overburden->biaya}}</td>
                    <td><a href="/overburden/{{$overburden->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="/overburden/{{$overburden->id}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Block Per Meter</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Biaya Produksi</th>
                    <th>Action</th>                
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

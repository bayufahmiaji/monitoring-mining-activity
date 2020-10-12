@extends('layouts.monitoring.admin.app')
@section('title')
Puslitbang| Monitoring Pertambangan
@stop
@section('header_styles')
    <!-- global styles-->
 <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
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
                <div class="col-lg-6 col-sm-4 skin_txt">
                    <h4 class="nav_top_align">
                        <i class="fa fa-anchor"></i> Produksi Tambang
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" id="tabs">
                            <ul class="nav nav-tabs m-t-35">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#fa-icons" data-toggle="tab">Pengupasan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#themify-icons" data-toggle="tab">Pengangkutan</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#ionicons" data-toggle="tab">Penggalian</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content">
                                <div  class="tab-pane active" id="fa-icons">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-box">
                                                 <table id="example1" class="display table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Lokasi</th>
                                                        <th>Jumlah</th>
                                                        <th>Jarak</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transports as $transport)
                                                    <tr>
                                                        <td>{{$transport->company}}</td>
                                                        <td>{{$transport->lokasi}}</td>
                                                        <td>{{$transport->jumlah}}</td>
                                                        <td>{{$transport->jarak}}</td>
                                                        <td>{{$transport->date->format('M Y')}}</td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Lokasi</th>
                                                        <th>Jumlah</th>
                                                        <th>Jarak</th>
                                                        <th>Tanggal</th>                
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div id="line_top_x"></div>
                                            </div>  

                                        </div>
                                    </div>
                                </div>
                                <div  class="tab-pane" id="themify-icons">
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <table id="example2" class="display table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Lokasi</th>
                                                        <th>Bank Cubik Metre</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($overburdens as $overburden)
                                                    <tr>
                                                        <td>{{$overburden->company}}</td>
                                                        <td>{{$overburden->lokasi}}</td>
                                                        <td>{{$overburden->bcm}} BCM</td>
                                                        <td>{{$overburden->date->format('M Y')}}</td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Lokasi</th>
                                                        <th>Bank Cubik Meter</th>
                                                        <th>Tanggal</th>                
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="tab-pane" id="ionicons">
                                    <div class="row">
                                        <div class="col-12">
                                                     <div class="card-box">
                                                       <table id="example3" class="display table table-stripped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Perusahaan</th>
                                                                <th>Lokasi</th>
                                                                <th>Hasil</th>
                                                                <th>Jumlah</th>
                                                                <th>Tanggal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($exavations as $exavation)
                                                            <tr>
                                                                <td>{{$exavation->company}}</td>
                                                                <td>{{$exavation->lokasi}}</td>
                                                                <td>{{$exavation->hasil}}</td>
                                                                <td>{{$exavation->jumlah}} Ton</td>
                                                                <td>{{$exavation->date->format('M Y')}}</td>
                                                            </tr>
                                                           @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Perusahaan</th>
                                                                <th>Lokasi</th>
                                                                <th>Hasil</th>
                                                                <th>Jumlah</th>
                                                                <th>Tanggal</th>               
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    </div>
                                                </div> <!-- End row -->
                                            </div><!-- end panel-body -->
                                        </div> <!-- col-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
@stop
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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
    <!-- end of global scripts-->
    

@stop
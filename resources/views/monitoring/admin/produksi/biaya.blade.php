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
                        <i class="fa fa-money"></i> Biaya Produksi Tambang
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
                            <div class="tab-content">
                                <br>
                                <div style="text-align: left">
                                    <strong>
                                    <table>
                                        <tr>
                                            <td>Jumlah Biaya Produksi <br>
                                                Jumlah Biaya Pengupasan <br>
                                                Jumlah Biaya Penggalian <br>
                                                Jumlah Biaya Pengangkutan 
                                            </td>
                                            <td> : <br>
                                                 : <br>
                                                 : <br>
                                                 : 
                                             </td>
                                            <td>$ {{$transports+$exavations+$overburdens}} <br>
                                                $ {{$overburdens}} <br>
                                                $ {{$exavations}} <br>
                                                $ {{$transports}}
                                                </td>
                                            <td rowspan="4"> <div id="piechart" style="width: 900px; height: 500px;"></div>
                                            </td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                    </table>
                                    </strong>
                                </div>
                                <br>
                                <div  class="tab-pane active" id="all">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-box">
                                                 <table table id="example3" class="display table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Jenis</th>
                                                        <th>Lokasi</th>
                                                        <th>Biaya</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transport as $transport)
                                                    <tr>
                                                        <td>{{$transport->company}}</td>
                                                        <td>{{$transport->jenis}}</td>
                                                        <td>{{$transport->lokasi}}</td>
                                                        <td>${{$transport->biaya}}</td>
                                                        <td>{{$transport->date->format('M Y')}}</td>
                                                    </tr>
                                                   @endforeach
                                                   @foreach($overburden as $overburden)
                                                    <tr>
                                                        <td>{{$overburden->company}}</td>
                                                        <td>{{$overburden->jenis}}</td>
                                                        <td>{{$overburden->lokasi}}</td>
                                                        <td>${{$overburden->biaya}}</td>
                                                        <td>{{$overburden->date->format('M Y')}}</td>
                                                    </tr>
                                                   @endforeach
                                                   @foreach($exavation as $exavation)
                                                    <tr>
                                                        <td>{{$exavation->company}}</td>
                                                        <td>{{$exavation->jenis}}</td>
                                                        <td>{{$exavation->lokasi}}</td>
                                                        <td>${{$exavation->biaya}}</td>
                                                        <td>{{$exavation->date->format('M Y')}}</td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                        <th>Jenis</th>
                                                        <th>Lokasi</th>
                                                        <th>Biaya</th>
                                                        <th>Tanggal</th>                
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
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
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produksi Tambang', 'Jumlah'],
          ['Pengupasan',      {{$overburdens}}],
          ['Pengangkutan',       {{$transports}}],
          ['Penggalian',  {{$exavations}}]
        ]);

        var options = {
          title: 'Biaya Produksi Tambang'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@stop
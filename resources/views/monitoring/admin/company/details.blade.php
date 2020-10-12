@extends('layouts.monitoring.admin.app')
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/chartist/css/chartist.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/circliful/css/jquery.circliful.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/index.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
    <!-- end of page level styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/widgets.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
@stop
@section('content')
   
<div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card box">
                    <center>  
                    <br>  
                    <table>
                        <tr>
                            <td><img width="150px" height="150px" src="{{ url('/assets/uploads/logo/'.$company -> photo) }}"></td>
                            <td><strong><h2>{{$company->nama}}</h2></strong></td>
                        </tr>
                    </table>
                    <br>  
                    </center>
                </div>
            </div>
        </div> 
</div>
<div class="outer">
    <div class="inner bg-container">
          <div class="card">
                <div class="card box">
                    <br>
                    <div class="container">
                        
                       <form method="post" action="/ptambang/show">
                             {{csrf_field()}}
                             <input type="hidden" name="company_id" value="{{$company->id}}">
                             <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Lokasi</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="lokasi">
                                       @foreach($location as $location)
                                       <option>{{$location->nama}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="message-text" class="col-form-label">Bulan</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="bulan">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="message-text" class="col-form-label">Tahun</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="tahun">
                                    <?php 
                                      $year = date('Y');
                                      $min = $year - 60;
                                      $max = $year;
                                      for( $i=$max; $i>=$min; $i-- ) {
                                        echo '<option value='.$i.'>'.$i.'</option>';
                                      }
                                    ?>
                                    </select>
                                </div>
                                <div  class="col-md-1 mb-3">
                                    <label for="message-text" class="col-form-label">Cari</label>
                                    <button type="submit" value="search" class="form-control btn btn-primary">Cari</button>
                                </div>
                          </div>
                        </form>
                    </div>
                <br>
             </div>
         </div>
    </div>
</div>
<div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    <i class="fa fa-table"></i>Pengupasan
                </div>
                <div class="card-body p-t-25">
                    <div class="">
                        <div class="pull-sm-right">
                            <div class="tools pull-sm-right"></div>
                        </div>
                    </div>
                    <table class="table  table-bordered table-hover" id="table1">
                   <thead>
                        <tr>
                            <th>Lokasi</th>
                            <th>Bank Cubik Metre</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($overburden))
                        @foreach($overburden as $overburden)
                        <tr>
                            <td>{{$overburden->lokasi}}</td>
                            <td>{{$overburden->bcm}} BCM</td>
                            <td>{{$overburden->date->format('M Y')}}</td>
                        </tr>
                       @endforeach
                       @else
                        <tr>
                            <td colspan="3" style="text-align: center;"><STRONG> DATA NOT AVAILABLE </STRONG></td>
                        </tr>
                       @endif
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    <i class="fa fa-table"></i> Penggalian
                </div>
                <div class="card-body p-t-25">
                    <div class="">
                        <div class="pull-sm-right">
                            <div class="tools pull-sm-right"></div>
                        </div>
                    </div>
                    <table class="table  table-bordered table-hover">
                       <thead>
                        <tr>
                            <th>Lokasi</th>
                            <th>Hasil</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                         @if(count($exavation))
                        @foreach($exavation as $exavation)
                        <tr>
                            <td>{{$exavation->lokasi}}</td>
                            <td>{{$exavation->hasil}}</td>
                            <td>{{$exavation->jumlah}} TON</td>
                            <td>{{$exavation->date->format('M Y')}}</td>
                        </tr>
                       @endforeach
                       @else
                        <tr>
                            <td colspan="4" style="text-align: center;"><STRONG> DATA NOT AVAILABLE </STRONG></td>
                        </tr>
                       @endif
                    </tbody>
                    <tfoot>
                    </table>
                </div>
        </div>
    </div>
</div>
<div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    <i class="fa fa-table"></i>Pengangkutan
                </div>
                <div class="card-body p-t-25">
                    <div class="">
                        <div class="pull-sm-right">
                            <div class="tools pull-sm-right"></div>
                        </div>
                    </div>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Lokasi</th>
                                <th>Jumlah</th>
                                <th>Jarak</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                             @if(count($transport))
                            @foreach($transport as $transport)
                            <tr>
                                <td>{{$transport->lokasi}}</td>
                                <td>{{$transport->jumlah}} TON</td>
                                <td>{{$transport->jarak}} KM</td>
                                <td>{{$transport->date->format('M Y')}}</td>
                            </tr>
                           @endforeach
                           @else
                            <tr>
                                <td colspan="4" style="text-align: center;"><STRONG> DATA NOT AVAILABLE </STRONG></td>
                            </tr>
                           @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<div class="container">
    <button  class="btn btn-primary  col-sm-12" data-toggle="modal" data-target="#exampleModal" data-company="{{$company->email}}">Message</button>
</div>
 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="card-body m-t-35">
            <form action="/sendmail2" method="post">
                {{csrf_field()}}
                <input type="hidden" name="sender" value="{{auth()->user()->email}}">
                <input type="hidden" name="id_sender" value="{{auth()->user()->id}}">
                <input type="hidden" name="status" value="not_read">
                <div class="form-group">
                    <input type="input" class="form-control" placeholder="To *" name="receiver" required value="{{$company->email}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control m-t-25" placeholder="Subject *" required name="subject">
                </div>
                <div class="form-group mail_compose_wysi">
                    <textarea class="wysihtml5 form-control m-t-20" name="message" required></textarea>
                </div>
                <div class="form-group m-t-20">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Send</button>
                    <button type="reset" class="btn btn-warning"><i class="fa fa-reply"></i> Reset</button>
                    
                </div>
            </form>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@stop
@section('footer_scripts')
    <!--  plugin scripts -->
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/calendarcustom.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/calendar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flip/js/jquery.flip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jquery.sparkline.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/chartist/js/chartist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/chartist-tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/circliful/js/jquery.circliful.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/js/pages/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/widget2.js')}}"></script>
    <!--end of plugin scripts-->

    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    
    
@stop
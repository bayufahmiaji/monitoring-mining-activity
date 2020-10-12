@extends('layouts.monitoring.admin.app')
@section('title')
Puslitbang | Monitoring Pertambangan
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/mail_box.css')}}"/>
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
     @if (\Session::has('suceess'))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sukses!! {{ \Session::get('suceess') }}</strong>
      </div>
     @endif
    <div class="container">
        <form method="post" action="/ptambang/show">
             {{csrf_field()}}

             <div class="form-row">
                <div class="col-md-5 mb-3">
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
                <div class="col-md-5 mb-3">
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
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-white">
                            Produksi Tambang Bulan {{$month}} {{$year}}
                        </div>
                        <div class="card-body" id="tabs">
                            <ul class="nav nav-tabs m-t-35">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#fa-icons" data-toggle="tab">Pengangkutan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#themify-icons" data-toggle="tab">Pengupasan</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#ionicons" data-toggle="tab">Penggalian</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div  class="tab-pane active" id="fa-icons">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-box">
                                                <br>
                                                 <table id="example1" class="display table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                         <th>Lokasi</th>
                                                        <th>Data</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($company as $company)
                                                    <tr>
                                                        <td>{{$company->company}}</td>
                                                         <td>{{$company->nama}}</td>
                                                        @if(count($transports))
                                                            @foreach($transports as $transport)
                                                                <td>
                                                                @if($transport->company == $company->company && $transport->lokasi == $company->nama)
                                                                  <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                                                @else
                                                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                                                                 </td>
                                                                
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <td>
                                                            </td>  
                                                       
                                                        @endif
                                                        <td>
                                                          <button  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-company="{{$company->email}}">Message</button>
                                                        </td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>

                                                    <tr>
                                                        <th>Perusahaan</th>
                                                         <th>Lokasi</th>
                                                        <th>Data</th>
                                                        <th>Action</th>               
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div  class="tab-pane" id="themify-icons">
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <br>
                                           <table id="example1" class="display table table-stripped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                         <th>Lokasi</th>
                                                        <th>Data</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($companys as $company)
                                                    <tr>
                                                        <td>{{$company->company}}</td>
                                                         <td>{{$company->nama}}</td>
                                                         @if(count($overburdens))
                                                            @foreach($overburdens as $transport)
                                                            @if($transport->id_company == $company->id) 
                                                            <td>
                                                              <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                                            @else
                                                            </td>
                                                            <td>
                                                              <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                            </td>  
                                                            @endif
                                                            @endforeach
                                                         @else
                                                        <td>
                                                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                        </td>
                                                        @endif
                                                        <td>
                                                          <button  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-company="{{$company->email}}">Message</button>
                                                        </td>
                                                    </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Perusahaan</th>
                                                         <th>Lokasi</th>
                                                        <th>Data</th>
                                                        <th>Action</th>               
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
                                                        <br>
                                                           <table id="example1" class="display table table-stripped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                     <th>Lokasi</th>
                                                                    <th>Data</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($companyst as $company)
                                                                <tr>
                                                                    <td>{{$company->company}}</td>
                                                                     <td>{{$company->nama}}</td>
                                                                        @if(count($exavations))
                                                                            @foreach($exavations as $transport)
                                                                            @if($transport->id_company == $company->id) 
                                                                            <td>
                                                                              <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                                                            </td>
                                                                             @else
                                                                            <td>
                                                                              <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                                            </td>
                                                                            @endif
                                                                            @endforeach
                                                                        @else
                                                                        <td>
                                                                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                                        </td>
                                                                        @endif
                                                                    <td>
                                                                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-company="{{$company->email}}">Message</button>
                                                                    </td>
                                                                </tr>
                                                               @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                     <th>Lokasi</th>
                                                                    <th>Data</th>
                                                                    <th>Action</th>               
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
                    <input type="input" class="form-control" placeholder="To *" name="receiver" required id="company">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control m-t-25" placeholder="Subject *" required name="subject">
                </div>
                <div class="form-group mail_compose_wysi">
                    <textarea class="wysihtml5 form-control m-t-20" name="message"></textarea>
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
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/mail_box.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.dataTables.css')}}">
    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var company = button.data('company') 
        
        var modal = $(this)
        modal.find('.modal-body #company').val(company);
      
    })  
    </script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <!-- end of global scripts-->
@stop
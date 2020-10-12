@extends('layouts.monitoring.user.app')
@section('nav')
@foreach($company as $company)
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
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/inputlimiter/css/jquery.inputlimiter.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/daterangepicker/css/daterangepicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/j_timepicker/css/jquery.timepicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/clockpicker/css/jquery-clockpicker.css')}}" />
    <!-- end of plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/colorpicker_hack.css')}}" />
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
    <div class="container">
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sukses!! {{ \Session::get('success') }}</strong>
      </div>
     @endif
     @if (\Session::has('error'))
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Gagal!! {{ \Session::get('error') }}</strong>
      </div>
     @endif
    </div>
    <div class="outer">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
                <i class="fa fa-plus"></i>
            Tambah Pengupasan
        </button>
        
    </div>
    <div class="outer">
           <table table id="example3" class="display table table-stripped table-bordered">
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
                    <td>{{$overburden->bcm}} bcm</td>
                    <td>{{$overburden->lokasi}}</td>
                    <td>{{$overburden->date->format('M Y')}}</td>
                    <td>${{$overburden->biaya}}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-bcm="{{$overburden->bcm}}" data-lokasi="{{$overburden->lokasi}}" data-biaya="{{$overburden->biaya}}" data-date="{{$overburden->date}}" data-id="{{$overburden->id}}"> <i class="fa fa-edit"></i></button>
                    <a href="/overburden/{{$overburden->id}}/delete" class="btn btn-danger" onclick="return confirm('Delete Pengupasan?')"><i class="fa fa-trash"></i></a></td>
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


<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Hasil Tambang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/overburden/add" name="hitung">
          {{csrf_field()}}
          <input type="hidden" name="price" value="{{$price->harga}}" onchange="proses()">
        <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
        <input type="hidden" name="company" value="{{auth()->user()->name}}">
        <input type="hidden" name="jenis" value="Pengupasan">
          <div class="form-group">
              <label for="message-text" class="col-form-label">Bank Cubik Metre</label>
              <input class="form-control" type="text" placeholder="bcm" name="bcm" onchange="proses()">
          </div>
           <div class="form-group">
              <label for="message-text" class="col-form-label">Biaya Pengupasan</label>
              <input class="form-control" type="text" readonly name="biaya">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Lokasi</label>
            <select class="form-control" id="exampleFormControlSelect1" name="lokasi">
                @foreach($location as $location)
                    <option>{{$location->nama}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tanggal</label>
             <div class="input-group input-append date input-group-append" id="dp3"
                                 data-date-format="yyyy-mm-dd">
              <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="date" required>
              <span class="input-group-text add-on border-left-0 rounded-right">
                      <i class="fa fa-calendar"></i>
              </span>
          </div>
          </div>
           <div class="form-row">
                
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengupasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <form method="post" action="/pengupasan/update" name="hitung2">
             {{csrf_field()}}
        <input type="hidden" name="price" value="{{$price->harga}}" onchange="process()">
        <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
        <input type="hidden" name="company" value="{{auth()->user()->name}}">
        <input type="hidden" name="jenis" value="Pengupasan">
        <input type="hidden" name="id" id="id">
          <div class="form-group">
              <label for="message-text" class="col-form-label">Bank Cubik Metre</label>
              <input class="form-control" type="text" placeholder="bcm" name="bcm" id="bcm" onchange="process()">
          </div>
           <div class="form-group">
              <label for="message-text" class="col-form-label">Biaya Pengupasan</label>
              <input class="form-control" type="text" readonly id="biaya" name="biaya">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Lokasi</label>
            <select class="form-control" id="exampleFormControlSelect1" name="lokasi">
                @foreach($asu as $asu)
                    <option>{{$asu->nama}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tanggal</label>
             <div class="input-group input-append date input-group-append" id="dp2"
                                 data-date-format="yyyy-mm-dd">
              <input class="form-control" type="text" placeholder="yyyy-mm-dd" id="date" name="date" required>
              <span class="input-group-text add-on border-left-0 rounded-right">
                      <i class="fa fa-calendar"></i>
              </span>
          </div>
          </div>
           <div class="form-row">
                
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form>
         </div>
    </div>
  </div>
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
     <script type="text/javascript" src="{{asset('assets/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jquery.validVal.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/daterangepicker/js/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/j_timepicker/js/jquery.timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/clockpicker/js/jquery-clockpicker.min.js')}}"></script>
    <!--end of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/datetime_piker.js')}}"></script>
    <script type="text/javascript">
    function HargaTotal() {
    var myForm = document.hitung;
    var bcm;
    var price;
    var bcm =parseFloat(myForm.bcm.value);
    var price =parseFloat(myForm.price.value);
    if(myForm.bcm.value == "") bcm=0;
    myForm.biaya.value = bcm*price;    
    }
    function proses() {
    HargaTotal();
    }
    
    </script>
    <script type="text/javascript">
    function HargaTotals() {
    var myForm = document.hitung2;
    var bcm;
    var price;
    var bcm =parseFloat(myForm.bcm.value);
    var price =parseFloat(myForm.price.value);
    if(myForm.bcm.value == "") bcm=0;
    myForm.biaya.value = bcm*price;    
    }
    function process() {
    HargaTotals();
    }
    
    </script>
    <script>
    $('#modaledit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var bcm = button.data('bcm') 
        var lokasi = button.data('lokasi') 
        var biaya = button.data('biaya') 
        var date = button.data('date') 
        var id = button.data('id') 
        
        var modal = $(this)
        modal.find('.modal-body #bcm').val(bcm);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #lokasi').val(lokasi);
        modal.find('.modal-body #biaya').val(biaya);
        modal.find('.modal-body #date').val(date);

    })  
    </script>
    <!-- end of global scripts-->
@stop

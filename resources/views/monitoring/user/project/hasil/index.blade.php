@extends('layouts.monitoring.user.app')
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
                        Hasil Tambang
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
    <div class="outer">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Tambah Hasil
        </button>
        
    </div>
    <div class="outer">
        <table id="example1" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Hasil</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $result)
                <tr>
                    <td>{{$result->company}}</td>
                    <td>{{$result->hasil}}</td>
                    <td>{{$result->lokasi}}</td>
                    <td>{{$result->jumlah}} Ton</td>
                    <td>{{$result->tanggal}} {{$result->bulan}} {{$result->tahun}}</td>
                    <td><a href="/result/{{$result->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="/result/{{$result->id}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Perusahaan</th>
                    <th>Hasil</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
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
        <form method="post" action="/hasil/add">
             {{csrf_field()}}
        <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
        <input type="hidden" name="company" value="{{auth()->user()->name}}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hasil</label>
               <select class="form-control" id="exampleFormControlSelect1" name="hasil">
                  <option>Emas</option>
                  <option>Tembaga</option>
                  <option>Perak</option>
                  <option>Batu Bara</option>
                  <option>Nikel</option>
                </select>
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
            <label for="message-text" class="col-form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
           <div class="form-row">
                <div class="col-md-5 mb-3">
                    <label for="message-text" class="col-form-label">Tanggal</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tanggal">
                    <?php for($i=1;$i<=31;$i++){ ?>
                        <option>{{$i}}</option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="message-text" class="col-form-label">Bulan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="bulan">
                    <?php for( $m=1; $m<=12; ++$m ) { 
                      $month_label = date('F', mktime(0, 0, 0, $m, 1));
                    ?>
                      <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                    <?php } ?>
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

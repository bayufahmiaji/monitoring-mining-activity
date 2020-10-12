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
                        Acuan Biaya Produksi
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
    <div class="outer">
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
      @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(count($price) == 3)
    @else
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Tambah Acuan Biaya
        </button>
    @endif
       
        
    </div>
   <div class="outer">
        <table id="example1" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($price as $price)
                <tr>
                    <td>{{$price->jenis}}</td>
                    <td>{{$price->satuan}}</td>
                    <td>$ {{$price->harga}}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-satuan="{{$price->satuan}}" data-jenis="{{$price->jenis}}" data-harga="{{$price->harga}}" data-id="{{$price->id}}"><i class="fa fa-edit"></i></button>
                    <a href="/biaya/{{$price->id}}/delete" class="btn btn-danger" onclick="return confirm('Hapus Acuan Biaya Produksi?')"><i class="fa fa-trash"></i></a></td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Harga</th>
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
        <form method="post" action="/biaya/add">
            {{csrf_field()}}
          <div class="form-group">
            <label for="message-text" class="col-form-label">Jenis</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                <option>Pengupasan</option>
                <option>Penggalian</option>
                <option>Pengangkutan</option>
            </select>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Satuan</label>
	           <select class="form-control" id="exampleFormControlSelect1" name="satuan">
	                  <option>USD/bcm</option>
	                  <option>USD/ton</option>
                      <option>USD/ton/km</option>
                </select>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Harga</label>
            <input type="text" name="harga" class="form-control"  pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Hasil Tambang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <form method="post" action="/price/update">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Jenis</label>
            <input type="text" name="jenis" id="jenis" class="form-control" readonly="readonly">
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Satuan</label>
              <input type="text" name="satuan" id="satuan" readonly="readonly">
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Harga</label>
            <input type="text" name="harga" class="form-control"  pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]" required id="harga">
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
     <script type="text/javascript" src="{{asset('assets/vendors/tinymce/js/tinymce.min.js')}}"></script>
      <script>
    $('#modaledit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var harga = button.data('harga') 
        var jenis = button.data('jenis') 
        var satuan = button.data('satuan') 
        
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #jenis').val(jenis);
        modal.find('.modal-body #harga').val(harga);
        modal.find('.modal-body #satuan').val(satuan);

    })  
    </script>
@stop

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
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>Sukses!! {{ \Session::get('success') }}</p>
      </div>
     @endif
    <div class="outer">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Tambah Pegawai
        </button>
        
    </div>
   <div class="outer">
      <table table id="example3" class="display table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Lokasi Tambang</th>
                    <th>Jabatan</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($worker as $worker)
                <tr>
                    <td>{{$worker->nama}}</td>
                    <td>{{$worker->alamat}}</td>
                    <td>{{$worker->lokasi}}</td>
                    <td>{{$worker->jabatan}}</td>
                    <td>{{$worker->kewarganegaraan}}</td>
                    <td @if($worker->status == "Aktif")
                        class="bg-success"
                        @else
                        class="bg-danger"
                        @endif>{{$worker->status}}</td>
                    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-company="{{$worker->company}}" data-nama="{{$worker->nama}}" data-alamat="{{$worker->alamat}}" data-lokasi="{{$worker->lokasi}}" data-kewarganegaraan="{{$worker->kewarganegaraan}}" data-jabatan="{{$worker->jabatan}}" data-id="{{$worker->id}}"> <i class="fa fa-edit"></i></button>
                    <a href="/pegawai/{{$worker->id}}/delete" class="btn btn-danger" onclick="return confirm('Hapus Pegawai?')"><i class="fa fa-trash"></i></a></td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Lokasi Tambang</th>
                    <th>Jabatan</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tenaga Kerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <form method="post" action="/pegawai/add">
             {{csrf_field()}}
        <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
        <input type="hidden" name="company" value="{{auth()->user()->name}}">
         <div class="form-group">
            <label for="message-text" class="col-form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
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
            <label for="message-text" class="col-form-label">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" class="form-control" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Status</label>
	           <select class="form-control" id="exampleFormControlSelect1" name="status">
	                  <option>Aktif</option>
	                  <option>Putus Kontrak</option>
	                </select>
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

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tenaga Kerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <form method="post" action="/pegawai/update">
             {{csrf_field()}}
        <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
        <input type="hidden" name="company" value="{{auth()->user()->name}}">
        <input type="hidden" name="id" id="id">
         <div class="form-group">
            <label for="message-text" class="col-form-label">Nama</label>
            <input id="nama" type="text" name="nama" class="form-control" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat</label>
            <input id="alamat" type="text" name="alamat" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Jabatan</label>
            <input id="jabatan" type="text" name="jabatan" class="form-control" required>
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
            <label for="message-text" class="col-form-label">Kewarganegaraan</label>
            <input id="kewarganegaraan" type="text" name="kewarganegaraan" class="form-control" required>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Status</label>
               <select class="form-control" id="exampleFormControlSelect1" name="status">
                      <option>Aktif</option>
                      <option>Putus Kontrak</option>
                    </select>
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
    <!-- end of global scripts-->
     <script>
    $('#modaledit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nama = button.data('nama') 
        var id = button.data('id') 
        var alamat = button.data('alamat') 
        var kewarganegaraan = button.data('kewarganegaraan') 
        var jabatan = button.data('jabatan') 
        
        var modal = $(this)
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #kewarganegaraan').val(kewarganegaraan);
        modal.find('.modal-body #jabatan').val(jabatan);

    })  
    </script>
@stop

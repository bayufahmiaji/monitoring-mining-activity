@extends('layouts.monitoring.admin.app')
@section('title')
Puslitbang | Monitoring Pertambangan
@stop
@section('header_styles')
   <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp_file_upload/css/jquery.fileupload.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp_file_upload/css/jquery.fileupload-ui.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/dropify/css/dropify.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/dropzone/css/dropzone.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/file_upload.css')}}">
<!-- global styles-->
    <link type="text/css" rel="stylesheet" media="screen" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/summernote/css/summernote.css')}}"/>
    <!-- end of global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>
    <!--End of page level styles-->
@stop
    
@section('content')
<header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-home"></i>
                        Edit Company
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
     <div class="outer">
        <div class="inner bg-container">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
                @endif
              <form method="POST" action="/perusahaan/adds" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="email" class="col-form-label"> Nama Perusahaan</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="nama" value="{{$company->nama}}" placeholder="Nama Perusahaan" >
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="email" class="col-form-label"> Pemegang Saham</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required value="{{$company->pemegangsaham}}" name="pemegangsaham" placeholder="Pemegang sahams"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label"> Jenis Perizinan</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required value="{{$company->jperizinan}}" name="jperizinan" placeholder="Jenis Perizininan"  >
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email" class="col-form-label"> Tanggal Kontrak</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="tkontrak" value="{{$company->tkontrak}}" placeholder="Tanggal Kontrak"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Alamat</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="alamat" value="{{$company->alamat}}" placeholder="alamat"  >
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email" class="col-form-label">Bahan Galian</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" value="{{$company->galian}}" required name="galian" placeholder="Bahan Galian"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <div class="input-group input-group-prepend">
                            <input type="email" class="form-control  form-control-md" value="{{$company->email}}" required name="email" placeholder="Email"  >
                        </div>
                    </div>

                    
                     <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary"/>
                            <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

              </form>
        </div>       
    </div>
    @endsection                
@section('footer_scripts')
   <!--plugin scripts-->
   <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/theme.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.ui.widget.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp-tmpl/js/tmpl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimploadimage/js/load-image.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp-gallery-with-desc/js/jquery.blueimp-gallery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.iframe-transport.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-process.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-image.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-audio.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-video.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.fileupload-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/dropify/js/dropify.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/dropzone/js/dropzone.js')}}"></script>
<!-- end of global scripts-->
 <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/tinymce/js/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/summernote/js/summernote.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/form_editors.js')}}"></script>
    <!-- end page level scripts -->
<script type="text/javascript" src="{{asset('assets/js/pages/file_upload.js')}}"></script>
<script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar bg-success" style="width:0%;"></div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start m-t-10" disabled>
                    <i class="fa fa-arrow-up"></i>
                    <span>Start</span>
                </button>
                {% } %} {% if (!i) { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}



</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                    <span>{%=file.name%}</span> {% } %}
                </p>
                {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete m-t-10" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="fa fa-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}

</script>
@stop

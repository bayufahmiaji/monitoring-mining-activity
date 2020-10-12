@extends('layouts.monitoring.user.app')
@section('title')
		@foreach($company as $company) 
	{{$company->nama}}
@endsection
@section('nav')
	<h4>
		<img src="{{ url('/assets/uploads/logo/'.$company -> photo) }}" class="admin_img" style="width: 35px;" alt="logo"> 
		{{$company->nama}}</h4>
		@endforeach
@stop
@section('header_styles')
    <!--End of the global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/general_components.css')}}"/>
    <!-- end of page level styles -->
@stop

@section('content')
<div class="outer">
	 <div class="row">
        <div class="col-lg-4">
            <div class="card bg-primary m-t-35">
                <div class="card-body">
                	<br>
                	<br>
                	<p>
                    <h3 style="text-align: center;color: white;">Lokasi Tambang</h3>
                	</p>
                	<br>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-primary m-t-35">
                <div class="card-body">
                    <br>
                	<br>
                	<p>
                    <h3 style="text-align: center;color: white;">Hasil Tambang</h3>
                	</p>
                	<br>
                </div>
            </div>
            </div>
        <div class="col-lg-4">
            <div class="card bg-primary m-t-35">
                <div class="card-body">
                   <br>
                	<br>
                	<p>
                    <h3 style="text-align: center;color: white;">Penjualan Tambang</h3>
                	</p>
                	<br>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
@section('footer_scripts')
    <!-- end of global scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/cards.js')}}"></script>

@stop
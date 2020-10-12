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
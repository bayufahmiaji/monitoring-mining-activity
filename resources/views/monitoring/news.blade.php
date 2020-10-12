@extends('layouts.monitoring.app')
@section('title')
	Puslitbang tekMIRA | Berita
@stop
@section('content')
@foreach($news as $news)
    <br>
	<div class="media list-group-item list-group-item-action container">
	  <table >
	  	<tbody>
	  	  <tr>
	  	  	<td>
	  	  		<h3 style="text-align: left;"><span style="color: #ff6600;">{{$news->title}}</span></h3>
	  	  	</td>
	  	  </tr>
	  	  <tr>
	  	  	<td><span> {{$news->post_by}}</span>
	  	  	</td>
	  	  </tr>
	  	  <tr>
	  	  	<td colspan="2">
	  	  		<hr>
	  	  	</td>
	  	  </tr>
	      <tr>
	        <td>
	        	<img width="400px" height="300px" src="{{asset('assets/uploads/news/'.$news->image)}}"></td>
	        <td  class="align-top" colspan="3">
	        	<div class="container ">
	        		<p>
	        		<?=substr($news->description,0,500);?>
	        		</p>
	        	</div>
	    	</td>
	      </tr>
	    </tbody>
	  </table>  
		<div style="text-align: right;">
			<a href="/berita/{{$news->id}}/detail" class="btn btn-danger" ><strong>Read More</strong> </a>
		</div>
	</div>
		
		@endforeach

@endsection
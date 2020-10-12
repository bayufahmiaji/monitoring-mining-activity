@extends(('layouts/monitoring.user.app'))
{{-- Page title --}}
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
{{-- page level styles --}}
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/mail_box.css')}}"/>
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-inbox"></i>
                        Compose
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row web-mail">
                <div class="col-lg-3 mail_compose_list">
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item  bg-success" >
                                <a href="mail_compose" style="color: white;">
                                    <i class="fa fa-edit"></i>
                                    Compose
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="mail_inbox" >
                                    <i class="fa fa-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">
                                    <i class="fa fa-eye"></i>
                                    View Mail
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="mail_sent">
                                    <i class="fa fa-sign-out"></i>
                                    Sent
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card media_max_991">
                        <div class="card-header bg-white">
                            <i class="fa fa-edit"></i>
                            Compose Mail
                        </div>
                        <div class="card-body m-t-35">
                            <form action="/sendmail" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="sender" value="{{auth()->user()->email}}">
                                <input type="hidden" name="id_sender" value="{{auth()->user()->id}}">
                                <input type="hidden" name="status" value="not_read">
                                <div class="form-group">
                                    <input type="input" class="form-control" placeholder="To *" name="receiver" required>
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
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->

@stop
@section('footer_scripts')
    <!-- end of global scripts-->
      <!-- end of global scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/mail_box.js')}}"></script>
@stop
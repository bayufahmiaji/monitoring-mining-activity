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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/mail_box.css')}}"/>
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-inbox"></i>
                        Inbox
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
                            <li class="list-group-item">
                                <a href="mail_compose">
                                    <i class="fa fa-edit"></i>
                                    Compose
                                </a>
                            </li>
                            <li class="list-group-item bg-success">
                                <a href="mail_inbox" class="mail_inbox_text_col">
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
                    <div class="card mail media_max_991">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-12 m-t-10 dropdown_list_hover">
                                    <div class="btn-group float-left table-bordered text-primary" id="refresh_inbox">
                                        <i class="fa fa-refresh"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="input-group margin bottom">
                                        
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body m-t-25 p-d-0">
                            <div class="tabs tabs-bordered tabs-icons">

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane table-responsive reset padding-all fade active show"
                                         >
                                        <table class="table">
                                            <tbody>
                                            @foreach($mail as $mail)
                                            <tr>
                                               <td><a href="/mail/{{$mail->id}}/view">{{$mail->receiver}}</a> </td>
                                                <td><a href="/mail/{{$mail->id}}/view">{{$mail->subject}}</a></td>
                                                <td style="text-align: right"><a href="/mail/{{$mail->id}}/view">{{$mail->created_at}}</a></td>
                                                <td width="50px"><a href="/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
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
    <script type="text/javascript" src="{{asset('assets/js/pages/mail_box.js')}}"></script>
@stop
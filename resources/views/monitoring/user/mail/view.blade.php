@extends(('layouts/monitoring.user.app'))
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
                        <i class="fa fa-eye"></i>
                        View Email
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
                                <a href="/mail_compose">
                                    <i class="fa fa-edit"></i>
                                    Compose
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/mail_inbox">
                                    <i class="fa fa-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                            <li class="list-group-item  bg-success">
                                <a href="#" style="color: white;" >
                                    <i class="fa fa-eye" ></i>
                                    View Mail
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/mail_sent">
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
                            <p class="m-t-20">Subject: {{$mail->subject}}</p>
                            <p class="m-t-10"><span>From: {{$mail->sender}}</span><span class="float-right"> {{$mail->created_at}}</span></p>
                        </div>
                        <div class="card-body m-t-35">
                           <?=substr($mail->message,0);?>
                            <br>
                            <br>
                            <hr>
                            <div class="m-t-20">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-company="{{$mail->sender}}"><i class="fa fa-reply"></i> Reply</button>
                                <a href="mail_trash" class="btn btn-warning" id="view_reply3"><i class="fa fa-trash-o"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="card-body m-t-35">
            <form action="/sendmail" method="post">
                {{csrf_field()}}
                <input type="hidden" name="sender" value="{{auth()->user()->email}}">
                <input type="hidden" name="id_sender" value="{{auth()->user()->id}}">
                <input type="hidden" name="status" value="not_read">
                <div class="form-group">
                    <input type="input" class="form-control" placeholder="To *" name="receiver" required id="company">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

@stop
@section('footer_scripts')
    <!-- end of global scripts-->
   <script type="text/javascript" src="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/bootstrap3_wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/mail_box.js')}}"></script>
       <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var company = button.data('company') 
        
        var modal = $(this)
        modal.find('.modal-body #company').val(company);
      
    })  
    </script>
@stop
@extends('Admin.templete.index')

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
 
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{route('email')}}"><i class="fa fa-inbox"></i> Voltar </a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
 
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">E-mail</h3>

            </div>
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$email->name}}</h3>
                <h5>{{$email->email}}<span class="mailbox-read-time pull-right">Telefone: {{$email->telefone}}</span></h5>
              </div>

              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">

       			<p>{{$email->assunto}}</p>
     
              </div>
              <!-- /.mailbox-read-message -->
            </div>
  
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
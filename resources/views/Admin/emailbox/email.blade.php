  @extends('Admin.templete.index')

  @section('content')

 <div class="container-fluid"> 
  <!-- Content Wrapper. Contains page content -->

    <!-- RETURNO DAS MESSAGENS -->
  @if( session('message') )
  <div class="alert alert-success">
      <p>{{session('message')}}</p>
  </div>
  @endif


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">E-mail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
     
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                @foreach($emails as $email)  

                  <tbody>
                  <tr>
                    <td class="mailbox-star"><a href="{{route('deleteMail', $email->id)}}"><i class="glyphicon glyphicon-trash"></i></a></td>
                    <td class="mailbox-name"><a href="{{route('readMail', $email->id)}}">{{$email->name}}</a></td>
                    <td class="mailbox-subject"><b>{{$email->email}}</b></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{date_format($email->created_at, 'd-m-y  H:i')}}</td>
                  </tr>
         
                  </tbody>
                 @endforeach

                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <div class="pull-right">
                  <div class="btn-group">
                      <!-- link de página -->
                      {!! $emails->links() !!}  
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
  @endsection
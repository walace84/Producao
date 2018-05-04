@extends('Admin.templete.index')



@section('content')


 <form method="POST" action="{{route('CreateStore')}}"  enctype="multipart/form-data">

     <!-- messgens de erro --> 
     @if( session('error') )
      <div class="alert alert-danger">
          <p>{{session('error')}}</p>
      </div>
    @endif

     <!-- validação dos dados do formulario -->
    @if(isset($errors) && count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <p>{{$error}}</p>
        </div>
        @endforeach
    @endif

    {{ csrf_field() }}

  <div class="form-group">
    <label for="file">Logo:</label>
    <input type="file" class="form-control" name="logo" required="">
  </div>  

  <div class="form-group">
    <label for="name">Nome da Loja:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome da loja" required="">
  </div>

   <div class="form-group">
    <label for="referencia">Referencia:</label>
    <input type="text" class="form-control" name="referencia" placeholder="A referencia é o nome da loja" required="">
  </div>

   <div class="form-group">
    <label for="user_id">ID do Usuário:</label>
    <input type="text" class="form-control" name="user_id" required="">
  </div>

  <div class="form-group">
    <label for="city_id">ID da Cidade:</label>
    <input type="text" class="form-control" name="city_id" value="{{$Cities->id}}">
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>


@endsection
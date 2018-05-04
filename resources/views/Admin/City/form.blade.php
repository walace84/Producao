@extends('Admin.templete.index')



@section('content')
 <form method="POST" action="{{route('CreateCity')}}">

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
    <label for="name">Nome da cidade:</label>
    <input type="text" class="form-control" name="name" placeholder="Nome da cidade" required="">
  </div>

   <div class="form-group">
    <label for="referencia">Referencia:</label>
    <input type="text" class="form-control" name="referencia" placeholder="A referencia é o nome da cidade" required="">
  </div>




  <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
@endsection
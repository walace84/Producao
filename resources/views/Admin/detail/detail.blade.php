@extends('Admin.templete.index')



@section('content')

 
  <h2><a href="{{route('cities')}}"><span class="glyphicon glyphicon-backward"></span> </a> Detalhes da Loja:</h2>

  @foreach($details as $detail)
  <form method="POST" action="{{route('updateDetail', $detail->id)}}"  enctype="multipart/form-data">

        <!-- RETURNO DAS MESSAGENS -->
        @if( session('message') )
        <div class="alert alert-success">
            <p>{{session('message')}}</p>
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
        <label for="oferta">Oferta:</label>
        <input type="text" class="form-control" name="oferta" value="{{$detail->oferta}}">
      </div>

      <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="text" class="form-control" name="valor"  value="{{ $detail->valor }}">
      </div>

       <div class="form-group">
        <label for="newvalor">Novo Valor:</label>
        <input type="text" class="form-control" name="newvalor"  value="{{ $detail->newvalor }}">
      </div>

       <div class="form-group">
        <label for="detalhes">Detalhes:</label>
        <input type="text" class="form-control" name="detalhes" value="{{$detail->detalhes}}">
      </div>

      <div class="form-group">
        <label for="regras">Regras:</label>
        <input type="text" class="form-control" name="regras" value="{{$detail->regras}}">
      </div>

      <div class="form-group">
        <label for="desconto">Desconto:</label>
        <input type="text" class="form-control" name="desconto" value="{{$detail->desconto}}">
      </div>

      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" name="telefone" placeholder="Telefone"  value="{{$detail->telefone}}">
      </div>

      <div class="form-group">
        <label for="whatsapp">whatsapp:</label>
        <input type="text" class="form-control" name="whatsapp" placeholder="whatsapp"  value="{{$detail->whatsapp}}">
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" name="email" placeholder="email"  value="{{$detail->email}}">
      </div>

       <div class="form-group">
        <label for="site">Site:</label>
        <input type="text" class="form-control" name="site"  value="{{ $detail->site }}">
      </div>

      <div class="form-group">
        <label for="endereco">Endereco:</label>
        <input type="text" class="form-control" name="endereco"  value="{{ $detail->endereco }}">
      </div>

      <button type="submit" class="btn btn-primary">Cadastrar</button>

  </form>
  @endforeach


@endsection
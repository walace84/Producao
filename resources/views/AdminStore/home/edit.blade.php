@extends('AdminStore.templete.index')

@section('content')

@foreach($details as $detail)
<form method="POST" action="{{route('update', $detail->id)}}"  enctype="multipart/form-data">

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
    <label for="file">Image da promoção:</label>
    <input type="file" class="form-control" name="image" required="">
  </div>  

  <div class="form-group">
    <label for="oferta">Oferta:</label>
    <input type="text" class="form-control" name="oferta" placeholder="oferta" value="{{$detail->oferta}}">
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
    <input type="text" class="form-control" name="detalhes" placeholder="detalhes" value="{{$detail->detalhes}}">
  </div>

  <div class="form-group">
    <label for="regras">Regras:</label>
    <input type="text" class="form-control" name="regras" placeholder="regras" value="{{$detail->regras}}">
  </div>

  <div class="form-group">
    <label for="desconto">Desconto:</label>
    <input type="text" class="form-control" name="desconto" placeholder="desconto" value="{{$detail->desconto}}">
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
    <input type="email" class="form-control" name="email" placeholder="email" value="{{$detail->email}}">
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
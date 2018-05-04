@extends('Admin.templete.index')



@section('content')


 <form method="POST" action="{{route('createDetail')}}"  enctype="multipart/form-data">

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
    <input type="text" class="form-control" name="oferta" placeholder="oferta" required="" value="{{ old('oferta') }}">
  </div>

  <div class="form-group">
    <label for="valor">Valor:</label>
    <input type="text" class="form-control" name="valor" placeholder="valor" required="" value="{{ old('valor') }}">
  </div>

  <div class="form-group">
    <label for="newvalor">Novo Valor:</label>
    <input type="text" class="form-control" name="newvalor" placeholder="novo valor" required="" value="{{ old('newvalor') }}">
  </div>

   <div class="form-group">
    <label for="detalhes">Detalhes:</label>
    <input type="text" class="form-control" name="detalhes" placeholder="detalhes" required="" value="{{ old('detalhes') }}">
  </div>

  <div class="form-group">
    <label for="regras">Regras:</label>
    <input type="text" class="form-control" name="regras" placeholder="regras" required="" value="{{ old('regras') }}">
  </div>

  <div class="form-group">
    <label for="desconto">Desconto:</label>
    <input type="text" class="form-control" name="desconto" placeholder="desconto" required="" value="{{ old('desconto') }}">
  </div>

  <div class="form-group">
    <label for="telefone">Telefone:</label>
    <input type="text" class="form-control" name="telefone" placeholder="Telefone" required="" value="{{ old('telefone') }}">
  </div>

    <div class="form-group">
    <label for="whatsapp">whatsapp:</label>
    <input type="text" class="form-control" name="whatsapp" placeholder="whatsapp" required="" value="{{ old('whatsapp') }}">
  </div>

  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" class="form-control" name="email" placeholder="email" required="" value="{{ old('email') }}">
  </div>

  <div class="form-group">
    <label for="site">Site:</label>
    <input type="text" class="form-control" name="site" placeholder="site" value="{{ old('site') }}">
  </div>

  <div class="form-group">
    <label for="endereco">Endereco:</label>
    <input type="text" class="form-control" name="endereco" placeholder="endereco" required="" value="{{ old('endereco') }}">
  </div>

  <div class="form-group">
    <label for="store_id">ID da Loja:</label>
    <input type="text" class="form-control" name="store_id" value="{{$stores->id}}">
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>


@endsection
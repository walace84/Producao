@extends('Site.templete.default')

@section('content')

<div class='col-md-12 formStyle'>

    <!-- RETURNO DAS MESSAGENS -->
    @if( session('message') )
    <div class="alert alert-success">
        <p>{{session('message')}}</p>
    </div>
    @endif

    <!-- RETURNO DAS MESSAGENS -->
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

    <form method="GET" action="{{route('ticket')}}">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name='name' value="{{old('name')}}" required="">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" required="">
        </div>

        <div class="form-group">
            <label for="active">Aceito receber e-mails promocionais:</label>
            <input type="checkbox"  value="1" name="active">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" value="{{old('telefone')}}" required="">
        </div>
        <div class="form-group">
            <label for="pwd">Número do cartão:</label>
            <input type="text" class="form-control" name="codigo" value="{{old('codigo')}}" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <div class='col-md-12'>
        <div class="container footerStyle">
             <p>&copy Clube seu desconto 2018</p>
        </div>
    </div>

</div>



@endsection
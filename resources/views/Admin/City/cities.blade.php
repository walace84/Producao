@extends('Admin.templete.index')



@section('content')
  
   <!-- RETURNO DAS MESSAGENS -->
  @if( session('message') )
  <div class="alert alert-success">
      <p>{{session('message')}}</p>
  </div>
  @endif

  @if( session('error') )
  <div class="alert alert-danger">
      <p>{{session('error')}}</p>
  </div>
  @endif
  
  <h2>Cidades</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Cidade</th>
        <th>Cadastrar Lojas</th>
        <th>Ver Lojas</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Cities as $city)
      <tr>
        <td>{{$city->name}}</td>
        <td><a href="{{route('FormStore', $city->id)}}">CADASTRAR</a></td>
        <td><a href="{{route('showStore', $city->id)}}">LOJAS</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection
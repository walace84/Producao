@extends('Admin.templete.index')



@section('content')

 
  <h2><a href="{{route('cities')}}"><span class="glyphicon glyphicon-backward"></span> </a> Lojas:</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Lojas</th>
        <th>Detalhes</th>
        <th>Cadastrar Detalhes</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stores as $store)
      <tr>
        <td>{{$store->name}}</td>
        <td><a href="{{route('showDetail', $store->id)}}">DETALHES</a></td>
        <td><a href="{{route('FormDetail', $store->id)}}">CADASTRAR DETALHES</a></td>
        <td><a href="{{route('delete', $store->id)}}">DELETAR<span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection
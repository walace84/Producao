@extends('AdminStore.templete.index')

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

  <h2>Promoção:</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Ver Promoção</th>
        <th>Editar Promoção</th>
       </tr>
    </thead>
    <tbody>
      @foreach($stores as $store)
      <tr>
        <td>{{$store->name}}</td>
        <td><a href="{{route('show', $store->id)}}">PROMOÇÃO</a></td>
        <td><a href="{{route('edit', $store->id)}}">Editar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection
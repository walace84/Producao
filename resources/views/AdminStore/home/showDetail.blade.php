@extends('AdminStore.templete.index')

@section('content')

    <h2><a href="{{route('Store')}}"><span class="glyphicon glyphicon-backward"></span></a> Lojas:</h2>
      @foreach($details as $detail)
        <img src='{{url("storage/promocao/$detail->image")}}' class="img-responsive" width="200" height="200" >
        <p>Oferta: <b>{{$detail->oferta}}</b></p>
        <p>Valor: <b>{{$detail->valor}}</b></p>
        <p>Novo Valor: <b>{{$detail->newvalor}}</b></p>
        <p>Detalhes: <b>{{$detail->detalhes}}</b></p>
        <p>Regras: <b>{{$detail->regras}}</b></p>
        <p>Desconto: <b>{{$detail->desconto}}</b></p>
        <p>Telefone: <b>{{$detail->telefone}}</b></p>
        <p>Whatsapp: <b>{{$detail->whatsapp}}</b></p>
        <p>E-mail: <b>{{$detail->email}}</b></p>
        <p>Site: <b>{{$detail->site}}</b></p>
        <p>Endereço: <b>{{$detail->endereco}}</b></p>
      @endforeach

@endsection
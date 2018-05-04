@extends('Site.templete.default')

@section('content')

  @foreach($details as $detail)


  <div class='row'>
    <div class="col-sx-12 col-sm-12 col-md-12">
       <img src='{{url("storage/Logomarca/$store->logo")}}' class="img-responsive StyleImg" max-width="400" max-height="300">
    </div>
  </div>

 <div class="row border">
      <div class='col-xs-12 col-md-4'>
          <img src='{{url("storage/promocao/$detail->image")}}' class="img-responsive promocaoImg" width="300" height="300" >
      </div>
      <div class='col-xs-12 col-md-8'>
          <h3>{{$detail->oferta}}</h3>
          <h1><span style="color: red">{{$detail->desconto}}% de desconto</span></h1>
          <p>De: R$ {{$detail->valor}} | Para: R$<b> {{$detail->newvalor}}</b></p>
          <p>Regras: {{$detail->regras}}</p>
      </div>  
  </div> 

  <div class="col-sx-12 col-sm-12 col-md-12 box">
      <h3 style="text-align: center;">Mais detalhes do produto e loja</h3>
  </div> 


  <table class="table table-striped">
    <tbody>

      <tr>
        <td>Detalhes:</td>
        <td><b>{{$detail->detalhes}}</b></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><b>{{$detail->telefone}}</b></td>
      </tr>
      <tr>
        <td>Whatsapp:</td>
        <td><b>{{$detail->whatsapp}}</b></td>
      </tr>
      <tr>
        <td>E-mail:</td>
        <td><b>{{$detail->email}}</b></td>
      </tr>
      <tr>
        <td>Site:</td>
        <td><b>{{$detail->site}}</b></td>
      </tr>
      <tr>
        <td>Endereço:</td>
        <td><b>{{$detail->endereco}}</b></td>
      </tr>

    </tbody>

  </table>

  <div class='col-sx-12 col-md-12'>
      <div class="container footerStyle">
           <p>&copy Clube seu desconto 2018</p>
      </div>
  </div>  

  @endforeach       

@endsection
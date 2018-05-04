@extends('Site.templete.index')

@section('content')

<section>
    @foreach($cities as $city)
    <div class='row'>
        
        <a href='{{route("stores", $city->referencia)}}'>
        <div class='col-xs-12 col-md-12 btn btn-default'>
            <h1>{{$city->name}}</h1>
            <p>Veja as lojas dessa cidade.</p>
            <p>Em breve mais cidades vão estar aqui.</p>
            <p>Você vai encontrar muitos descontos.</p>
        </div>
        </a>
       
    </div> 
    @endforeach   
</section>  

@endsection
@extends('Site.templete.default')

@section('content')
<!-- Lojas -->
<section>
   
    <div class='row'>
    	@foreach($stores as $store)
        <div class='col-xs-12 col-sm-6 col-md-3'>
        	<div class="store">
            <img src='{{url("storage/Logomarca/$store->logo")}}' class="StyleImg" width="200px;" height="200px">
             <a href='{{route("details", $store->referencia)}}'><p class="name btn btn-default">{{$store->name}}</p> </a>
            </div> 
        </div>  
        @endforeach  
    </div>  

    <div class='col-sx-12 col-md-12'>
        <div class="container footerStyle">
             <p>&copy Clube seu desconto 2018</p>
        </div>
    </div>  
   
</section>

@endsection
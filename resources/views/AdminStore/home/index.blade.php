@extends('AdminStore.templete.index')

@section('content')
<div class="container">
  <h2>Verifica o tickets de desconto do cliente</h2>
  <form method="POST" action="{{route('search')}}">
  	{{ csrf_field() }}
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Codigo" name="code">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>

</div>


<div class="container">
  <!-- RETORNO DA MESSAGEM DO CÓDIGO -->
	@if(isset($details))
	<div class="alert alert-success">
	    <p>Código Válido: <b> {{$query}}</b></p>
	</div>
 @endif

  <!-- RETORNO DA MESSAGEM DO CÓDIGO -->
  @if(isset($message))
  	<div class="alert alert-danger">
  		<p>{{$message}}</p>
  	</div>
  @endif

</div>



@endsection

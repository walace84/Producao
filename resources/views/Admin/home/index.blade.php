@extends('Admin.templete.index')

@section('content')

	

  <div class="container">
  	<h1>Pesquisar clientes</h1>
	  <form method="POST" action="{{route('searchs')}}">
	    {{ csrf_field() }}
	    <div class="input-group">
	      <input type="text" class="form-control" placeholder="Codigo" name="code">
	      <div class="input-group-btn">
	        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	      </div>
	    </div>
	  </form>
 </div>

	<!-- RETORNO DA MESSAGEM DO CÓDIGO -->
	<div class="container">
		@if(isset($details))
		<div class="alert alert-success">
		    <p>Código Válido</b></p>
		</div>

	 <table class="table table-striped">

	    <thead>
	      <tr>
	        <th>Nome</th>
	        <th>Telefone</th>
	        <th>email</th>
	        <th>Código</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($details as $code)
	      <tr>
	        <td>{{$code->name}}</td>
	        <td>{{$code->telefone}}</td>
	        <td>{{$code->email}}</td>
	        <td>{{$code->codigo}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	 @endif

	<!-- RETORNO DA MESSAGEM DO CÓDIGO -->
	@if(isset($message))
		<div class="alert alert-danger">
			<p>Código invalido!</p>
		</div>
	@endif

	</div>

@endsection

@extends('Site.templete.default')

@section('content')

<div class='col-md-12'>


	
	<form method="get" action="{{route('createcontato')}}">

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


		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Nome:</label>
			<input type="text" class="form-control" name='name' required="" value="{{old('name')}}">
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		    <label for="email">E-Mail</label>
	        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
	        @if ($errors->has('email'))
	            <span class="help-block">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
	        @endif
		</div>

		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" class="form-control" name="telefone" required="" value="{{old('telefone')}}">
		</div>

		<div class="form-group">
		  <label for="assunto">Assunto:</label>
		  <textarea class="form-control" rows="5" name="assunto" required="">{{old('assunto')}}</textarea>
		</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
	</form>
</div> 

 <div class='col-md-12'>
    <div class="container footerStyle">
         <p>&copy Clube seu desconto 2018</p>
    </div>
 </div>

@endsection
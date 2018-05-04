@extends('Admin.templete.index')

@section('content')

  <table class="table table-striped">

    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>email</th>
        <th>Active</th>
        <th>Código</th>
        <th>Data</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $datas)
      <tr>
        <td>{{$datas->id}}</td>
        <td>{{$datas->name}}</td>
        <td>{{$datas->telefone}}</td>
        <td>{{$datas->email}}</td>
        <td>{{$datas->active}}</td>
        <td>{{$datas->codigo}}</td>
        <td>{{date_format($datas->created_at, 'Y-m-d')}}</td>
        <td><a href="{{route('deleteCode',$datas->id)}}">delete</a></td>
      </tr>
      @endforeach
    </tbody>

  </table>
  	
  <!-- link de página -->
  {!! $data->links() !!}	
	
 
@endsection

@extends('admin.template.main')

@section('content')

<div class="panel panel-default  animated fadeInDownBig">
  <div class="panel-heading"><h4>Inserte el nuevo valor para la parte {{ $parts->name }}</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>['PartController@update',$parts->id],'method'=>'PUT'])!!}

<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!!Form::text('name',$parts->name,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
<a href="{{ action("PartController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Registar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection
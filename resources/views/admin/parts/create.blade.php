@extends('admin.template.main')

@section('content')

<div class="panel panel-default  animated fadeInDownBig">
  <div class="panel-heading"><h4>Registre el nombre de la parete que desea agregar</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>'PartController@store','method'=>'POST' ])!!}

<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!!Form::text('name',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
<a href="{{ action("PartController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Registar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection
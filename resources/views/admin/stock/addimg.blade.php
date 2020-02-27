@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Agregar imagenes al producto: {{ $pro->name }}</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>['StockController@imgstore',$pro->id],'method'=>'POST',"files"=>true])!!}

<div class="form-group">
	{!! Form::label('image','Imagen')!!}
	{!!Form::file('image[]',['class'=>'form-control','multiple' => true,'pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
<a href="{{ action("PartController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Registar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection



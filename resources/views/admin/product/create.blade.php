@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Registre el nombre de la parete que desea agregar</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>'ProductController@store','method'=>'POST',"files"=>true])!!}

<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!!Form::text('name',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('image','Imagen')!!}
	{!!Form::file('image',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('description','Descripción')!!}
	{!!Form::textarea('description',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('status','Estatus del Producto')!!}
	{!!Form::select('status',["1"=>"Dispnible","0"=>"No dispnible"],"s",['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('part_id','Tipo de Parte')!!}
	{!!Form::select('part_id',$parts,"s",['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('price','Precio')!!}
	{!!Form::text('price',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
<a href="{{ action("ProductController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Registar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection
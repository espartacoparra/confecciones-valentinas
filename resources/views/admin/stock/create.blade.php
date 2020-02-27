@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Registre un producto con existencia</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>'StockController@store','method'=>'POST',"files"=>true])!!}

<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!!Form::text('name',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('image','Imagen')!!}
	{!!Form::file('image[]',['class'=>'form-control','multiple' => true,'pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('description','Descripción')!!}
	{!!Form::textarea('description',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('status','Estatus del Producto')!!}
	{!!Form::select('status',["1"=>"Dispnible","0"=>"No dispnible"],"s",['class'=>'form-control ', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('size','Tallas')!!}
	{!!Form::select('size[]',$size,"s",['class'=>'form-control option',"multiple class"=>"chosen-select", 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('price','Precio')!!}
	{!!Form::text('price',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
<a href="{{ action("StockController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Registar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection

@section("scripts")
<script type="text/javascript">
	$(".option").chosen({
		placeholder_text_single: "seleccione una categoria"
	}); 
</script>
@endsection

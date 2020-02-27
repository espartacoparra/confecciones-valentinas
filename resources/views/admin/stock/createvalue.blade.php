@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Agregar cantidades a las tallas del producto: {{ $pro->name }}</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>['StockController@storevalue',$pro->id],'method'=>'POST'])!!}
@foreach($pro->sizes as $size)
<div class="form-group">
	
	{!! Form::label('name',$size->size)!!}
	
	{!!Form::text($size->id,$size->pivot->value,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
	
</div>
@endforeach
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

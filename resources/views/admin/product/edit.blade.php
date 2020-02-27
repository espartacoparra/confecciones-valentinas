@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Editar: {{ $product->name }}</h4></div>
  <div class="panel-body">
      <div class="row">

<div class="col-md-8"> 
	@foreach($product->images as $image)
          <img  width="100px" height="100px" src="{{ asset('partesProductos/'.$image->name) }}">
          @endforeach
        </div>
</div>
{!!Form::open(['action'=>['ProductController@update',$product->id],'method'=>'PUT',"files"=>true])!!}

<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!!Form::text('name',$product->name,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('image','Remplazar la imagen existente del producto')!!}
	{!!Form::file('image',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('description','Descripción')!!}
	{!!Form::textarea('description',$product->description,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('status','Estatus del Producto')!!}
	{!!Form::select('status',["1"=>"Dispnible","0"=>"No dispnible"],"s",['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('part_id','Tipo de Parte')!!}
	{!!Form::select('part_id',$parts,$product->part,['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('price','Precio')!!}
	@foreach($product->prices as $price)
	{!!Form::text('price',$price->price,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
	@endforeach
</div>

<div class="form-group">
<a href="{{ action("ProductController@index") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection
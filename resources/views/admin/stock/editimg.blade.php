@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading"><h4>Suba una miagen para modificar la siguiente</h4></div>
  <div class="panel-body">

  	<div class="row">
    
    
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Confecciones Valentinas</div>
        <div class="panel-body"><img src="{{ asset("/partesProductos/".$img->name) }}" class="img-responsive" width="100%" height="100%" alt="Image"></div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>

{!!Form::open(['action'=>['StockController@updateimg',$img->id,$img->product->id],'method'=>'POST',"files"=>true])!!}

<div class="form-group">
	{!! Form::label('image','Imagen')!!}
	{!!Form::file('image',['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
<a href="{{ action("StockController@deleteimg",$img->product->id) }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Modificar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
@endsection
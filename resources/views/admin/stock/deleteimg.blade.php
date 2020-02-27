@extends('admin.template.main')

@section('content')

  <div class="panel panel-default animated fadeInDownBig">

  <div class="panel-heading"><h4>Modificacion y eliminacion de imagenes del producto: {{ $pro->name }} </h4></div>
  <div class="panel-body"  >

    <div class="responsive">

  <div class="row">
    
    @foreach($pro->images as $image )
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Confecciones Valentinas</div>
        <div class="panel-body"><img src="{{ asset("/partesProductos/".$image->name) }}" class="img-responsive" width="100%" height="100%" alt="Image"></div>
        <div class="panel-footer"><a href="{{ action("StockController@editimg",$image->id) }}"> <button class="btn btn-warning">Editar</button></a> <a onclick="return confirm('Esta seguro que desea eliminar esta imagen?')" href="{{ action("StockController@delimg",$image->id,$pro->id) }}"> <button class="btn btn-danger">eliminar</button></a></div>
      </div>
    </div>
    
    @endforeach
  </div>
<a href="{{ action("StockController@index") }}"> <button class="btn btn-danger">Regresar</button></a>
</div>

</div>
</div>
@endsection


@extends("store.template.main")
@section("content")
<!-- Page Content -->
    <div class="container">
<style type="text/css">
  #imagen{
    background-color: black;
    
    border-radius:10px; 
  }
  #muestrapanel{
    background-color: black;
    padding: 10px;
    color: #E4C1BD;
    border-radius:10px; 
  }
  #imagenslider{
    
       
    border-radius:10px; 
  }
  
</style>
      <!-- Portfolio Item Heading -->
      <h1 class="my-4">{{ $pro->name }}
        
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">

          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner animated fadeInLeftBig">
     @if($pro->images != '[]')
     <?php $c=0?>
     
      @foreach($pro->images as $image)
      @if($c == 0)
    <div class="carousel-item active">
      <img  class="d-block w-100" id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    <?php $c=1?>
    @else
    <div class="carousel-item">
      <img  class="d-block w-100" id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    @endif
    @endforeach
    @else
       <div class="carousel-item active">
      <img class="d-block w-100" id="imagenslider" src="..." alt="Sin imagenes">
    </div>
   
@endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>

        <div class="col-md-4 animated fadeInRightBig" id="muestrapanel">
          <h3 class="my-3">Descripcion del Producto:</h3>
          <p>{{ $pro->description }}</p>
          <h3 class="my-3">Detalles</h3>
          <ul>
            @foreach($pro->prices as $price)
            <p>Percio: {{ $price->price }} bs.S</p>
            @endforeach
            <p>Tallas</p>
            @foreach($pro->sizes as $size)
            <li>{{ $size->size }}: {{ $size->pivot->value }} </li>
            @endforeach
          </ul>
          {!!Form::open(['action'=>['SaleController@salestock',$pro->id],'method'=>'POST' ])!!}

<div class="form-group">
  {!! Form::label('size','Seleccione una Talla')!!}
  {!!Form::select('size',$array,"s",['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>

<div class="form-group">


{!! Form::submit('Ordenar',['class'=>'btn  ',"id"=>"btncolor"])!!}

</div>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Imagenes:</h3>

      <div class="row animated fadeInUpBig" >
 @foreach($pro->images as $image)
        <div class="col-md-3 col-sm-6 mb-4" >
          <a href="#">
            <img id="imagen" class="img-fluid" src="{{ asset('partesProductos/'.$image->name) }}" alt="">
          </a>
        </div>

        @endforeach

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    @endsection
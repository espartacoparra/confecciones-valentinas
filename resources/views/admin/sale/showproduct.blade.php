@extends('admin.template.main')

@section('content')

<div class="panel panel-default "  style="background-color: transparent;">
  <div class="panel-heading" ><h4>Cliente: {{ $order->user->username }} </h4></div>
  <div class="panel-body" style="background-color: transparent;"  >

<div class="row">

        <div class="col-md-8 ">
          <div id="myCarousel" class="carousel slide animated fadeInLeftBig" data-ride="carousel">
  <!-- Indicators -->
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner  ">
    @if($pro->images != '[]')
     <?php $c=0?>
     
      @foreach($pro->images as $image)
      @if($c == 0)
    <div class="item active">
      <img  class="d-block w-100" id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    <?php $c=1?>
    @else
    <div class="item">
      <img  class="d-block w-100" id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    @endif
    @endforeach
    @else
       <div class="item active">
      <img class="d-block w-100" id="imagenslider" src="..." alt="Sin imagenes">
    </div>
   
@endif
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
          
        </div>

        <div class="col-md-4 animated fadeInUpBig" id="muestrapanel">
          <h3 class="my-3">Producto Encargado:</h3>
          <p>{{ $pro->name }}</p>
          <h3 class="my-3">Detalles</h3>
          <ul>
            
            <p>Percio: {{ $order->sale->price }} bs.S</p>
            
            <p>Tallas Del producto: {{ $order->size }} </p>
           
          </ul>
          <h3 class="my-3">Datos del Usuario</h3>
          <ul>
            <p>Nombre:  {{ $order->user->name }} </p>
            <p>Apellido: {{ $order->user->lastname }}</p>
            <p>Cedula: {{ $order->user->cedula }} </p>
            <p>Telefono: {{ $order->user->phone }} </p>
            <p>Correo: {{ $order->user->email }} </p>
          </ul>
          @if($sale->status > 0)
         
          <button class="btn btn-info"><a href="{{ asset('recibos/'.$sale->pdf[0]->pdf) }}" target="_blank" > Ver Recibo</a></button> 
          @if($sale->status == 1)
          <button class="btn btn-success">
            <a onclick="return confirm('Desea marcar este producto como pago')" href="{{ action('SaleController@verificatepay',$sale->id) }}" > Verificado</a></button>
            @endif
          @endif


    </div>
  </div>
  @if($sale->status > 0)
<br>
  <div class="panel panel-default animated fadeInUpBig" >
        <div class="panel-heading" ><h4>Dirección de entrega del producto</h4></div>
          <div class="panel-body">
           <p> {{ $sale->pdf[0]->direction }}</p>
          </div>
     </div>

@endif
</div>
@endsection


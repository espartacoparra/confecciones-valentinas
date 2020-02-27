@extends("store.template.main")
@section("content")

<style type="text/css">
  .btn-circle {
  width: 170px;
  height: 170px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 100px;
}
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
    
    width: 100%;
    height: 500px;   
    border-radius:10px; 
  }
  .contenedor{
    padding-left: 10px;
  }
</style>
       
          @include('store.template.siderbar')

<div class="col-lg-9" >

<!-- /.col-lg-3 -->
          <div class="row contenedor"  >
            <br>
<div class="panel panel-default" >
  <div class="panel-heading"><h4>Producto: {{ $pro->name }} </h4></div>
  <div class="panel-body"  >

<div class="row">

        <div class="col-md-8 animated jackInTheBox">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner ">
     @if($pro->images != '[]')
     <?php $c=0?>
     
      @foreach($pro->images as $image)
      @if($c == 0)
    <div class="carousel-item active">
      <img  class="d-block " id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    <?php $c=1?>
    @else
    <div class="carousel-item">
      <img  class="d-block " id="imagenslider" src="{{ asset('partesProductos/'.$image->name) }}" alt="First slide">
    </div>
    @endif
    @endforeach
    @else
       <div class="carousel-item active">
      <img class="d-block " id="imagenslider" src="..." alt="Sin imagenes">
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

        <div class="col-md-4 animated fadeInUpBig" id="muestrapanel">
          
          <h3 class="my-3">Detalles del Producto:</h3>
          <ul>
            <p>Percio: {{ $order->sale->price }} bs.S</p>
            <p>Talla Del producto: {{ $order->size }} </p>
          </ul>
          <h3 class="my-3">Datos de la Cuenta:</h3>
          
                 <p>Banco:PROVINCIAL</p>
                 <p>N#:01360007806506532025</p>
                 <p>Beneficiario:Espartaco Parra</p>
                 <p>Cedula:25430250</p>
         


      </div>
    </div>
  </div>

</div>
<br>
          </div>
           <br>
                 @if($order->sale->status == 0) 
          <!-- /.row -->
<div class="row contenedor">
  <div class="panel panel-default">
  <div class="panel-heading"><h4>Completar su Pedido:</h4></div>
  <div class="panel-body">

{!!Form::open(['action'=>['UserPorfileController@payorderstore',$order->sale->id],'method'=>'POST','files'=>true ])!!}

<div class="form-group">
  {!! Form::label('direction','Dereccion de entrega: solo se trabaja con Domesa, Zoom y Tealca.')!!}
  {!!Form::textarea('direction',null,['class'=>'form-control','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
{!! $errors->first("direction","<span class='help-block' style='color:red;'>:message</span>") !!}
<div >

<div class="form-group">
  {!! Form::label('pdf','Suba el Recibo de la transferencia, solo se acepta formato pdf')!!}
  {!!Form::file('pdf',['class'=>'form-control','multiple' => true,'pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
{!! $errors->first("pdf","<span class='help-block' style='color:red;'>:message</span>") !!}
<div >


<div class="form-group">
<a href="{{ action("UserPorfileController@orders") }}" class="btn btn-danger">Regresar</a>

{!! Form::submit('Enviar',['class'=>'btn btn-primary'])!!}

</div>

  </div>
</div>
       
</div>
                  
        </div>
        <!-- /.col-lg-9 -->

      </div>

      @endif
      @if($order->sale->status > 0)
      

      <div class="card  animated fadeInUpBig" id="muestrapanel" >
  <div class="card-header" id="negro" >
    <h5 class="card-title" id="letrasrosa" >Direccion de envio:</h5>
  </div>
  <div class="card-body" id="rosa" >
    
    <p id="letrasnegra" > {{ $order->sale->pdf[0]->direction }}</p>
    
  </div>
</div>


  <br>
  @endif
      <!-- /.row -->
</div>
</div>
    </div>
    <!-- /.container -->
@endsection
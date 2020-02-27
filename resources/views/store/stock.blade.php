@extends("store.template.main")
@section("content")
@include('store.template.siderbar')
<div class="col-lg-9">
 <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
           
            <div class="carousel-inner animated bounceInDown" role="listbox">
              <div class="carousel-item active ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val2.jpeg') }}" alt="Sin imagenes">
    </div>
    <div class="carousel-item ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val3.jpeg') }}" alt="Sin imagenes">
    </div>
    <div class="carousel-item ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val4.jpeg') }}" alt="Sin imagenes">
    </div>
    <div class="carousel-item ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val5.jpeg') }}" alt="Sin imagenes">
    </div>
  
    <div class="carousel-item ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val7.jpeg') }}" alt="Sin imagenes">
    </div>
    <div class="carousel-item ">
      <img class="d-block img-fluid" style="border-radius: 10px;" src="{{ asset('iconos/val8.jpeg') }}" alt="Sin imagenes">
    </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          
<!-- /.col-lg-3 -->
<div class="card animated fadeInUp"  style="background-color: transparent;">
  <div class="card-header animated infinite pulse letras" style="background-color: #1c1c1c;"  >
    <h3 class="text-center letras " style="color: #E4C1BD;">Entrega Inmediata</h3>
    <h3 class="text-center letras " style="color: #E4C1BD;">Whatsapp:+58 426-83-45-806</h3>
  </div>
  <div class="card-body " style="background-color: transparent;"  >
    <div class="row">
@foreach($pro as $p)
            <div class="col-lg-4 col-md-6 mb-4">
              <div style="border-radius: 10px; background-color:#1c1c1c;" >
                <?php $image=$p->images;?> 
                @for($i=0;$i<1;$i++)
                <a style="border-radius: 10px;"  href="{{ action("PrincipalController@product",$p->id) }}"><img class="card-img-top" src="{{ asset('partesProductos/'.$image[$i]->name) }}" alt=""></a>
                @endfor
                <div class="card-body"  style="background-color:transparent;">
                  <h4 class="card-title">
                    <a href="{{ action("PrincipalController@product",$p->id) }}"><p id="letrasrosa">{{ $p->name }}</p></a>
                  </h4>
                  
                  
                </div>
               
              </div>
            </div>
@endforeach
          </div>
  </div>
</div> 
<br>
          
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <br>
    <!-- /.container -->
@endsection
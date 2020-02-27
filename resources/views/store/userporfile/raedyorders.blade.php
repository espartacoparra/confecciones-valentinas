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
</style>
       @include('store.template.siderbar')
<div class="col-lg-9">

<!-- /.col-lg-3 -->
          
            <br>
            <div class="row">
              @if($sale[0] != null)
              <div class="col-sm-12">

                <div class="card text-center animated fadeInUp">
  <h5 class="card-header"  id="letrasrosa">PEDIDOS EN COLA PARA ENVIO</h5>
  <div class="card-body" >
   <div class="table-responsive">
    <table  class="table table-hover" datatable="ng" dt-options="dtOptions" dt-column-defs="showCase.dtColumnDefs" ">
      <thead>
      <tr>
        <th># Orden</th>
        <th>Precio</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($sale as $s)
      <tr >
        <td >{{ $s->id }}</td>
        <td >{{ $s->price}} Bs.S</td>
        
        
        <td >
        <a href="{{ action('UserPorfileController@payorder',$s->id) }}"><button id="letrasrosafondonegro" class="btn">Datos del pedido</button></a>
         <a href="{{ action('UserPorfileController@showchat',$s->id) }}"><button class="btn btn-danger"  ng-click="destroy(l.id)" id="letrasrosafondonegro">chat del producto</button></a>
        <a id="letrasrosa" href="{{ action('UserPorfileController@received',$s->id) }}"><button class="btn" id="letrasrosafondonegro">Marcar como recibido</button></a>
          </a></td>
        @endforeach
      </tr>
      </tbody>
    </table>
    <div>{!! $sale->render() !!}</div>
    
    </div>
  </div>
</div>
@else
<div class="col-sm-12">
 
<div class="card text-center animated fadeInUp">
  <div class="card-header">
    <h5 class="card-title">Infomarmacion</h5>
  </div>
  <div class="card-body"  >
    
    <p class="card-text" ><h1 id="letrasrosa" > Usted no tiene actualmnte pedidos en cola para envio </h1></p>
   
  </div>
  <div class="card-footer text-muted">
    {{ date('Y-m-d', time()) }}
  </div>
</div>
</div>
@endif
              </div>

          

             <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  

          </div>
           <br>
                  
          <!-- /.row -->
<br>
                  
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
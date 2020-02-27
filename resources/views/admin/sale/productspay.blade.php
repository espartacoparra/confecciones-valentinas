@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInRightBig" ng-app="realtime" ng-controller="charger" 
  ng-init="rutarealtime='{{$rutarealtime}}'; rutashowproduct='{{$rutashowproduct}}'; rutasend='{{ $rutasend }}';rutashowchat='{{ $rutashowchat }}'">
  <div class="panel-heading"><h4>Listados de Pedidos con Recibos de Pago </h4></div>
  <div class="panel-body"  >

@include("admin.template.angularController")
   <a target="_blank" href="{{ action("SaleController@pdfproductspay") }}"><button class="btn btn-info">    datos para envios </button></a> 

   
   <div class="table-responsive">
    <table  class="table table-hover" datatable="ng" dt-options="dtOptions" dt-column-defs="showCase.dtColumnDefs" >
    <thead>
      <tr>
        <th>Orden #</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Precio</th>
        
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
      <tr ng-repeat="l in lista">
        <td ><%l.id%></td>
        <td ><%l.user.name%></td>
        <td ><%l.created_at%></td>
        <td ><%l.price%></td>
        
        <td ><button class="btn btn-warning" ng-click="showproduct(l.id)">Datos del Pedido</button><button class="btn btn-info" ng-click="showchat(l.id)">chat del producto</button>  
          <button onclick="return confirm('Usted Esta seguro que dese amarcar este pedido como entregado')" class="btn btn-info" ng-click="send(l.id)">marcar pedido como entregado</button></td>
      </tr>
      </tbody>
    </table>
  </div>
    </div>
  </div>

</div>
@endsection


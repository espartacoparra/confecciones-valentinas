@extends('admin.template.main')

@section('content')

<div  class="panel panel-default animated fadeInRightBig" ng-app="realtime" ng-controller="charger" 
  ng-init="rutaedit='{{$rutaedit}}';rutarealtime='{{$rutarealtime}}';rutadestroy='{{ $rutadestroy }}';rutaaddimg='{{ $rutaaddimg }}';rutadeleteimg='{{ $rutadeleteimg }}';rutacreatevalue='{{ $rutacreatevalue}}'">
  <div class="panel-heading"><h4>Listados de Existencias </h4></div>
  <div class="panel-body"  >

@include("admin.template.angularController")
   <a href="{{ action("StockController@create") }}"><button class="btn btn-info">Registrar una existencia</button></a>
   <br>
    <div class="table-responsive">
  	<table  class="table table-hover" datatable="ng" dt-options="dtOptions" dt-column-defs="showCase.dtColumnDefs" >
  		<thead>
  		<tr>
  			<th>Id</th>
  			<th>Nombre</th>
  			<th>Estatus</th>
        <th>Tallas y Catidades</th>
        <th>Precio</th>
        <th>Tipo de Producto</th>
        <th>Cantidades por Tallas</th>
        <th>Opciones</th>
        <th>Imagenes</th>
  		</tr>
  		</thead>
  		<tbody>
  		<tr ng-repeat="l in lista">
  			<td ><%l.id%></td>
  			<td ><%l.name%></td>
  			<td ><%l.status%></td>
        <td > <ul><li ng-repeat="size in l.sizes"><%size.size;%>:<%size.pivot.value%></li></ul></td>
        <td  ng-repeat="price in l.prices"><%price.price%></td>
        <td  ><%l.part.name%></td>
        <td ><button class="btn btn-info" ng-click="createvalue(l.id)">Agregar</button></td>
  			<td ><button class="btn btn-warning"  ng-click="edit(l.id)">Editar</button>  <button class="btn btn-danger"  ng-click="destroy(l.id)">Supender</button></td>
        <td ><button class="btn btn-info" ng-click="addimg(l.id)">Agregar</button>  <button class="btn btn-warning"  ng-click="deleteimg(l.id)">Editar</button></td>
  		</tr>
      </tbody>
  	</table>
    </div>
  </div>

</div>
@endsection


@extends('admin.template.main')

@section('content')

<div class="panel panel-default animated fadeInRightBig" ng-app="realtime" ng-controller="charger" 
  ng-init="rutaedit='{{$rutaedit}}';rutarealtime='{{$rutarealtime}}';rutadestroy='{{ $rutadestroy }}'">
  <div class="panel-heading"><h4>Listados de Partes </h4></div>
  <div class="panel-body"  >

@include("admin.template.angularController")
<a href="{{ action("PartController@create") }}"><button class="btn btn-info">Registrar un tipo de parte</button></a>
<br>
    <div class="table-responsive">
  	<table  class="table table-hover" datatable="ng" dt-options="dtOptions" dt-column-defs="showCase.dtColumnDefs" ">
  		<thead>
  		<tr>
  			<th>Id</th>
  			<th>Nombre</th>
  			<th>Opciones</th>
  		</tr>
  		</thead>
  		<tbody>
  		<tr ng-repeat="l in lista">
  			<td ng-bind="l.id"></td>
  			<td ng-bind="l.name"></td>
  			
  			
  			<td ><button class="btn btn-warning" ng-click="edit(l.id)">Editar</button>  <button class="btn btn-danger"  ng-click="destroy(l.id)">Supender</button></td>
  		</tr>
      </tbody>
  	</table>
    </div>
  </div>

</div>
@endsection


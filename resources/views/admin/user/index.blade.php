@extends('admin.template.main')

@section('content')

<div class="panel panel-default  animated fadeInRightBig" ng-app="realtime" ng-controller="charger" 
  ng-init="rutaedit='{{$rutaedit}}';rutarealtime='{{$rutarealtime}}';rutadestroy='{{ $rutadestroy }}';rutaactivate='{{ $rutaactivate }}'">
  <div class="panel-heading"><h4>Listados de Existencias </h4></div>
  <div class="panel-body"  >

@include("admin.template.angularController")
  
    <div class="table-responsive">
    <table  class="table table-hover" datatable="ng" dt-options="dtOptions" dt-column-defs="showCase.dtColumnDefs" >
      <thead>
      <tr>
        <th>Id</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Telefono</th>
        <th>Estatus</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
      <tr ng-repeat="l in lista">
        <td ><%l.id%></td>
        <td ><%l.email%></td>
        <td ><%l.name%></td>
        <td ><%l.lastname%></td>
        <td ><%l.username%></td>
        <td ><%l.phone%></td>
        <td ><%l.status%></td>
        <td ><button class="btn btn-warning"  ng-click="edit(l.id)">Editar</button>  <button class="btn btn-danger"  ng-click="destroy(l.id)">Supender</button><button class="btn btn-info"  ng-click="activate(l.id)">Activar</button></td>

      </tr>
      </tbody>
    </table>
    </div>
  </div>

</div>
@endsection


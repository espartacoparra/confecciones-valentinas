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
          <div class="row">

            <div class="col-sm-12">
        <div class="panel panel-default animated fadeInDownBig">
  <div class="panel-heading text-center"><h4>Informacion personal</h4></div>
  <div class="panel-body">


<div class="form-group">
  {!! Form::label('name','Nombre')!!}
  {!!Form::text('name',$user->name,['class'=>'form-control','disabled','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
  {!! Form::label('name','Apellido')!!}
  {!!Form::text('name',$user->lastname,['class'=>'form-control','disabled','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
  {!! Form::label('name','Cedula')!!}
  {!!Form::text('name',$user->cedula,['class'=>'form-control','disabled','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
  {!! Form::label('name','Correo')!!}
  {!!Form::text('name',$user->email,['class'=>'form-control','disabled','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>
<div class="form-group">
  {!! Form::label('name','Telefono')!!}
  {!!Form::text('name',$user->phone,['class'=>'form-control','disabled','pleaceholder'=>'Nombre de la parte', 'required'])!!}
</div>





<div class="form-group">
<a href="{{ action("PrincipalController@stock") }}" class="btn btn-danger">Regresar</a>


</div>

  </div>
</div>
               

              </div>
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
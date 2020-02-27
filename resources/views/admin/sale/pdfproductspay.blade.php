
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    h3{
      text-align: center;
    }
  </style>
</head>
<body>
<div><h3>datos para los envios</h3></div>
@foreach($sales as $v)
<div>
  <h4>Producto:{{ $v->product->name}}</h4>
  <ul>
    <li><b>Nombre de quien recibe:</b> {{ $v->user->name}} {{  $v->user->lastname }}</li>
    <li><b>Telefono de quien recibe:</b> {{  $v->user->phone }}</li>
    <li><b>Cedula de quien recibe:</b> {{  $v->user->cedula }}</li>
    <li><b>Direccion de envio:</b> {{  $v->pdf[0]->direction }}</li>
    
</div>
@endforeach
</body>
</html>

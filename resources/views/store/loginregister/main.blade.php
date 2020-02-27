<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('templatestore/store/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('templatestore/store/css/shop-homepage.css')}}" rel="stylesheet">

  </head>

  <body style="background-color: #E4C1BD;">

    @include("store.template.navbar")
    <!-- Page Content -->
    @include("store.template.siderbar")
     @include("store.template.carusel")   

     @yield("content")
        

    @include("store.template.footer")

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('templatestore/store/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('templatestore/store/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>

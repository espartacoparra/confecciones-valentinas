
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('templatestore/store/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('templatestore/store/css/shop-homepage.css')}}" rel="stylesheet">

    <style type="text/css">
      #backgorund{
        background-color: #1c1c1c;
        font-style: italic;
      }
      body{
        font-style: italic;
        font-weight: bold;
      }
      #letrasrosa{
        color: #E4C1BD;
      }
      #letrasnegra{
        color: black;
      }
      #letrasrosafondonegro{
        color: #E4C1BD;
        font-weight: bold;
        background-color:black;
        font-style: italic; 
      }
      #letrasnegrafondorosa{
        color: black;
        font-weight: bold;
        background-color:#E4C1BD; 
        font-style: italic;
      }
      
      #btncolor{
      background-color: pink;
      font-style: italic;
      }
      #rosa{
        background-color:#E4C1BD; 
      }
      #negro{
        background-color:black; 
      }
      body{
        background-image: url({{ asset("/imagenesfondo/fondorosa.jpg") }});
        background-repeat: no-repeat;
        background-size: cover;


      }
    </style>
  </head>

  <body >

    @include("store.template.navbar")
    <!-- Page Content -->
     

     @yield("content")
        

    @include("store.template.footer")

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('templatestore/store/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('templatestore/store/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>

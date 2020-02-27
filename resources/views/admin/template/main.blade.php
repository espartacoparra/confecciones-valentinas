
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" type="text/css" href="{{asset('angular/jquery.dataTables.css')}}">
    <script src="{{asset('templateAdmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('angular/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('angular/angular.min.js')}}"></script>
    <script src="{{asset('angular/angular-datatables.min.js')}}"></script>
    
   <link rel="stylesheet" type="text/css" href="{{asset('chosen/chosen.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('cssparadatatableadmin.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
     

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('templateAdmin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- datatable de boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.min.css')}}"/>

    <!-- MetisMenu CSS -->
    <link href="{{asset('templateAdmin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('templateAdmin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('templateAdmin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('templateAdmin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
        #rosa{background-color: #E4C1BD;
                color: black;}
        #negro{background-color: #1c1c1c;
                color: #E4C1BD;}
                body{
        background-image: url({{ asset("/imagenesfondo/fondorosa.jpg") }});
        background-repeat: no-repeat;
        background-size: cover;


      }
    </style>
</head>

<body>

    <div id="wrapper">
        @include("admin.template.navbar")
        @include("admin.template.sidebar")
        
        <div id="page-wrapper" style="background-color: transparent;">
           <br>
            <div class="row" >
                
                @yield("content")

            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- scripts -->
    <!-- jQuery -->
   
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('templateAdmin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('templateAdmin/vendor/metisMenu/metisMenu.min.js')}}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('templateAdmin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('templateAdmin/vendor/morrisjs/morris.min.js')}}"></script>
   
   <!-- <script src="{{asset('templateAdmin/data/morris-data.js')}}"></script>-->
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('templateAdmin/dist/js/sb-admin-2.js')}}"></script>
    <!-- datable JavaScript -->
    <script  src="{{asset('DataTables/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('chosen/chosen.jquery.js')}}"></script>

    @yield("scripts")
</body>

</html>

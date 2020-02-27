<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Colorlib Listed Directory Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Raleway" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('templatestore/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('templatestore/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('templatestore/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('templatestore/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('templatestore/fonts/fontawesome/css/font-awesome.min.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('templatestore/css/style.css')}}">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.html" style="color: black"><img width="250px" src="{{ asset('templatestore/ConfeccionesValentinasrosa.png') }}"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active" href="{{ action("Auth\LoginController@showloginform") }}">Iniciar Sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ action("Auth\RegisterController@showregister") }}">Regístrarte</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero "  style="background-color: black;">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 animated infinite pulse">
              <a href="{{ action('PrincipalController@stock') }}"><img width="400px" height="400px" class="img-fluid" alt="Responsive image" src="{{asset('templatestore/ConfeccionesValentinassinfondo.png')}}"></a>
            </div>

           

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    
    <!-- END section -->
    
   
   
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="mb-4">¿Quienes somos?</h3>
            <p class="mb-4">somos una empresa encargada de la confección de ropa intima femenina de alta calidad.</p>
            <ul class="list-unstyled ">
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-location"></span></span><span class="">Venezuela,Estado aragua, Cagua</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-telephone"></span></span><span class="">+58 426-834-58-06</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-email"></span></span><span class="">confeccionesvalentina@gmail.com</span></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3 class="mb-4">Links</h3>
            <ul class="list-unstyled ">
              <li><a href="#"></a></li>
              <li><a href="#">Destination</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          
          <div class="col-md-3">
            <h3>Redes sociales</h3>
            <p>
              
              <a target="_blank" href="https://www.instagram.com/confecciones_valentinas/" class="p-2"><span ><img width="30px;" src="{{ asset('imagenesfondo/instagram.png') }}"></span></a>
            </p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{{asset('templatestore/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('templatestore/js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('templatestore/js/popper.min.js')}}"></script>
    <script src="{{asset('templatestore/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('templatestore/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('templatestore/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('templatestore/js/jquery.stellar.min.js')}}"></script>

    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

   

    <script src="{{asset('templatestore/js/main.js')}}"></script>
  </body>
</html>
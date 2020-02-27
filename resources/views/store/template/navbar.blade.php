<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="backgorund">
      <div class="container">
        <a class="navbar-brand" href="{{ action('PrincipalController@stock') }}"><img width="250px" src="{{ asset('templatestore/ConfeccionesValentinasrosa.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if(Auth::user() != null)
            <li class="nav-item">
                <a id="letrasrosa" style=" font-weight: bold;" class="nav-link active btn"  href="{{ action("UserPorfileController@orders") }}">Pedidos</a>
              </li>

              <li class="nav-item" style="margin-left: 2px;">
                <a id="letrasrosa" style=" font-weight: bold;" class="nav-link active btn" href="{{ action('UserPorfileController@preparation') }}">En verificación</a>
              </li>
              <li class="nav-item" style="margin-left: 2px;">
                <a id="letrasrosa" style=" font-weight: bold;" class="nav-link active btn" href="{{ action('UserPorfileController@readyorders') }}">Pedidos listos</a>
              </li>

           <li class="nav-item">
                <a id="letrasrosa" class="nav-link active" href="{{ action("UserPorfileController@index") }}">{{ Auth::user()->name }}</a>
              </li>
              <li class="nav-item">
                <a id="letrasrosa" class="nav-link active" href="{{ action("Auth\LoginController@logout") }}">cerrar Sesión</a>
              </li>
            @else
             <li class="nav-item">
                <a id="letrasrosa" class="nav-link active" href="{{ action("Auth\LoginController@showloginform") }}">Iniciar Sesión</a>
              </li>
              <li class="nav-item">
                <a id="letrasrosa" class="nav-link active" href="{{ action("Auth\RegisterController@showregister") }}">Regístrarte</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
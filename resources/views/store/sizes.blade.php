@extends("store.template.main")
@section("content")
@include('store.template.siderbar')
<div class="col-lg-9">
<script src="{{asset('angular/angular.min.js')}}"></script>
<script type="text/javascript">
  angular.module('calculadora', [],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
  .controller('calculartalla', ['$scope', function(a){
    a.tallabusto;
    a.tallatorax;
    a.resultado="";
    var medidas_banda = [66, 68.5, 71, 73.5, 76, 78.5, 81, 83.5, 86.5, 89, 91.5,94, 96.5, 99, 102.5, 103, 106.5, 109, 112, 114.5, 117, 119.5, 122];
    var medidas_banda_uk = [26, 28, 28, 30, 30, 32, 32, 34, 34, 36, 36, 38, 38, 40, 40,42, 42, 44, 44, 46, 46, 48, 48];
    var medidas_banda_sp = [70, 75, 75, 80, 80, 85, 85, 90, 90, 95, 95, 100, 100, 105, 105,110, 110, 115, 115, 120, 120, 125, 125];
    var diferencias_medida = [0, 2.5, 5, 7.5, 10, 12.5, 15, 17.5, 20, 22.5, 25, 27.5, 30,32.5, 35, 37.5, 40, 42.5, 45, 47.5];
    var copas_uk = ["AA", "A", "B", "C", "D", "DD", "E", "F", "FF", "G", "GG", "H", "HH","J", "JJ", "K", "KK", "L", "M", "MM"];
    var copas_sp = ["A", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M","O", "P", "Q", "R", "S"];

    a.calcular=function(){
      c(a.tallabusto,a.tallatorax);
    }
    function c(k,t){
      console.log("hola1");
      // variables
      var banda = -1;
      var copa = -1;
      var banda_sp;
      var banda_uk;
      var copa_sp;
      var copa_uk;
      //validar valores
      if (isNaN(k) || isNaN(t)){
        return a.resultado="Compuebe los valores introducidos";
      }
      console.log("hola2");
      //calcular controno
      var diferencia = k - t;
      if (diferencia < 0){
        return a.resultado="La medida del busto no puede ser inferior a la del tórax";
      }
      console.log("hola3");
      // ok, datos validos, buscamos la banda
      for (var b = 0; b < medidas_banda.length; b++){
              if (medidas_banda[b]>=t)
              {
                banda = medidas_banda[b];
                console.log(banda);
                break;
              }
        }
        console.log(banda == -1 || t < medidas_banda[0] || t > medidas_banda[medidas_banda.length - 1]);
      // comprobar valor de banda
      if (banda == -1 || t < medidas_banda[0] || t > medidas_banda[medidas_banda.length - 1]){
        
        return a.resultado="No encontramos datos para la medida de banda introducida, es probable que no encuentres tu talla ideal.";

      }
      // ok, tenemos una medida de banda, buscar las equivalencias
      indice_banda = medidas_banda.indexOf(banda);

      banda_sp = medidas_banda_sp[indice_banda];
      banda_uk = medidas_banda_uk[indice_banda];

      // ahora a buscar la copa
      for (var c = 0; c < diferencias_medida.length; c++){
                if (diferencias_medida[c]>=diferencia){
                        copa = diferencias_medida[c];
                        break;
                    }
      }

      // comprobamos valor de copa
     if (copa == -1){
      return a.resultado="No encontramos datos para la medida de copa introducida, es probable que no encuentres tu talla ideal.";
       }

        // ok, tenemos una copa, buscamos los valores
                indice_copa = diferencias_medida.indexOf(copa);
                copa_sp = copas_sp[indice_copa];
                copa_uk = copas_uk[indice_copa];

                return a.resultado="Su talla es: "+banda_uk+"-"+copa_uk;


    }
    
  }])
</script>
         <br>
<!-- /.col-lg-3 -->
<div class="card animated fadeInUp"  >
  <div class="card-header" style="background-color: #E4C1BD;">
    <h3 class="text-center">¿Como saber tu talla?</h3>
  </div>
  <div class="card-body" >
    <p>Para averiguar tu talla correcta de sujetador deberás indicar la medida del contorno de tórax y busto. A continuación te indicamos cómo realizar correctamente estas medidas.</p>
<h3><img class="alignleft size-full wp-image-4922" src="{{ asset("imagenesmedidas/torax.jpg") }}" alt="bra-under-bust" width="146" height="195" />Contorno del tórax</h3>
<p>Sitúa la cinta métrica justo por debajo del pecho y mide el contorno. Asegúrate que la cinta está paralela al suelo. Esta es la medida que se toma como base para calcular la talla numérica del sujetador.</p>
<h3><img class="alignleft size-full wp-image-4923" src="{{ asset("imagenesmedidas/busto.jpg") }}" alt="bra-over-bust" width="146" height="195" />Contorno del busto</h3>
<p>En esta ocasión, toma las medidas de la parte más voluminosa del pecho. Para ello, repite la operación anterior pero colocando la cinta métrica a la altura del pezón, como se indica en la imagen. Recuerda que la cinta debería estar paralela al suelo.</p>
<p>Introduce ambas medidas en la calculadora y pulsa sobre el botón Calcular. Inmediatamente obtendrás una estimación de tu talla de sujetador ideal.</p>
<h2>Tabla de tallas de sujetador</h2>
<div class="card " ng-app="calculadora" ng-controller="calculartalla" >
  <div class="card-header" style="background-color: #E4C1BD;">
    <h3>calculadora de tallas</h3>
  </div>

<div class="card-body" >
  <table>
    <tr>
      <td>
        <h4> Medida del busto</h4>
        <span>Mide el contorno de la parte más abultada de tu pecho.</span>
      </td>
      <td><div class="input-group">
            <input type="number" ng-model="tallabusto" class="form-control" aria-label="Amount (to the nearest dollar)">
              <div class="input-group-append">
                <span class="input-group-text">cm</span>
              </div>
          </div>
</td>
    </tr>
        <td>
        <h4> Medida bajo el busto</h4>
        <span>Mide el contorno justo debajo de tu pecho.</span>
      </td>
      <td><div class="input-group">
            <input type="number" ng-model="tallatorax" class="form-control" aria-label="Amount (to the nearest dollar)">
              <div class="input-group-append">
                <span class="input-group-text">cm</span>
              </div>
          </div>
</td>
    </tr>
    <tr>
      <td><br></td>
    </tr>
    <tr>
      <td><button class="btn" ng-click="calcular()" style="background-color: #E4C1BD;" >Calcular</button></td>
    </tr>
  </table>
  <br>
  <div><h3><p><%resultado%></p></h3></div>
</div>
</div>

  <br>


  
  </div>
</div> 
<br>
          
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
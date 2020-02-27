<script type="text/javascript" >
	angular.module('realtime',['datatables'],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).controller('charger',  function($scope,$http,$rootScope,DTOptionsBuilder){
		//variables
    $scope.rutaedit;
    $scope.rutadestroy;
    $scope.rutaaddimg;
    $scope.rutadeleteimg
    $scope.lista={};
    $scope.rutarealtime;
    $scope.rutacreatevalue;
    $scope.rutaactivate;
    $scope.rutashowproduct;
    $scope.rutadelorder;
    $scope.rutasend;
    $scope.rutashowchat;
    $scope.lista2={};
    $scope.imagenes;
    var rtc=0;
    $http.get("{{$rutarealtime}}").then(function(data){$scope.lista=data.data;});
    
    if ($scope.lista == $scope.lista2 && $scope.lista.length == $scope.lista2.length ){
      console.log("son iguales");
    }else{
    }

		
   
    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(11)
        .withOption('bLengthChange', false);
        //verificacion de modificacion de tablas

		setInterval(function(){
		$http.get("{{$rutarealtime }}").then(function(data){
				$scope.lista2=data.data;
				if ($scope.lista2.length == $scope.lista.length ){
          //for para recorrer la lsiar
          var l=0;
           for (var i = 0; i < $scope.lista2.length; i++){

                 if ($scope.lista2[i].updated_at != $scope.lista[i].updated_at){
                    rtc++;
                   // si el udate ap de la lista principal ha sigo modificado
                  }
                 if ($scope.lista2[i].prices){
                  //ciclo para validar cuando los precios venga
                  //validar que la lista no cabia
                    if ($scope.lista2[i].prices[0].updated_at != $scope.lista[i].prices[0].updated_at ) {
                      rtc++;
                      }   
                  }
                  if ($scope.lista2[i].sizes){
                    for (var a = 0; a < $scope.lista2[i].sizes.length; a++) {
                      if ($scope.lista2[i].sizes[a].pivot.value != $scope.lista[i].sizes[a].pivot.value ){
                            rtc++;
                       }
                    }
                  }
                 
              }
              //for para recorrer la lsiar*************************
            if (rtc > 0){
              rtc=0
                $scope.lista=data.data;
                console.log($scope.lista); 
            } 
				}else{
      $scope.lista=data.data;
          console.log($scope.lista);    
        }
		});},4000);
    //funcion para editar
		$scope.edit=function(a){
      window.location.href=change(a,$scope.rutaedit);
		}
    //funcion para eliminar
    $scope.destroy=function(a){
    window.location.href=change(a,$scope.rutadestroy);
    }
    //fincion para agregar imagenes a las existencias
    $scope.addimg=function(a){
      window.location.href=change(a,$scope.rutaaddimg);
    }
     //fincion para editar imagenes de las existencias
    $scope.deleteimg=function(a){
      window.location.href=change(a,$scope.rutadeleteimg);
    }
    //fincion para agragar valores a las tallas
    $scope.createvalue=function(a){
      window.location.href=change(a,$scope.rutacreatevalue);
    }
    $scope.activate=function(a){
      window.location.href=change(a,$scope.rutaactivate);
    }
    $scope.showproduct=function(a){
      window.location.href=change(a,$scope.rutashowproduct);
    }
    $scope.delorder=function(a){
      window.location.href=change(a,$scope.rutadelorder);
    }
    $scope.send=function(a){
      window.location.href=change(a,$scope.rutasend);
    }
    $scope.showchat=function(a){
      window.location.href=change(a,$scope.rutashowchat);
    }
    function change(a,b){
      var u=b;
      var re = /changeval/g;
      u= u.replace(re,a);
      return u;
    }
	})
</script>
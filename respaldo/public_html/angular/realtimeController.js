angular.module('realtime',['datatables'],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).controller('charger',  function($scope,$http,$rootScope,DTOptionsBuilder){
		$scope.lista=[];
    
   $scope.rutas;
    $http.get("{{ action("PartController@realtime") }}").then(function(data){$scope.lista=data.data;});
		$scope.lista2=[];
		$scope.edit;
    $scope.rt;
    console.log($scope.edit);
   

    // DataTables configurable options
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDisplayLength(11)
        .withOption('bLengthChange', false);
   
		setInterval(function(){
		$http.get("{{ action("PartController@realtime") }}").then(function(data){
				$scope.lista2=data.data;
				if ($scope.lista2.length == $scope.lista.length){
					
				}else {
      $scope.lista=data.data;
          console.log($scope.lista);    
        }
		});},4000);
	
		$scope.edit=function(a){
			var u=$scope.edit;
			var re = /changeval/g;
			u= u.replace(re,a);
			window.location.href=u;
		}
   

 
	})
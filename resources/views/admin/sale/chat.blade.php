@extends('admin.template.main')

@section('content')

<style type="text/css">

.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}

.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
</style>
        <script src="{{asset('angular/angular.min.js')}}"></script>
<script type="text/javascript">
    angular.module('realtimechat', [],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).
    controller('cargarchat',  function($scope,$http){
        $scope.lista={};
        $scope.lista2={};
        $scope.hola="hola"
        $scope.message="";
        var data={}
        $http.get("{{$rutarealtime}}").then(function(data){$scope.lista=data.data;});
    
    if ($scope.lista == $scope.lista2 && $scope.lista.length == $scope.lista2.length ){
      console.log("son iguales");
    }else{
    }

    setInterval(function(){
        $http.get("{{$rutarealtime }}").then(function(data){
                $scope.lista2=data.data;
                if ($scope.lista2.length == $scope.lista.length ){
                    console.log('son iguales');
                }else{
      $scope.lista=data.data;
          console.log($scope.lista);    
        }
        });},4000);
    console.log($scope.lista);
    $scope.enviar=function(){

        if ($scope.message != "") {
             data={chat_id:'{{ $sale->chat->id }}', user_id:'{{ \Auth::user()->id }}',message:$scope.message}
       $http.post("{{ $rutasendmessage }}",{chat_id:'{{ $sale->chat->id }}',user_id:'{{ \Auth::user()->id }}',message:$scope.message}) ;
       console.log(data);
       $scope.message="";
       }
    }
  
    });

</script>



<div class="container" ng-app="realtimechat" ng-controller="cargarchat" ng-init="rutarealtime='{{ $rutarealtime }}';rutasendmessage='{{ $rutasendmessage }}'">
    <div class="row chat-window col-xs-5 col-md-8" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
           
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - del pedido # {{ $sale->id }} </h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base" >
                    
                    <div class="row msg_container base_sent" ng-repeat="m in lista">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                              <p><%m.message%></p>
                                <time datetime="2009-11-13T20:00"><%m.created_at%></time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <p><%m.user.name%></p>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" ng-model="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" ng-click="enviar()" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
    



</div>
@endsection


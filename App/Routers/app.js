const RUTA_VISTA = '../App/Views/'

var app = angular.module("app", ['ngRoute']);

app.config(['$routeProvider',function($routeProvider) {
  
  $routeProvider
  .when('/armando', {
    templateUrl: RUTA_VISTA + 'login/ingresar.html' ,
    controller: "MainController"
  })
  .otherwise({
        redirectTo: '/'
  });   
  
}]);



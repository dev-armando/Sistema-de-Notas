const RUTA_VISTA = '../App/Views/'

var app = angular.module("app", ['ngRoute']);

app.config(['$routeProvider',function($routeProvider) {
  
  $routeProvider
  .when('/', {
    templateUrl: RUTA_VISTA + 'login/ingresar.html' ,
    controller: "login"
  })
  .when('/estudiante', {
    templateUrl: RUTA_VISTA + 'estudiantes/registrar.html' ,
    controller: "estudiantes"
  })
  .when('/notas', {
    templateUrl: RUTA_VISTA + 'notas/ver.html' ,
    controller: "notas"
  })
  .otherwise({
        redirectTo: '/'
  });   
  
}]);



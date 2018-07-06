app.controller("control" , ($scope , $rootScope ) =>  {	 

	$rootScope.menu = false
});

// Notas 
app.controller("notas" , function login($scope , $rootScope){

		
	$rootScope.menu = true
	let grado = '2do grado'
	let seccion = 'C'

	$scope.titulo = `Notas de los Estudiantes de ${grado} sección ${seccion} ` 



	$scope.tabla = [
	
		["Id" , "Nombre y Apellido", "Literal", "Imprimir"],

		[	

		{ id: 1 , nombre: "Armando Rojas" , literal : 'A'  },
		{ id: 2 , nombre: "Armando Rojas" , literal : 'C'  },
		{ id: 3 , nombre: "Agustina Perez" , literal : 'D'  },

		],

	];



} );

// estudiantes 

app.controller("estudiantes" , function estudiantes($scope , $rootScope, $http){

	
	moduloEstudiantes()
	$rootScope.menu = true

	$scope.materias = [
		{ id : 1 , texto : 'Matematica' , name:'opc1'},
		{ id : 2 , texto : 'Ciencias Sociales' , name:'opc2'},
		{ id : 3 , texto : 'Ciencias Naturales' , name:'opc3'},
		{ id : 4 , texto : 'Lenguaje' , name:'opc4'}
	];

	$scope.lugares = [
		{ id : 1 , texto : 'Turen' },
		{ id : 2 , texto : 'Araure' },
		{ id : 3 , texto : 'Acarigua' }

	];


	var data = { id : 1 , nombre : 'Turen' };

	$http.post("Test/post",  angular.toJson(data) )
		.then( 
			(r)=>{ 
				let x = angular.fromJson(r.data);
				alert(x)
			}, (r)=>{alert(r)} )


} );

// Login 

app.controller("login" , function login($scope , $rootScope, $http){

	moduloLogin()
	$rootScope.menu = false

	$scope.ingresar = () =>{

		let datos = {   usuario : $scope.usuario , clave : $scope.clave }

		$http.post( 'Usuarios/ingresar' , angular.toJson(datos)  )
			 .then( (rsp) => {

			 	let respuesta = angular.fromJson(rsp.data)

			 	if(respuesta.valida){
			 		
			 	}
			
			}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
	}


} );
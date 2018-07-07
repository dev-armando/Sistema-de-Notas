app.controller("control" , ($scope , $rootScope ) =>  {	 

	$rootScope.menu = false
});

// Notas 
app.controller("notas" , function login($scope , $rootScope, $http){

		
	$rootScope.menu = true


	let grado = '2do grado'
	let seccion = 'C'

	$scope.titulo = `Notas de los Estudiantes de ${grado} sección ${seccion} ` 


	function tabla_dato($scope){
	$http.post( 'Estudiantes/consultar'  )
			 .then( (rsp) => {
				
				$scope.resultado = rsp.data
				
			}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
	}

	tabla_dato($scope)


	$scope.tabla = [
	
		"Nombre y Apellido", "Literal","Imprimir"
	];


	$scope.btnEliminar = (id) => {

		$http.get( 'Estudiantes/eliminar/'+id  )
			 .then( (rsp) => {
				
				if(rsp.data == 1) {

					mensajeOk("Eliminado...")
					tabla_dato($scope)
				}
				else mensajeError("Error en el server")
				
			}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
	}
 


} );

// estudiantes 

app.controller("estudiantes" , function estudiantes($scope , $rootScope, $http){

	
	moduloEstudiantes()
	

	$rootScope.menu = true


	$scope.lugares = [
		{ id : 1 , texto : 'Turen' },
		{ id : 2 , texto : 'Araure' },
		{ id : 3 , texto : 'Acarigua' }

	];


	$scope.data = {}

	$scope.data.sexo  = 'f'

	$scope.data.edad = 'Sep 16, 2010' 

	$scope.data.nota = 15 

	$scope.control = false


	$scope.$watchGroup(['data.nota' , 'data.nombre'] , (nuevo,anterior)=>{

			$scope.control = true
            
            if (nuevo[0] > 20 ){

            	mensajeError("No existe nota mayor a 20")
            	$scope.control = false
            } 

             if (nuevo[0] < 1 ){

            	mensajeError("La nota al menos debe ser 01")
            	$scope.control = false
            } 

            if (nuevo[1].length < 3 ) $scope.control = false
           
            
     })	

	$scope.btnRegistrar = ()=>{

			$http.post("Estudiantes/registrar",  angular.toJson($scope.data) )
			.then( 
			(r)=>{ 
				
				$scope.data.nombre = ''

				window.location.href = '#/notas'

			}, (r)=>{alert(r)} )


	}






} );

// Login 

app.controller("login" , function login($scope , $rootScope, $http){

	moduloLogin()


	$rootScope.menu = false

	$scope.ingresar = () =>{

		let datos = {   usuario : $scope.usuario , clave : $scope.clave }

		$http.post( 'Usuarios/login' , angular.toJson(datos)  )
			 .then( (rsp) => {

			 	//let respuesta = angular.fromJson(rsp.data)
			 	if(rsp.data == 1){

			 		$scope.iniciar('Maestros');
			 		$scope.iniciar('Cursos');
			 	
			 		window.location.href = '#/notas';
			 		localStorage.ingreso = true 
			 	}
			 	else 
			 		mensajeError("Usuario o Clave Invalido")
			 	
			
			}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )



	}


	$scope.iniciar = (clase) =>{

		let resultado = false 

		$http.post(clase + '/iniciar')
			 .then( (r) => {}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )


		return resultado
	}




} );



app.controller("control" , ($scope , $rootScope ) =>  {	 

	$rootScope.menu = false
});


// literal 

app.controller("literal" , function literal($scope, $rootScope, $http){
	$rootScope.menu = true
	

	$scope.selectLiteral = ''


	$scope.btnMostrarOcultar = ()=>{

		botones()

		$scope.control = ($scope.control) ? false : true
	}




		$http.post( 'Literales/get/*'  ).then( (rsp) => {
				
		$scope.literales2 = angular.fromJson(rsp.data)  
		moduloLiteral()
		


		}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
    
	

	$scope.btnGuardar = () =>{

		$scope.data = { 'id' : $scope.lite , 'texto' : $scope.texto  }

		$http.post( 'Literales/edit/' , angular.toJson($scope.data)  )
			.then( (rsp) => {
				
			if (rsp.data == 1){ 
				mensajeOk("Guardado")
				botones()
				$scope.control = false
			}
			else 
				mensajeError("Error al Conectarse con el servidor")



		}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )


	}

	$scope.cargarTexto = () =>{

		

		$http.post( `Literales/get/${$scope.lite}`  ).then( (rsp) => {
				
		$scope.texto = angular.fromJson(rsp.data)[0]['texto']
		
		

		}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
	 	
	}


	$scope.btnEditar = () =>{ 

		$scope.control = true 
		botones()
	}
	


})


// Notas 
app.controller("notas" , function login($scope , $rootScope, $http){

		
	$rootScope.menu = true




	var grado = '2do grado'
	let seccion = 'C'

	


	function tabla_dato($scope){
	$http.post( 'Estudiantes/consultar'  )
			 .then( (rsp) => {
				
				$scope.resultado = rsp.data

				grado = $scope.resultado[0].grado

				$scope.titulo = `Notas de los Estudiantes de ${grado} sección ${seccion} ` 

				
				
			}, (rsp)=> mensajeError("Error al Conectarse con el servidor")    )
	}

	setTimeout( ()=>{ tablas() }  , 3000 )
	

	tabla_dato($scope)


	$scope.tabla = [
	
		"Nombre y Apellido", "Genero" , "Literal","Imprimir"
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


	$scope.btnVer = (id) => {

		

		window.open('Reportes/estudiantes/'+id )

	}


	$scope.btnReporte = () => {

		

		window.open('Reportes/resumen_de_rendimiento' )

	}
 


} );

// estudiantes 

app.controller("estudiantes" , function estudiantes($scope , $rootScope, $http){

	
	
	

	$rootScope.menu = true


	

	$http.post("lugares/get")
		.then( 
			(r)=>{ 
				
				$scope.lugares = r.data

				
				moduloEstudiantes()
	}, (r)=>{alert(r)} )





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

//home 

app.controller("home" , function home($scope , $rootScope , $http){


	$rootScope.menu = true 

	$http.get('Maestros/nombre').then( (rsp) =>{

		arreglo = rsp.data.split(" "); 

		$scope.maestro = arreglo[0];

	} , (rsp)=> mensajeError("Error al Conectarse con el servidor"))

})


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
			 	
			 		window.location.href = '#/home';
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



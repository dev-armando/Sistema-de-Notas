<?php 

	$coordenadas = array("B","C","O","D","V","Z","L","A");
	$longitud = 8 ;
 ?>


<form method="post" action="../cuentas/nuevo_usuario"  class="form-horizontal">
						
						<!-- Usuario  -->
						<label for="ci" class="col-sm-offset-5 control-label text-danger oculto ocultar" id=error1 >
							
						</label> 
						<div class="form-group">
						

							<div class="col-md-3 col-md-offset-3">
								<label class="form-control" id=labelUsuario >
								Nombre de Usuario:
							</label>

							</div>


							<div class="col-sm-4">
							
							
							 <div class="input-group">
	      						
	      						<input type="text" class="form-control" name="usuario"  >
	      						<div class="input-group-addon">
	      							<div class="btn btn-xs " id=botonUsuario >
	      							<i class="glyphicon glyphicon-user" ></i>
	      							</div>
	      						</div>
	    					</div>

							</div>
						</div>


						<label  class="col-sm-offset-5 control-label text-danger oculto ocultar" id=error2 ></label> 

						<div class="form-group ocultar">
							<div class="col-md-3 col-md-offset-3 ">
								<label class="form-control">
								Contraseña:
							</label>

							</div>

							<div class="col-sm-3">
						<div class="input-group">

							<input type="password" class="form-control" name="clave[]" >

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<i class="glyphicon glyphicon-lock" ></i>
									</div>
	      							
	      						</div>
	    				</div>

							</div>
						</div>



						<label  class="col-sm-offset-3 control-label text-danger oculto ocultar" id=error3 ></label> 

						<div class="form-group ocultar">
							<div class="col-md-3 col-md-offset-3 ">
								<label class="form-control">
								Repita la Contraseña:
							</label>

							</div>

							<div class="col-md-3">
						<div class="input-group">

							<input type="password" class="form-control" name="clave[]" >

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<i class="glyphicon glyphicon-lock" ></i>
									</div>
	      							
	      						</div>
	    				</div>

							</div>
						</div>



						<label  class="col-sm-offset-3 control-label text-danger oculto ocultar" id=error10 ></label> 

						<div class="form-group ocultar">
							<div class="col-md-3 col-md-offset-3 ">
								<label class="form-control">
								Respuesta secreta 
							</label>

							</div>

							<div class="col-md-3">
						<div class="input-group">

							<input type="password" class="form-control" name="clave[]" >

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<i class="glyphicon glyphicon-lock" ></i>
									</div>
	      							
	      						</div>
	    				</div>

							</div>
						</div>




						<label  class="col-sm-offset-5 control-label text-danger oculto ocultar" id=error4 ></label> 
						<div class="form-group">
							<div class="col-md-3 col-md-offset-3 ">
								<label class="form-control">
								Numero de la Tarjeta:
							</label>

							</div>

							<div class="col-sm-4">
						<div class="input-group">

							<input type="password" class="form-control" name="tarjeta" >

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<i class="glyphicon glyphicon-lock" ></i>
									</div>
	      							
	      						</div>
	    				</div>

							</div>
						</div>




						<label  class="col-sm-offset-6 control-label text-danger oculto ocultar" id=error6 > Pendejo</label> 

						<div class="form-group">
							<div class="col-md-3 col-md-offset-3 ">
								<label class="form-control">
								Clave de Acceso:
							</label>

							</div>

							<div class="col-sm-3">
						<div class="input-group">

							<input type="password" class="form-control" name="clave[]" >

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<i class="glyphicon glyphicon-lock" ></i>
									</div>
	      							
	      						</div>
	    				</div>

							</div>
						</div>


							<label  class="col-sm-offset-5 control-label text-danger oculto ocultar" id=error7 ></label> 
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3 ">
								<label class="form-control">
								Clave Coordenadas:
							</label>

							</div>

						
						</div>




						<!-- Clave Coordenadas  -->
						
						<?php for ($i=0; $i < $longitud ; $i++): ?>
						<div class="form-group">
						<?php for ($k=0; $k < count($coordenadas); $k++): ?>
						
							<div class="col-md-3">
						<div class="input-group">

							<div class="input-group-addon">
	      							
									<div class="btn btn-xs " id=botonClave >
										<?= $coordenadas[$i].($k+1) ?>
									</div>
	      							
	      						</div>

							<input type="password" class="form-control" name="coordenadas[]" >

							
	    				</div>

							</div>
					
						<?php endfor ?>
							</div>
					<?php endfor ?>
		</form>
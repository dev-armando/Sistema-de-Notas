<?php 
	
	use \Core\View;

 ?>
<section class="container login"> 

	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1  ">
			<br>

			<div class="panel">
			
				
				<div class="panel-body">
					
					<div class="jumbotron">
						
						<h1 class="text-center"> 

								<?=  (isset($mensaje)) ? $mensaje : "NO HAY MENSAJE"  ?>
						</h1>
					</div>

					
				<div class="row">
						

						<div class=" col-md-offset-4 col-md-4"  >
								<a href="../login/salir">
								<button class="btn btn-block btn-danger" id=salir   > 
									Salir 
									
								</button>
								</a>
						</div>
				
					

					</div>

				</div>

					<div class="panel-footer">
				
				<div class="row">
					
					
					<div class="col-sm-offset-1 col-sm-10 text-center">
						<a href="https://mrrojas.github.io/Portafolio/" >	
							Armando Rojas 2018 - version Beta 3.0.1
						</a>
					</div>
					
				

				</div>


					
				</div>
					
				</div>
			
				
				
			</div>


		</div>
	</div>
	<br>

	<?php for ($i=0; $i < 10 ; $i++): ?> 
		<br>
	<?php endfor ?>
</section>

<!--   Invitacion  -->

<section id=modal style="display: none">>
<?php View::render("login/modal") ?>
</section>




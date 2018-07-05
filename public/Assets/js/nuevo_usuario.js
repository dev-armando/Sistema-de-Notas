$(document).ready(function() {
	
	let usuario = $("input")



	ajax("../cuentas/test_post", function(rsp){
		alert(rsp)
	}, {data: $("input[name=coordenadas]").val()  }  );
})

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="jquery.js" type="text/javascript"></script>

	<style type="text/css">
		
		input.espacio{
			padding: 15px;
			font-size: 20px;
			margin-right: 15px;
		}pagina

	</style>

	<script>
		function pagina(datos){ 

			var accion=datos; // recibe el parametro y lo asigna a una variable 

			var miform= document.getElementById('pagina'); // busca en el documento el  id "pagina" y lo asigna a una variable

			$('#pagina').attr('action', accion); // modifica la accion del formulario para redireccionar a la pagina correcta
			
			miform.submit(); //submit = enviar
		}
	</script>


</head>
<body>

	
			<center>
					<br><br><br><br>
						<img src="pizza.jpg" width="300" height="200">
			       	<br><br><br><br>     

					<input type="button" class="espacio" onclick="pagina('ventas.php');" value="Ventas">  
					<input type="button" class="espacio" onclick="pagina('productos.php');" value="Stock"> 
					<input type="button" class="espacio" onclick="pagina('clientes.php');" value="Clientes">

				<!--	al precionar cualquier boton convoca la funcion "pagina" y pasa por parametro el texto dentro de los parentesis --> 

			</center>

			<form id="pagina" method="post" action="">
					<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
					<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
			</form>

	

</body>
</html>
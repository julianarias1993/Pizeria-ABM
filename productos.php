<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<style type="text/css">
		
		input.espacio{
			padding: 15px;
			font-size: 20px;
			margin-right: 15px;
		}

	</style>

	<script src="jquery.js" type="text/javascript"></script>

	<script type="text/javascript">

		var x = document.getElementsByTagName("input");
		var i;
		for (i = 0; i < x.length; i++) {
    		x[i].setAttribute("class", "form-control");
		}
		
		$(document).ready(function(){ //cuando se preciona un boton en la pagina se ejecuta la funcion
		   $('#nv').on('click',function(){ // busca el id "nv" y cuando se preciona se ejecura la funcion ocultar
		      $('#div').toggle(); // oculta/muestra todo el contendido que esta dentro del id "div"
		   });
		});


		function pagina(datos){ 

			var accion=datos; // recibe el parametro y lo asigna a una variable 

			var miform= document.getElementById('pagina'); // busca en el documento el  id "pagina" y lo asigna a una variable

			$('#pagina').attr('action', accion); // modifica la accion del formulario para redireccionar a la pagina correcta
			
			miform.submit(); //submit = enviar
		}

	</script>

         

</head>
<body>


	<?php  

		$usuario=$_POST["user1"];
		$contraseña=$_POST["pass1"];

   ?>
<br><br><br>
  <center>

<a href="clientes.php" class="btn btn-info">Clientes</a>
<a href="ventas.php" class="btn btn-info">Ventas</a>
<a href="productos.php" class="btn btn-info">Productos</a>

<br>

<img src="pizza.jpg" width="300" height="200"></td>
  

</center>
	
		<center>
			<input type="button" class="espacio" id="nv"  name="nv" onclick="" value="Nuevo producto">  
			<input type="button" class="espacio" id="lc"  name="lc" onclick="pagina('listaproductos.php');" value="Lista productos"> 
		</center>

		<br><br><br>
		<center>

          <table border="0" cellpadding="5" align="center" id="div" name="div" style="display:none">

			<form method="post" action="productos.php">
				<tr>
					<td>
						<input type="text" name="nombre" placeholder="Ingrese Nombre" maxlength="20" class="form-control" required/>
					</td>
				</tr>

			    <tr>
			    	<td>
			    		<input type="number" name="valor" placeholder="Ingrese Valor" maxlength="10" class="form-control" required/>
			    	</td>
			    </tr>

			    <tr>
			    	<td>
			    		<input type="number" name="cantidad" placeholder="Ingrese Cantidad" maxlength="10" class="form-control" required/>
			    	</td>
			    </tr>

			    <tr>
			    	<td><button type="submit" name="submit">Aceptar</button></td>
				</tr>

			</form>
	</center>

	<form id="pagina" method="post" action="">
					<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
					<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
	</form>


</body>
</html>

<?php 
if(isset($_POST["submit"])){

	include("conexion.php");

	$nombre=$_POST["nombre"];
	$valor=$_POST["valor"];
	$cantidad=$_POST["cantidad"];

	mysql_query("INSERT INTO productos(nombre,valor,cantidad) values ('$nombre','$valor','$cantidad')");


}
 ?>
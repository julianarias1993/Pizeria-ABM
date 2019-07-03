<script>
		function redireccionar(){ 

			var miform= document.getElementById('pagina'); // busca en el documento el  id "pagina" y lo asigna a una variable			
			miform.submit(); //submit = enviar
		}

</script>


<?php  

include("conexion.php"); // establece la conexion a la base de datos 

$usuario=$_GET["user1"];
$contraseña=$_GET["pass1"];
$dni=$_GET["dni"];

$borrar=mysql_query("DELETE FROM clientes WHERE dni =".$dni);


?>

<form id="pagina" method="post" action="listaclientes.php">
		<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
		<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
</form>


<script type="text/javascript">
	
	redireccionar();
</script>



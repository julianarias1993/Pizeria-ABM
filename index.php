<!DOCTYPE html>
<html>
<head>
	<title>PIZZERIA LOS HDP</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>

<script>
	function redirecciona(){
		var miform= document.getElementById('miformulario');
		miform.submit();
	}
</script>

	<center>
<br><br><br><br>
		<img src="pizza.jpg" width="300" height="200">

		<form method="post" action="index.php">
			<input type="text" name="usuario" placeholder="Ingrese Usuario" maxlength="10" required/> <br><br>
			<input type="password" name="contraseña" placeholder="Ingrese Contraseña" maxlength="10" required/> <br><br>
			<button type="submit" name="submit">Aceptar</button>	
		</form>

	</center>
</body>

</html>
<?php 
if(isset($_POST["submit"])){ //cuando se envio un formulario submit 

include("conexion.php"); // establece la conexion a la base de datos 

$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"];

$sql= "select * from usuario where nombre_user='$usuario' and contraseña_user='$contraseña'";
	$buscar= mysql_query($sql,$conec); //esto sirve para establecer la conexion de la consulta a la base de datos 
 	$resultado= mysql_fetch_array($buscar); //crea un vector de la consulta realizada
	$resultado1= mysql_num_rows($buscar); //cuenta los resultados de los registros obtenidos
	
	if ($resultado1==0){

		echo '<script language="javascript">alert("Los datos son incorrectos"); </script>';

	}else{ ?>
	

		<form id="miformulario" method="post" action="index1.php">
			<input id="user1" name="user1" type="hidden" value="<? echo $resultado[1]; ?>">
			<input id="pass1" name="pass1" type="hidden" value="<? echo $resultado[2]; ?>">
		</form>

	<? 

		echo "<script>";
		echo "redirecciona();";  //convoca la funcion redirecciona 
		echo "</script>";

		}
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
	<br><br><br>
  <center>

<a href="clientes.php" class="btn btn-info">Clientes</a>
<a href="ventas.php" class="btn btn-info">Ventas</a>
<a href="productos.php" class="btn btn-info">Productos</a>

<br>

<img src="pizza.jpg" width="300" height="200"></td>
  

</center>
	</center>
<?
include("conexion.php");

$dni=$_GET["dni"];
$usuario=$_GET["user1"];
$contraseña=$_GET["pass1"];


    $query = "SELECT * FROM clientes WHERE dni=$dni";
    $resultado = mysql_query($query);
      
    $file = mysql_fetch_array($resultado);   
?>
<table align=center>
<form action="modificacion.php" method="post">


				<tr>
					<td><input type="hidden" name="dni" value="<?php echo $file[0] ?>" class="form-control" /> </td>
				</tr>	

				<tr>		
					<td><input type="text" name="nombre"  value="<?php echo $file[1] ?>" class="form-control" maxlength="10" required/></td>
				</tr> 

				<tr>
					<td><input type="text" name="apellido"  value="<?php echo $file[2] ?>" class="form-control"  maxlength="10" required/></td>
				</tr>

				<tr>
					<td><input type="text" name="domicilio"  value="<?php echo $file[3] ?>" class="form-control"  maxlength="10" required/></td>
				</tr>

				<tr>
					<td><input type="number" name="telefono"  value="<?php echo $file[4] ?>" class="form-control"  maxlength="15"/></td>
				</tr>
					
				<tr>	
					<td><input type="number" name="celular"  value="<?php echo $file[5] ?>" class="form-control" maxlength="15" required/></td>
				</tr>

				<tr>
					<td><input type="text" name="mail" value="<?php echo $file[6] ?>" maxlength="35" class="form-control" required/></td>

					<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
					<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
					<input id="pass1" name="dni1" type="hidden" value="<? echo $dni ?>">
				</tr>

				<tr>
					<td><button type="submit" name="submit">Aceptar</button></td>
				</tr>

</form>	
</table>

</body>
</html>
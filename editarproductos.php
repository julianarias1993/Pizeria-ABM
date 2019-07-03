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
<?
include("conexion.php");

$id_productos=$_GET["id_productos"];
$usuario=$_GET["user1"];
$contraseña=$_GET["pass1"];


    $query = "SELECT * FROM productos WHERE id_productos=$id_productos";
    $resultado = mysql_query($query);
      
    $file = mysql_fetch_array($resultado);   
?>
<table align=center>
<form action="modificacion.php" method="post">


				<tr>		
					<td>Nombre</td><td><input type="text" name="nombre"  value="<?php echo $file[1] ?>" class="form-control" maxlength="10" required/></td>
				</tr> 

				<tr>
				<td>Precio</td>	<td><input type="number" name="valor"  value="<?php echo $file[2]?>" class="form-control"  maxlength="10" required/></td>
				</tr>

				<tr>
				<td>Stock</td>	<td><input type="text" name="cantidad"  value="<?php echo $file[3]?> " class="form-control"  maxlength="40" required/></td>
				</tr>
  
				
					<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>" class="form-control">
					<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>" class="form-control">
					<input id="pass1" name="productos" type="hidden" value="<? echo $id_productos ?>" class="form-control">
				</tr>
                  
				<tr>
				<td></td>	<td><button type="submit" name="submit">Aceptar</button></td>
				</tr>

</form>	
</table>

</body>
</html>
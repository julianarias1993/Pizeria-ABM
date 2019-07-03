<script>
		function redireccionar(){ 

			var miform= document.getElementById('pagina'); // busca en el documento el  id "pagina" y lo asigna a una variable			
			miform.submit(); //submit = enviar
		}

</script>


<?php  


if ($_POST[dni]) {
	
	include("conexion.php"); // establece la conexion a la base de datos 

$usuario=$_POST["user1"];
$contraseña=$_POST["pass1"];


$dni=$_POST["dni"];
$dni1=$_POST["dni1"];


$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$domicilio=$_POST["domicilio"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$mail=$_POST["mail"];


$actualizar =mysql_query("UPDATE clientes SET dni = '$dni', nombre = '$nombre', apellido = '$apellido', domicilio = '$domicilio', telefono = '$telefono', celular = '$celular', mail = '$mail' WHERE clientes.dni = $dni1;");


?>

<form id="pagina" method="post" action="listaclientes.php">
		<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
		<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
</form>


<script type="text/javascript">
	
	redireccionar();
</script>

<?

}

if ($_POST[productos]) {

	include("conexion.php"); // establece la conexion a la base de datos 

$usuario=$_POST["user1"];
$contraseña=$_POST["pass1"];


$id_productos=$_POST["productos"];

$nombre=$_POST["nombre"];
$valor=$_POST["valor"];
$cantidad=$_POST["cantidad"];


$actualizar =mysql_query("UPDATE productos SET nombre = '$nombre', valor = '$valor', cantidad = '$cantidad' WHERE productos.id_productos = $id_productos;");


?>

<form id="pagina" method="post" action="listaproductos.php">
		<input id="user1" name="user1" type="hidden" value="<? echo $usuario ?>">
		<input id="pass1" name="pass1" type="hidden" value="<? echo $contraseña ?>">
</form>


<script type="text/javascript">
	
	redireccionar();
</script>
	
<? } 
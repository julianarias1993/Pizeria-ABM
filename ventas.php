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
		.resultado{
			background-color: orange;
			width: 15px;
			position: relative;
			left: 150px;
			top: -15px;
			border-radius: 95px 95px 95px 95px;
			-moz-border-radius: 95px 95px 95px 95px;
			-webkit-border-radius: 95px 95px 95px 95px;
			border: 0px solid #000000;
			padding: 5px;
			text-align: center;
		}
	</style>

	<script src="jquery.js" type="text/javascript"></script>

	<script type="text/javascript">

		/*
		function deshabilita(){
			
			var d = document.getElementById("domicilioventa");
			d.setAttribute("disabled", "disabled");
		
		}
		*/
		
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

		function mensaje(){

			alert("Tu compra se agrego al carrito");

			window.location = "ventas.php";
					
		}
      

	</script>
</head>

<body>
<?php  


include("conexion.php");

    $consulta=mysql_query("SELECT * FROM ventasp");
    $resul= mysql_num_rows($consulta);

?>

		<center>
	<br><br><br><table>
<tr>

<td><a href="clientes.php" class="btn btn-info">Clientes</a></td> 
<td><a href="ventas.php" class="btn btn-info">Ventas</a></td>
<td><a href="productos.php" class="btn btn-info">Productos</a></td>
</table>
<br>
<table>

<td><img src="pizza.jpg" width="300" height="200"></td>
	
<td>
	<a href="listaventasp.php"><img src="carro.png"  width="150" height="75"> </a>
		<div class="resultado"><? echo $resul; ?></div> 
</td>
</tr>
  </table>

	
		
			<input type="button" class="espacio" id="nv"  name="nv" onclick="" value="Nueva Venta">  
			<input type="button" class="espacio" id="lc"  name="lc" onclick="pagina('listaventas.php');" value="Lista ventas"> 
		</center>

		<br><br><br>

          <table border="0" cellpadding="5" align="center" id="div" name="div" style="display:none">

			<form method="post" action="ventas.php">
				<?php if ($resul < 1) { ?>
			    <tr>
			    	<td><a href="clientes.php" class="btn btn-success">Ingrese nuevo cliente</a></td>
			    </tr>
			    <tr>
			    	<td>
			    		<!-- <select name="id_cliente" onchange="deshabilita()"/> -->
			    		<select name="id_cliente"/ class="form-control">
			    			<option value="">Seleccione cliente</option>
			    			
			    			<?  
			    				include ('conexion.php');
			    				$queryc = "SELECT * FROM clientes";
    							$resultadoc = mysql_query($queryc);
   							 	while ($filac = mysql_fetch_array($resultadoc))
   							 	{
   							?>
							<option value='<? echo $filac[dni]; ?>'> <? echo $filac[nombre]; ?><? echo $filac[apellido]; ?></option>
			    			<?  } ?>
			    		</select> 
			    	</td>
			    </tr>
			    
			    <?php } ?>

			    <tr>
			    	<td>
			    		<select name="id_producto" class="form-control" required/>
			    			<option value="">Seleccione el Producto</option>	
			    			<?  
			    				include ('conexion.php');
			    				$query = "SELECT * FROM productos";
    							$resultado = mysql_query($query);
   							 	while ($fila = mysql_fetch_array($resultado)){ ?>

							<option value='<? echo $fila[id_productos]; ?>'> <? echo $fila[nombre]; ?></option>

			    				<? } ?>
			    		</select>
			    	</td>
			    </tr>

			    <tr>
			    	<td>
			    		<input type="number" name="cantidad" placeholder="Ingrese Cantidad" maxlength="10" class="form-control" required/>
			    	</td>
			    </tr>
			   
			    <?php if ($resul < 1) { ?>

			    <tr>
			    	<td>
			    		<select name="tipodeventa" class="form-control" required/>
			    			<option value="">Tipo de venta</option>	
			    			<?  
			    				include ('conexion.php');
			    				$query1 = "SELECT * FROM tipodeventa";
    							$resultado1 = mysql_query($query1);
   							 	while ($fila1 = mysql_fetch_array($resultado1)){ ?>

							<option value='<? echo $fila1['id']; ?>'> <? echo $fila1['tipo_venta']; ?></option>

			    				<? } ?>
			    	
			    	</td>
			    </tr>
			    
			    <?php }

			    if ($resul < 1) { ?>

			    <tr>
			    	<td>
			    		<!-- <input type="text" id="domicilioventa" name="domicilioventa" placeholder="Ingrese domicilio" maxlength="30" /> -->
			    	</td>
			    </tr>

			    <?php } ?>
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

	$producto=$_POST["id_producto"];
    $cantidad=$_POST["cantidad"];
	$cliente=$_POST["id_cliente"];
	$tipoventa=$_POST["tipodeventa"];
	date_default_timezone_set('America/Argentina/Buenos_Aires');  
	$dia1=(date("d"));
	$mes=(date("m"));
	$ano=(date("Y"));
	$fecha="$dia1-$mes-$ano";


    $seleccionar=mysql_query("SELECT * FROM productos WHERE  id_productos=$producto");
    $resultadoP = mysql_fetch_array($seleccionar);

    $stock=$resultadoP[3]-$cantidad;
    $precioF=$cantidad*$resultadoP[2];


	if ($resultadoP[3]< $cantidad) {

			echo '<script language="javascript">alert("No hay stock");document.location="ventas.php';
			echo '"; </script>';
			
		}else{

			?>

				<script type="text/javascript">
					
					mensaje();
			        		
				</script>
    
    		<?

    		if ($resul == 0) {
    			mysql_query("INSERT INTO ventasp(idP_producto, fechaP, dni, total_ventasP, tipo_ventaP) values ('$producto','$fecha','$cliente', '$cantidad','$tipoventa')");
			}else{
				$cliente_carrito = mysql_query("SELECT dni, tipo_ventaP FROM ventasp");
				$vec = mysql_fetch_array($cliente_carrito);
				mysql_query("INSERT INTO ventasp(idP_producto, fechaP, dni, total_ventasP, tipo_ventaP) values ('$producto','$fecha','$vec[0]', '$cantidad','$vec[1]')");
			}
		}
	}
 ?>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<style>
      table.lista {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              border: 1px solid #dddddd;
              width: 100%;
            }

      td, th {
              
              text-align: left;
              padding: 8px;
              }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
  </style>
</head>
<body>
	

	<center>


    <?php 

        $usuario=$_POST["user1"];
        $contraseña=$_POST["pass1"];

      ?>
  
  <br><br><br><br>

<center>

<a href="clientes.php" class="btn btn-info">Clientes</a>
<a href="ventas.php" class="btn btn-info">Ventas</a>
<a href="productos.php" class="btn btn-info">Productos</a>

<br>

<img src="pizza.jpg" width="300" height="200"></td>
  

</center>
  

      <table border=1 bordercolor=black class="lista"> 

	      <tr>
          <td>Cliente</td>
          <td>Fecha</td>
          <td>Producto</td>
          <td>Valor</td>
          <td>Cantidad</td>
          <td>Tipo ventas</td>
          <td>Domicilio</td>
          <td>Total ventas</td>
          <td>Borrar</td>
          
        </tr>
        <br>

<?php  
    include ('conexion.php');

    $query = "SELECT * FROM ventas,productos,clientes WHERE productos.id_productos=ventas.id_producto AND clientes.dni=ventas.dni";
    $resultado = mysql_query($query);

    $totalV=0;

    while ($fila = mysql_fetch_array($resultado)){
           
      $total=$fila[4]*$fila[9];

           echo "<td>$fila[12] $fila[13]</td>";

           echo "<td>$fila[3] </td>"; 
           
           echo "<td>$fila[8]</td>";
        
           echo "<td>$fila[9] </td>";

           echo "<td>$fila[4]</td>";

           echo "<td>$fila[5]</td>";

           echo "<td>$fila[6]</td>";

           echo "<td>$total </td>"; 
           
           echo "<td><a href='borrarventa.php?venta=$fila[id]&user1=$usuario&pass1=$contraseña'> <img src='borrar.png' border='0' height='20' > </a> </td></tr>";  

           $totalV=$totalV+$total;  
    }

    ?>

  <h1>TOTAL FACTURADO $<? echo $totalV; ?></h1> 


</table>
</center>
</body>
</html>
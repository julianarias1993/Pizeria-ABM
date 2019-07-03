<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
<style>
      table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

      td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
              }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
  </style>
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
   <table border=0 style="margin: 0 auto;">

	      <tr>
          <td>Producto</td>
          <td>Precio</td>
          <td>Stock</td>
          <td>Editar</td>
          <td>Borrar</td>
        </tr>

<?php  
    include ('conexion.php');

    $query = "SELECT * FROM productos";
    $resultado = mysql_query($query);

    while ($fila = mysql_fetch_array($resultado)){
           
           echo "<tr><td>$fila[nombre]</td>";
           
           echo "<td>$fila[valor] $</td>"; 
           
           echo "<td>$fila[cantidad]</td>";

           echo "<td><a href='editarproductos.php?id_productos=$fila[id_productos]&user1=$usuario&pass1=$contraseña'> <img src='editar.jpg' border='0' height='20' ></a></td>"; 

           echo "<td><a href='borrarproducto.php?produ=$fila[id_productos]&user1=$usuario&pass1=$contraseña'> <img src='borrar.png' border='0' height='20' > </a> </td></tr>";    
    }

  


?>
</table>

</body>
</html>
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
  

          <table border=1 bordercolor=black>
          	<tr><td>DNI</td><td>NOMBRE</td><td>APELLIDO</td><td>DOMICILIO</td><td>TELEFONO</td><td>CELULAR<td>MAIL</td><td>EDITAR</td><td>BORRAR</td></tr>
          <?php  
          include ('conexion.php');

          $query = "SELECT * FROM clientes";
          $resultado = mysql_query($query);

          while ($fila = mysql_fetch_array($resultado)){
                 
                 echo "<tr><td>$fila[dni]</td>";
                 
                 echo "<td>$fila[nombre]</td>"; 
                 
                 echo "<td>$fila[apellido]</td>";    
                 
                 echo "<td>$fila[domicilio]</td>";
                 
                 echo "<td>$fila[telefono]</td>";

                 echo "<td>$fila[celular]</td>";

                 echo "<td>$fila[mail]</td>"; 
                            
                 echo "<td><a href='editarclientes.php?dni=$fila[dni]&user1=$usuario&pass1=$contraseña'> <img src='editar.jpg' border='0' height='20' ></a></td>"; 

                echo "<td><a href='borrar.php?dni=$fila[dni]&user1=$usuario&pass1=$contraseña'> <img src='borrar.png' border='0' height='20' > </a> </td></tr>"; 

          }

        
          ?>

          </table>
          </center>
          </body>
          </html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="jquery.js" type="text/javascript"></script>

<style  type="text/css">

.espacio{
      padding: 15px;
      font-size: 20px;
      margin-right: 15px;
    }


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
  <script>
    function pagina(datos){ 

      var accion=datos; // recibe el parametro y lo asigna a una variable 

      var miform= document.getElementById('pagina'); // busca en el documento el  id "pagina" y lo asigna a una variable

      $('#pagina').attr('action', accion); // modifica la accion del formulario para redireccionar a la pagina correcta
      
      miform.submit(); //submit = enviar
    }
  </script>

</head>
<body>
	

	<center>


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

<?php  
    include ('conexion.php');

    $query = "SELECT * FROM ventasp, productos, clientes, tipodeventa WHERE productos.id_productos=ventasp.idP_producto AND clientes.dni=ventasp.dni AND tipodeventa.id=ventasp.tipo_ventaP";
    $resultado = mysql_query($query);

    $totalPagar=0;

    while ($fila = mysql_fetch_array($resultado)){
           
      $total=$fila[8]*$fila[4];

           echo "<td>$fila[11] $fila[12]</td>"; 
           
           echo "<td>$fila[3]</td>";
        
           echo "<td>$fila[7] </td>";

           echo "<td>$fila[8]</td>";

           echo "<td>$fila[4]</td>";

           echo "<td>".$fila['tipo_venta']."</td>";// es acaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

           echo "<td>$fila[13]</td>";

           echo "<td>$total </td>"; 
           
           echo "<td><a href='borrarventap.php?ventap=$fila[idP]&user1=$usuario&pass1=$contraseña'> <img src='borrar.png' border='0' height='20' > </a> </td></tr>";    


           $totalPagar=$totalPagar+$total;
    }

?>
</table>
<table>
    <tr>
       <td>
          <form method="post" action="" >
              <input type="submit" class="espacio" value="Confirmar compra" name="comprar">  
          </form>
      </td>        
      <td>  
          <form method="post" action="" >
              <input type="submit" class="espacio" value="Cancelar venta" name="cancelar"> 
          </form>
      </td>
    </tr>
  </table>

      <h1>TOTAL A PAGAR $<? echo $totalPagar; ?></h1>  
      
</center>
</body>

<?
if(isset($_POST["comprar"])){

      include ('conexion.php');

      $query1 = "SELECT * FROM ventasp,clientes WHERE clientes.dni=ventasp.dni" ;
      $resultado1 = mysql_query($query1);


      while ($fila1 = mysql_fetch_array($resultado1)){

            
          $idP=$fila1[1];
          $fechaP=$fila1[3];
          $dniP=$fila1[2];
          $totalV=$fila1[4];
          $tipoV=$fila1[5];
          $domicilioV=$fila1[9];


          mysql_query("INSERT INTO ventas(id_producto, fecha,dni , total_ventas, tipo_venta, domicilio_ventas) values ('$idP', '$fechaP','$dniP', '$totalV','$tipoV', '$domicilioV')");


              $seleccionar=mysql_query("SELECT * FROM productos, ventas WHERE  id_producto=id_productos");

              while ($resultadoP = mysql_fetch_array($seleccionar)){

                  $stock=$resultadoP[3]-$resultadoP[7];
              
                  mysql_query("update productos set cantidad='$stock' where id_productos=".$resultadoP[0]);
              }


           mysql_query('TRUNCATE TABLE ventasp');

           ?> 
            <script type="text/javascript">
          
              alert("Compra Exitosa");

              window.location = "ventas.php";

            </script>
           <?

      }
          

     } else if (isset($_POST['cancelar'])) {

         mysql_query('TRUNCATE TABLE ventasp');

      ?>

        <script type="text/javascript">
          
            alert("Venta Cancelada");

            window.location = "ventas.php";

        </script>

      <?

     }


?>

</html>
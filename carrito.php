
<html >

<head>



    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/carrito.css">
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/stylecarrito.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/carritoform.css">
    <link type="text/css" href="css/menu.css" rel="stylesheet">
    <link rel="icon" href="img/Lambdaicon.png">

    <script src="form.js" type="text/javascript"></script>
    <script src="carrito.js" type="text/javascript"></script>
    <title>Lambda</title>
</head>

<body >
<!--Sidebar-->

<a href="index.php"><button ><span id="marcoflecha">
    <img id="fotoflecha" src="img/arrow-109.png">
</span><span id="textoboton">Volver</span></button></a>

<div id="main">
  <div id="header">

      <h1 id="logo"><a href="index.php" title="[Go to homepage]"><img class="logo" src="img/logo.png" alt=""></a></h1>


      <!-- Barra de navegacion -->
      <div id="nav">
        <?php

          session_start();
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
          {
              echo"<a href='carrito.php'><img id='iconocarrito' src='img/carrito2.png'></a>";
              echo"<span id='usuario'>". $_SESSION['usu']."</span>";
              echo "<span> | </span> <a id='logout' href='logout.php'>Cerrar sesión</a>";

          }
          else
          {
          echo "<a href='login.php'>Iniciar sesión</a> <span>|</span> <a href='registro.php'>Registrarse</a>";
          }

          ?>
      </div> <!-- Fin barra de navegacion -->

  </div> <!-- /header -->


    <!-- Menu -->

    <!-- Promo -->
    <div id="col-top"></div>            <!--espacio en blanco entre el menu y el contenido-->
    <div id="col" class="box">          <!--Arranca el contenido-->

<form action="compra.php">

 <p class="tituloform">Carrito de </p>
 <?php
     echo"<p class='tituloform'>". $_SESSION['usu'].":</p>";
   ?>

<table class="formtable">

  <tr class='formtable tablehead'>
  <td class='formtable col2'>

  <div class='pregunta preguntatexto' ><p>Titulo del jugo </p></div>
  </td>
  <td class='formtable col2'>
    <div class='pregunta preguntatexto' ><p>Cantidad </p></div>

  </td >
  <td class='formtable col2'>
       <div class='pregunta preguntatexto' ><p>Precio </p></div>

     </td >

   </tr >




  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lambda";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("SET NAMES 'utf8'");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $preciototal=0;
    $cantidadtotal=0;

    $id=$_SESSION['id'];
    $sql = "SELECT juegos.titulo as titulo,juegos.id as id, carrito_juego.cantidad as cantidad,juegos.precio as precio FROM (((usuario inner join carrito on usuario.id=carrito.idusuario)inner join carrito_juego on carrito.id=carrito_juego.idcarrito)inner join juegos on juegos.id=carrito_juego.idjuego)   WHERE usuario.id= '$id'";
    $result = $conn->query($sql);
    $i=0;
    $j=1;

        while($row = $result->fetch_assoc()) {
          echo "<tr class='formtable'>
          <td class='formtable col1'>

          <div class='pregunta preguntatexto2' ><p>". $row["titulo"] . " </p></div>
       </td>
       <td class='formtable col2'>
          <img class='minus' id='minus". $j ."' src='img/minus-256.png' onclick=' reducircantidad(\"cantidad". $j ."\",  ". $row["id"] ." , \"precio". $j ."\", \"cantidadtotal\", \"preciototal\"); ' >
          <span class='pregunta preguntatexto' id='cantidad". $j ."' ><p>". $row["cantidad"] . " </p></span>
          <img class='plus' id='plus". $j ."' src='img/plus-256.png' onclick='aumentarcantidad(\"cantidad". $j ."\",  ". $row["id"] ." , \"precio". $j ."\", \"cantidadtotal\", \"preciototal\"); '>

          </td >
          <td class='formtable col2'>
               <div class='pregunta preguntatexto' id='precio". $j ."'><p>$". $row["cantidad"]*$row["precio"] . " </p></div>

             </td >

           </tr >";
           $preciototal=$preciototal+ $row["cantidad"]*$row["precio"];
           $cantidadtotal=$cantidadtotal+$row["cantidad"];
           $j=$j+1;
        }
        echo "<tr class='formtable tablefoot'>
        <td class='formtable col2'>

        <div class='pregunta preguntatexto' ><p>Total </p></div>
     </td>
     <td class='formtable col2'>
          <div class='pregunta preguntatexto' id='cantidadtotal' >". $cantidadtotal . " </div>

        </td >
        <td class='formtable col2'>
             <div class='pregunta preguntatexto' id='preciototal' >$". $preciototal . " </div>

           </td >

         </tr >";



    $conn->close();
    ?>




</table class="formtable">
<br>
<br>
<p class="textopago">Elija forma de pago:
</p>
<select id="formapago" name="formapago" onchange="validarcompra()" title="Seleccione forma de pago">
  <option >Seleccionar..</option>
  <option value="AF">Visa</option>
  <option value="AF">Mastercard</option>
  <option value="AF">American Express</option>
  <option value="AF">PagoFacil</option>
  <option value="AF">Rapipago</option>
  <option value="AF">Santander Río</option>

  </select>
<input type="submit" id="comprar" name="compra" value="Comprar" disabled>

 </form>
<script>
function validarcompra()
{
  var cantidad= document.getElementById('cantidadtotal').innerHTML;
  var formaDePago = document.getElementById('formapago').value;
  if(cantidad==0 || formaDePago=="Seleccionar..")
  {
    document.getElementById('comprar').disabled=1;
  }
  else {
    document.getElementById('comprar').disabled=0;
  }
}
</script>






    </div> <!-- /col -->



    <div id="col-bottom" ></div>       <!--espacio en blanco entre el contenido y el bloque gris-->




</div> <!-- /main -->


</body></html>

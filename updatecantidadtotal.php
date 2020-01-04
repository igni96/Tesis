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
  session_start();
  $user=$_SESSION['id'];
  $cantidadtotal=0;

        $vecarro=mysqli_query($conn,"SELECT carrito_juego.cantidad as cantidad FROM (((usuario inner join carrito on usuario.id=carrito.idusuario)inner join carrito_juego on carrito.id=carrito_juego.idcarrito)inner join juegos on juegos.id=carrito_juego.idjuego)   WHERE usuario.id= '$user'");
      	while($row = $vecarro->fetch_assoc()) {
      		$cantidadtotal=$cantidadtotal+$row["cantidad"];
      	}


        echo " ".$cantidadtotal."  ";

?>

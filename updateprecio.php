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
  $idjuego=$_GET['idjuego'];


        $vecarro=mysqli_query($conn,"SELECT * FROM ((carrito_juego inner join carrito on carrito.id=carrito_juego.idcarrito)inner join juegos on carrito_juego.idjuego=juegos.id)  WHERE carrito.idusuario='$user' and carrito_juego.idjuego='$idjuego'");
      	$row = $vecarro->fetch_assoc();


        echo " $".$row['cantidad']*$row['precio']."  ";

?>

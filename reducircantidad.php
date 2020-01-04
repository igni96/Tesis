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

	$vecarro=mysqli_query($conn,"SELECT * FROM (carrito_juego inner join carrito on carrito.id=carrito_juego.idcarrito)  WHERE carrito.idusuario='$user' and carrito_juego.idjuego='$idjuego'");
	$v_carro=mysqli_num_rows($vecarro);



			if($v_carro>0){                          //si ya existe el juego en el carrito suma +1 a cantidad
        $row = $vecarro->fetch_assoc();
        $idcarrito=$row['idcarrito'];
        if($row['cantidad']>0)
        {
				mysqli_query($conn,"UPDATE carrito_juego set cantidad=(cantidad-1)  WHERE (carrito_juego.idcarrito='$idcarrito' and carrito_juego.idjuego='$idjuego' )");
		}
        $vecarro=mysqli_query($conn,"SELECT * FROM (carrito_juego inner join carrito on carrito.id=carrito_juego.idcarrito)  WHERE carrito.idusuario='$user' and carrito_juego.idjuego='$idjuego'");
      	$row = $vecarro->fetch_assoc();


        echo " ".$row['cantidad']."  ";
		}

?>

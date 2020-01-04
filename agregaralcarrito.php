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
				mysqli_query($conn,"UPDATE carrito_juego set cantidad=(cantidad+1)  WHERE (carrito_juego.idcarrito='$idcarrito' and carrito_juego.idjuego='$idjuego' )");
        echo " <script>location.href='carrito.php'</script>";
			}
			else{
        $vecarrousu=mysqli_query($conn,"SELECT * FROM carrito   WHERE carrito.idusuario='$user'");
        $v_carrousu=mysqli_num_rows($vecarrousu);
        if($v_carrousu>0)
        {                                                     //si el usuario ya tiene un carrito, le agrego el juego
						$reg = $vecarrousu->fetch_assoc();
						$idcarrito=$reg['id'];
						mysqli_query($conn,"INSERT INTO carrito_juego(idcarrito,idjuego,cantidad) VALUES('$idcarrito','$idjuego',1)");
            echo " <script>location.href='carrito.php'</script>";
        }
        else {                                                  //si el usuario no tiene un carrito,lo creo y le agrego el juego
          mysqli_query($conn,"INSERT INTO carrito(idusuario) VALUES('$user')");
          $vecarrousu=mysqli_query($conn,"SELECT * FROM carrito   WHERE carrito.idusuario='$user'");
          $v_carrousu=mysqli_num_rows($vecarrousu);
          $reg = $vecarrousu->fetch_assoc();
          $idcarrito=$reg['id'];
          mysqli_query($conn,"INSERT INTO carrito_juego(idcarrito,idjuego,cantidad) VALUES('$idcarrito','$idjuego',1)");
          echo " <script>location.href='carrito.php'</script>";

        }




			}


?>

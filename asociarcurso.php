<?php
$idCurso=$_POST['idCurso'];
$orden=$_POST['numeroCap'];
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "learnflix";
  $userId=$_SESSION['id'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("SET NAMES 'utf8'");
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}


	$veuser=mysqli_query($conn,"SELECT * FROM usuariocurso WHERE IdUsuario='$userId' and IdCurso='$idCurso' ");
	$v_user=mysqli_num_rows($veuser);
	$row = mysqli_fetch_assoc($veuser);

					if($v_user>0)
					{

						if($row['Progreso']<$orden)
						{
								mysqli_query($conn,"UPDATE usuariocurso set Progreso='$orden' WHERE (IdCurso= '$idCurso' AND IdUsuario='$userId')");
						}
            echo " <script>location.href='reproductor.php?numeroCap=".$orden."&idCurso=".$idCurso."'</script>";
					}
					else {

						mysqli_query($conn,"INSERT INTO usuariocurso(IdCurso,IdUsuario,Progreso) VALUES('$idCurso','$userId','$orden')");
            echo " <script>location.href='reproductor.php?numeroCap=".$orden."&idCurso=".$idCurso."'</script>";

					}




	}


?>

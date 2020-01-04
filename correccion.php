<?php



	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "learnflix";
	session_start();
	$idExamen=$_GET['IdExamen'];
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("SET NAMES 'utf8'");
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}
	$veuser=mysqli_query($conn,"SELECT * FROM examen WHERE Id='$idExamen'");
	$row = $veuser->fetch_assoc();
	$idCurso=$row["IdCurso"];
	$veuser=mysqli_query($conn,"SELECT * FROM pregunta WHERE IdExamen='$idExamen'");
	$respuestasCorrectas=0;
	$totalDePreguntas=mysqli_num_rows($veuser);
	$userid= $_SESSION['id'];
	for($i=1;$i<=$totalDePreguntas;$i++)
	{
		$respuesta=$_POST["Pregunta" . $i];
		$row = $veuser->fetch_assoc();
		if($respuesta==("Opcion" . $row["Correcta"]))
		{

				$respuestasCorrectas=$respuestasCorrectas+1;
		}
	}
	if($respuestasCorrectas>=0.6*$totalDePreguntas)
	{

		mysqli_query($conn,"INSERT INTO aprobaciones(IdUsuario,IdExamen) VALUES('$userid','$idExamen')");
		echo " <script>location.href='aprobado.php?idCurso=".$idCurso."'</script>";
	}
	else {
		echo "reprobado";
		echo " <script>location.href='reprobado.php?idCurso=".$idCurso."'</script>";
	}





?>

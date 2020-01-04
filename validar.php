<?php

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$pais= $_POST['pais'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass= $_POST['contraseña'];
	$rpass=$_POST['contraseña2'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "learnflix";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("SET NAMES 'utf8'");
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}


	$veuser=mysqli_query($conn,"SELECT * FROM usuario WHERE username='$user'");
	$v_user=mysqli_num_rows($veuser);
	$vemail=mysqli_query($conn,"SELECT * FROM usuario WHERE Mail='$email'");
	$v_mail=mysqli_num_rows($vemail);

			if($v_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail elegido ya se encuentra en uso, por favor elija uno diferente");</script> ';
				echo " <script>location.href='registro.php'</script>";
			}
			else{
					if($v_user>0)
					{
						echo ' <script language="javascript">alert("Atencion, el nombre de usuario ingresado ya esta tomado");</script> ';
						echo " <script>location.href='registro.php'</script>";
					}
					else {
						$hash=  password_hash($pass, PASSWORD_DEFAULT);
						mysqli_query($conn,"INSERT INTO usuario(Nombre,Apellido,Mail,username,Password) VALUES('$nombre','$apellido','$email','$user','$hash')");
						echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
						echo " <script>location.href='login.php'</script>";
					}




			}


?>

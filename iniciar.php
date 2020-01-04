
<?php

	session_start();
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

	$user=$_POST['usuario'];
	$pass=$_POST['contraseña'];

	$sql=mysqli_query($conn,"SELECT * FROM usuario WHERE username='$user'");
	if($v=mysqli_fetch_assoc($sql)){
			if(password_verify($pass,$v['Password'])){

						$_SESSION['id']=$v['Id'];
						$_SESSION['usu']=$v['username'];
						$_SESSION['email']=$v['Mail'];
						$_SESSION['admin']=$v['admin'];
						$_SESSION['loggedin'] = true;
						header("Location: index.php");

			}else{
						echo '<script>alert("Contraseña invalida")</script> ';

						echo "<script>location.href='login.php'</script>";
				}
	}
	else{
		if($user!=$v['username']){
					echo '<script>alert("No se a encontrado una cuenta registrada a ese nombre de usuario")</script> ';
					echo "<script>location.href='login.php'</script>";
		}

	}

?>

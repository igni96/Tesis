<?php
$nombre=$_POST['nombre'];
$descBreve=$_POST['descripcionBreve'];
$descCompleta= $_POST['descripcionCompleta'];
$tema=$_POST['tema'];
$idioma=$_POST['idioma'];
$trailer= $_POST['trailer'];
$dificultad=$_POST['dificultad'];

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["imagen"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnflix";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$veuser=mysqli_query($conn,"SELECT * FROM curso WHERE Nombre='$nombre'");
$v_user=mysqli_num_rows($veuser);
$userid=$_SESSION["id"];


        if($v_user>0)
        {
          echo ' <script language="javascript">alert("Atencion, el nombre de curso ingresado ya esta tomado");</script> ';
          echo " <script>location.href='agregarCurso.php'</script>";
        }
        else {

          mysqli_query($conn,"INSERT INTO usuario(Nombre,DescripcionBreve,DescripcionCompleta,Tema,Dificultad,Trailer,Idioma,IdCreador,Foto) VALUES('$nombre','$descBreve','$descCompleta','$tema','$dificultad','$trailer','$idioma','$userid','$target_file')");
          echo ' <script language="javascript">alert("Curso creado con éxito");</script> ';
          echo " <script>location.href='login.php'</script>";
        }




    }

?>

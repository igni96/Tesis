
<html >

<head>



    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/mainregistro.css">
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/form.css">
    <link type="text/css" href="css/menu.css" rel="stylesheet">
    <link rel="icon" href="img/Lambdaicon.png">

    <script src="form.js" type="text/javascript"></script>
    <title>Lambda</title>
</head>

<body >
<!--Sidebar-->



      <?php
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
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      {
        $userid=$_SESSION['id'];
      }else {
          echo " <script>location.href='login.php'</script>";
      }


      echo "<a href='index.php'><button ><span id='marcoflecha'>
          <img id='fotoflecha' src='img/arrow-109.png'>
      </span><span id='textoboton'>Volver</span></button></a>

      <div id='main'>

          <!-- Menu -->

          <!-- Promo -->
          <div id='col-top'></div>            <!--espacio en blanco entre el menu y el contenido-->
          <div id='col' class='box'>          <!--Arranca el contenido-->
      <br><br>


      <div id='bordebloque'>
      <p class='tituloform' style='color: white;'>Administrar cursos </p>
      <button class='botonAgregarCapitulos'><a href='agregarCurso.php'>+ Agregar curso</a></button>
      <table class='formtable'>";









$sql2="SELECT * FROM curso Where IdCreador= '$userid'";
$result2 = $conn->query($sql2) or die($conn->error);


while($row2 = $result2->fetch_assoc()) {
  $idCurso=$row2["Id"];
echo "
<tr class='formtable'>

      <td class='formtable columna1 '>
      <a class='linktabla' href='curso.php?id=".$idCurso."'>
<div style='height:100%;width:100%'>
  <div class='pregunta tituloCursoAdmin' ><p>".$row2["Nombre"]." </p></div>
 </div></a></td>
 <td class='formtable columna2'>
 <a class='linktabla' href='curso.php?id=".$idCurso."'>
 <div style='height:10px;;width:100%'>
    <button class='botonAdminCap'> Administrar capitulos</button>
    <button class='botonAdminEx'> Administrar examenes</button>

</div></a>

    </td >
    <td class='formtable columna3'>
    <a class='linktabla' href='curso.php?id=".$idCurso."'>
    <div style='height:100%;width:100%'>
      <img src='".$row2["Foto"]."' style='width: 100%;'>

</div></a>

       </td >
 </tr>";
}

$conn->close();
?>












</table class="formtable">







</div>
    </div> <!-- /col -->



    <div id="col-bottom"></div>       <!--espacio en blanco entre el contenido y el bloque gris-->




</div> <!-- /main -->


</body></html>

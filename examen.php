
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

      $idExamen=$_GET['idExamen'];
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      $conn->query("SET NAMES 'utf8'");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM examen WHERE Id=$idExamen";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      echo "<a href='curso.php?id=".$row["IdCurso"]."'><button ><span id='marcoflecha'>
          <img id='fotoflecha' src='img/arrow-109.png'>
      </span><span id='textoboton'>Volver</span></button></a>

      <div id='main'>



          <!-- Menu -->

          <!-- Promo -->
          <div id='col-top'></div>            <!--espacio en blanco entre el menu y el contenido-->
          <div id='col' class='box'>          <!--Arranca el contenido-->
      <br><br>

      <form action='correccion.php?IdExamen=".$idExamen."' method='POST'>

      <p class='tituloform'>".$row["Nombre"]."</p>

      <table class='formtable'>";

      $sql = "SELECT * FROM pregunta WHERE IdExamen=$idExamen";
      $result = $conn->query($sql);




while($row = $result->fetch_assoc()) {

              echo "
<tr class='formtable'>

    <td class='formtable '>

    <div class='pregunta preguntatextoExamen' ><p>".$row["Texto"]." </p></div>
 </td>
 <td class='formtable'>

  <input type='radio' name='Pregunta".$row["Orden"]."' value='Opcion1' > ".$row["Opcion1"]."<br>
  <input type='radio' name='Pregunta".$row["Orden"]."' value='Opcion2' > ".$row["Opcion2"]."<br>
  <input type='radio' name='Pregunta".$row["Orden"]."' value='Opcion3' > ".$row["Opcion3"]."<br>

    </td >
 </tr >";
}

$conn->close();
?>








 <tr class="formtable">
 <td class="formtable boton" colspan="2">

    <input type="submit" id="enviar" onclick="Verficiarformulario()" name="submit" value="Enviar datos">
    <input type="reset" id="resetear" onclick="Reiniciarformulario()" value="Restablecer datos">

    </td>
 </tr >



</table class="formtable">
 </form>







    </div> <!-- /col -->



    <div id="col-bottom"></div>       <!--espacio en blanco entre el contenido y el bloque gris-->




</div> <!-- /main -->


</body></html>

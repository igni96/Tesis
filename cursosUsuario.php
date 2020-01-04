
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
      //$sql0="SELECT curso.Nombre AS CursoNombre, curso.Id AS CursoId, COUNT(capitulo.Id) as cantidadDeCapitulos FROM (curso inner join capitulo on capitulo.IdCurso=curso.Id) group by curso.Id";
      //$sql0="SELECT curso.Nombre AS CursoNombre, curso.Id AS CursoId, COUNT(capitulo.Id) as cantidadDeCapitulos,COUNT(examen.Id) AS cantidadDeExamenes FROM ((curso inner join capitulo on capitulo.IdCurso=curso.Id)inner join examen on examen.IdCurso=curso.Id) group by curso.Id";
      //$sql1="SELECT examen.IdCurso, aprobaciones.IdUsuario, COUNT(aprobaciones.Id) FROM (aprobaciones inner join examen on examen.Id=aprobaciones.IdExamen) group by examen.IdCurso, aprobaciones.IdUsuario ";

      //$sql ="SELECT * FROM usuariocurso inner join (SELECT curso.Nombre AS CursoNombre, curso.Id AS CursoId, COUNT(capitulo.Id) as cantidadDeCapitulos,COUNT(examen.Id) AS cantidadDeExamenes FROM ((curso inner join capitulo on capitulo.IdCurso=curso.Id)inner join examen on examen.IdCurso=curso.Id) group by curso.Id)AS subquery on subquery.CursoId=usuariocurso.IdCurso WHERE usuariocurso.IdUsuario='$userid'";
      $sql ="SELECT * FROM usuariocurso  WHERE usuariocurso.IdUsuario='$userid'";
      $result = $conn->query($sql) or die($conn->error);

      echo "<a href='index.php'><button ><span id='marcoflecha'>
          <img id='fotoflecha' src='img/arrow-109.png'>
      </span><span id='textoboton'>Volver</span></button></a>

      <div id='main'>
      <!-- Header -->
      <div id='headerIndex'>
      <h1 id='logo'><a href='index.php' title='[Go to homepage]'><img class='logo' src='img/logo.png' alt=''></a></h1>



          <!-- Barra de navegacion -->
          <div id='nav'>";



              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
              {
                if($_SESSION['admin'])
                {
                  echo"<a href='adminCursos.php'><span id='usuario'> Administrar cursos</span></a> <span> | </span>";
                }

                echo"<a href='cursosUsuario.php'><span id='usuario'> Mis cursos</span></a>";

                echo"<span> | </span> <span id='usuario'>". $_SESSION['usu']."</span>";
                echo "<span> | </span> <a id='logout' href='logout.php'>Cerrar sesión</a>";
              }
              else
              {
              echo "<a href='login.php'>Iniciar sesión</a> <span>|</span> <a href='registro.php'>Registrarse</a>";
                echo " <script>location.href='login.php'</script>";
              }

    echo "
          </div> <!-- Fin barra de navegacion -->

      </div> <!-- /header -->
          <!-- Menu -->

          <!-- Promo -->
          <div id='col-top2'></div>            <!--espacio en blanco entre el menu y el contenido-->
          <div id='col' class='box'>          <!--Arranca el contenido-->
      <br><br>


      <div id='bordebloque'>
      <p class='tituloform' style='color: white;'>Mis cursos</p>

      <table class='formtable'>";


      echo "
      <tr class='formtable'>

          <td class='formtable columna1 '>


          <div class='pregunta preguntatextoExamen' ><p>Curso </p></div>
       </td>
       <td class='formtable columna2'>

            Porcentaje de capitulos vistos


          </td >
          <td class='formtable columna3'>

               Porcentaje de examenes completados


             </td >
       </tr >";



while($row = $result->fetch_assoc()) {

$idCurso=$row["IdCurso"];
$sql2="SELECT * FROM curso Where Id= '$idCurso'";
$result2 = $conn->query($sql2) or die($conn->error);
$row2 = $result2->fetch_assoc();

$sql3="SELECT curso.Id, count(capitulo.Id) as cantidadDeCapitulos FROM (curso inner join capitulo on capitulo.IdCurso=curso.Id)  Where curso.Id= '$idCurso' group by curso.Id";
$result3 = $conn->query($sql3) or die($conn->error);
$row3 = $result3->fetch_assoc();

$cantidadDeCapitulos=$row3["cantidadDeCapitulos"];

$progresoPorcentual=$row["Progreso"]/$cantidadDeCapitulos*100;

$sql4="SELECT curso.Id, count(examen.Id) as cantidadDeExamenes FROM (curso inner join examen on examen.IdCurso=curso.Id)  Where curso.Id= '$idCurso' group by curso.Id";
$result4 = $conn->query($sql4) or die($conn->error);
$row4 = $result4->fetch_assoc();

$cantidadDeExamenes=$row4["cantidadDeExamenes"];


$sql5="SELECT aprobaciones.IdUsuario, count(aprobaciones.IdExamen) as cantidadDeAprobaciones FROM (aprobaciones inner join examen on examen.Id=aprobaciones.IdExamen)  Where examen.IdCurso= '$idCurso' and aprobaciones.IdUsuario= '$userid' group by aprobaciones.IdUsuario";
$result5 = $conn->query($sql5) or die($conn->error);
$row5 = $result5->fetch_assoc();

$cantidadDeAprobaciones=$row5["cantidadDeAprobaciones"];
$progresoPorcentualExamenes=$cantidadDeAprobaciones/$cantidadDeExamenes*100;

echo "
<tr class='formtable'>

      <td class='formtable columna1 '>
      <a class='linktabla' href='curso.php?id=".$idCurso."'>
<div style='height:100%;width:100%'>
  <div class='pregunta preguntatextoExamen' ><p>".$row2["Nombre"]." </p></div>
 </div></a></td>
 <td class='formtable columna2'>
 <a class='linktabla' href='curso.php?id=".$idCurso."'>
 <div style='height:100%;width:100%'>
      ".$progresoPorcentual."%
</div></a>

    </td >
    <td class='formtable columna3'>
    <a class='linktabla' href='curso.php?id=".$idCurso."'>
    <div style='height:100%;width:100%'>
         ".$progresoPorcentualExamenes."%
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

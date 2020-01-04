
<html >

<head>




    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/juego.css">
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link type="text/css" href="css/menu.css" rel="stylesheet">
    <link rel="icon" href="img/Lambdaicon.png">
    <script src="slide.js" type="text/javascript"></script>

    <title>Lambda</title>
</head>

<body >
<div id="pagina">
  <!--Barralateral-->
  <div id="homepageDivizq">
      	<div id="divizq">
      		<!--<div class="divizqHeader">Juegos populares:</div>--><p class= "Barralateral">Cursos Destacados:</p>
      		<div class="divizqItems">



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

            $sql = "SELECT * FROM curso order by id desc limit 5";



            $result = $conn->query($sql);


                while($row = $result->fetch_assoc()) {

                  echo "<a class='divizqItem' href='curso.php?id=".$row["Id"]."'>".$row["Nombre"]."</a>";

                }

            $conn->close();
            ?>


  			</div>
        <p class="BarralateralIndex">Mis cursos:</p>
      		<div class="divizqItems">
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
            $idUsuario=$_SESSION["id"];
              $sql = "SELECT * FROM (curso inner join usuariocurso on curso.Id=usuariocurso.IdCurso) where usuariocurso.IdUsuario='$idUsuario' limit 5";



              $result = $conn->query($sql);


                  while($row = $result->fetch_assoc()) {

                    echo "<a class='divizqItem' href='curso.php?id=".$row["Id"]."'>".$row["Nombre"]."</a>";

                  }

              $conn->close();
              ?>
  			</div>

              <p class="Barralateral">Nuestas redes sociales:</p>

                   <table id="tablaiconos">
                  <tr>
                  <td class="celdaicono"><a href="#"><img class="iconoredsocial" src="img/iconofb.png"></a></td>
                  <td class="celdaicono"><a href="#"><img class="iconoredsocial" src="img/iconoyt.png"></a></td>

                  </tr>
                  <tr>
                  <td class="celdaicono"><a href="#"><img class="iconoredsocial" src="img/iconotw.png"></a></td>
                  <td class="celdaicono"><a href="#"><img class="iconoredsocial" src="img/iconoinsta.png"></a></td>

                  </tr>
                   </table>



  		</div>
  </div>

<div id="main">

    <!-- Header -->
    <div id="header">

        <h1 id="logo"><a href="index.php" title="[Go to homepage]"><img class="logo" src="img/logo.png" alt=""></a></h1>


        <!-- Barra de navegacion -->
        <div id="nav">
          <?php


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

            ?>
        </div> <!-- Fin barra de navegacion -->

    </div> <!-- /header -->

    <!-- Menu -->
    <div id="menu">


    <ul class="navegacion">
        <li class="primer"><a href="#">Cursos <i class="arrow down"></i></a>
            <ul class=" nivel1">
              <li  class="desplegado impar"><a href="categorias.php?categoria=Todos">Todos los cursos</a></li>
              <li class="desplegado par"><a href="categorias.php?categoria=Populares">Cursos Populares</a></li>
              <li class="desplegado impar"><a href="categorias.php?categoria=MejorValorados">Mejor Valorados</a></li>
              <li class="desplegado par"><a href="categorias.php?categoria=Novedades">Novedades</a></li>
            </ul>
        </li>
        <li class="primer"><a href="#">Tema    <i class="arrow down"></i></a>
            <ul class="nivel1">

                <li  class="desplegado impar"><a href="categorias.php?categoria=Computacion">Computación</a></li>
                <li  class="desplegado par"><a href="categorias.php?categoria=Ciencia">Ciencia</a></li>
                <li  class="desplegado par"><a href="categorias.php?categoria=Historia">Historia</a></li>
                <li  class="desplegado par"><a href="categorias.php?categoria=Idiomas">Idiomas</a></li>
                <li  class="desplegado par"><a href="categorias.php?categoria=Literatura">Literatura</a></li>

                <li  class="desplegado impar"><a href="categorias.php?categoria=Programacion">Programación</a></li>



            </ul>
        </li>
        <li class="primer"><a href="#">Idioma<i class="arrow down"></i></a>
            <ul class="nivel1">
                <li class="desplegado impar"><a href="categorias.php?categoria=Español">Español</a></li>
                <li class="desplegado impar"><a href="categorias.php?categoria=Ingles">Ingles</a></li>

                <li class="desplegado impar"><a href="categorias.php?categoria=Portugues">Portugues</a></li>

            </ul>
        </li>

    </ul>

        <!-- Formulario busqueda -->
        <div id="search" class="box">
            <form action="search.php" method="post">
                <div class="box">
                    <div id="search-input"><span class="noscreen"> </span><input type="text" size="30" name="busqueda" placeholder="Buscar:" onfocus="this.placeholder = ''"></div>
                    <div id="search-submit"><input type="submit" value=""></div>
                </div>
            </form>
        </div> <!-- /search -->


    </div> <!-- Menu fin -->
    <!-- Promo -->




    <div id="col-bottom"></div>       <!--espacio en blanco entre el contenido y el bloque gris-->


   <!--llegue hasta aca-->



    <!-- 2 columns -->
    <div id="cols2-top"></div>
    <div id="cols2" class="box">

        <!-- Blog -->



        <!-- Testimonials -->
        <div id="col-right">



            <div class="box">


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
              $id=$_GET['id'];
              $usuarioSesion=$_SESSION["id"];
              $sql0 = "SELECT * FROM usuarioCurso WHERE idCurso='$id' and IdUsuario='$usuarioSesion'";
              $result = $conn->query($sql0);
              if($row = $result->fetch_assoc())
                {$progresoUsuario=$row["Progreso"];}
              else {
                $progresoUsuario=0;
              }



              $sql = "SELECT * FROM curso WHERE id=$id";
              $result = $conn->query($sql);




                  while($row = $result->fetch_assoc()) {
                    $trailer=$row["Trailer"];
                      echo "<div id='titulojuego'>" . $row["Nombre"] . " </div>

                              <img id='portadajuego' src=" . $row["Foto"].">

                              <div id='descripcionjuego'>" . $row["DescripcionCompleta"]. "
              <br><br>

              Datos:
              <ul id='datosjuego'>
                  <li>Tema: ". $row["Tema"].".</li>
                  <li>Dificultad: ". $row["Dificultad"].".</li>

              </ul>
              </div>
              <div id='marcocompra'>

                  <form action='asociarcurso.php' method='POST'><input type='hidden' name='numeroCap' value='1' /><input type='hidden' name='idCurso' value='".$row["Id"]."' /><input type='submit' id='botonInicioCurso' value='Iniciar Curso'></button></form>


                            </div>

              <div id='CapitulosCurso'>


<div id='titulocapitulos'>Capitulos:</div>

<ul id='datosCapitulos' class=' listaCapitulos'>
";
$sql2 = "SELECT * FROM capitulo WHERE idCurso=$id";
$result = $conn->query($sql2);
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li  '><form id='my_form".$row["Orden"]."' action='asociarcurso.php' method='POST'><input type='hidden' name='numeroCap' value='".$row["Orden"]."' /><input type='hidden' name='idCurso' value='".$row["IdCurso"]."' /><a onclick=\"document.getElementById('my_form".$row["Orden"]."').submit();\">".$row["Nombre"]. "<span id='durationspace'> ";
$duration=$row["Duracion"];
$minutes=intval($duration/60);
$seconds=$duration-$minutes*60;
      echo "".$minutes.":".$seconds."</span></a></form></li>";
    }
} else {
    echo "0 results";
}




echo "
</ul>
</div>









              <div id='marcovideo'>

                  <iframe width='100%' height='200' src=".$trailer." frameborder='0' allowfullscreen></iframe>

              </div>

              <div id='CapitulosCurso'>


              <div id='titulocapitulos'>Examenes:</div>

              <ul id='datosCapitulos' class=' listaCapitulos'>
              ";
              $sql3 = "SELECT * FROM examen WHERE idCurso=$id order by Requisito";
              $result = $conn->query($sql3);
              if ($result) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                if($row["Requisito"]> $progresoUsuario)
                {
                  echo "<li class='itemExamen' style=' opacity:0.6;'><a style='cursor:default;' href='examen.php?idExamen=".$row["Id"]."' onclick='return false;' >".$row["Nombre"]. "<img class='lockimage' src='img/lock.png'></a></li>";
                }
                else {
                  echo "<li class='itemExamen'><a href='examen.php?idExamen=".$row["Id"]."'>".$row["Nombre"]. "</a></li>";
                }
              }
              } else {
              echo "0 results";
              }




              echo "
              </ul>
              </div>

              ";



                  }

              $conn->close();
              ?>



            </div> <!-- /box -->

        </div> <!-- /col-right -->

    </div> <!-- /cols2 -->
    <div id="cols2-bottom"></div>




</div> <!-- /main -->



</div><!-- /pagina -->

    <!-- Footer -->
    <div id="footer">
    <div id="footerizq">

        <div id="tituloinf">Medios de pago</div>
        <img id="mediospago" src="img/mediospago.png">

    </div>
    <div id="footercen">

        <div id="tituloinf">¿Donde estamos?</div>
        <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: -34.561988, lng: -58.456719};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Bj1b7iRfrUCeSwdOJsiD0a9AhGch3gs&callback=initMap">
    </script>

</div>

<div id="footerder">

    <div id="tituloinf">Acerca de nosotros</div>

        <div id="descripcion">
            Somos un grupo de jugadores aficionados con el objetivo de crear el mejor servicio de compra de juegos online.
             Nuestra web le permitirá adquirir los juegos que desée desde la comodidad de su casa.



        </div>
    <div id="tituloinf">Contacto</div>

    <div id="descripcion">
            Email: lambdagaming@hotmail.com  &nbsp | &nbsp  Telefono: 4786-3215 <br>
            Direccion: Av. Cabildo 2110



        </div>









</div>

</div>
 <!-- /footer -->


</body></html>

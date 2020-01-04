

<html >

<head>



    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css">
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link type="text/css" href="css/menu.css" rel="stylesheet">
    <link rel="icon" href="img/Lambdaicon.png">


    <title>Lambda</title>
</head>

<body >
<div id="pagina">
<!--Barralateral-->
<div id="homepageDivizq">
    	<div id="divizq">
    		<!--<div class="divizqHeader">Juegos populares:</div>--><p class= "BarralateralIndex">Cursos Destacados:</p>
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

            <p class="BarralateralIndex">Nuestas redes sociales:</p>

                 <table id="tablaiconos">
                <tr>
                <td class="celdaiconoIndex"><a href="#"><img class="iconoredsocial" src="img/iconofb.png"></a></td>
                <td class="celdaiconoIndex"><a href="#"><img class="iconoredsocial" src="img/iconoyt.png"></a></td>

                </tr>
                <tr>
                <td class="celdaiconoIndex"><a href="#"><img class="iconoredsocial" src="img/iconotw.png"></a></td>
                <td class="celdaiconoIndex"><a href="#"><img class="iconoredsocial" src="img/iconoinsta.png"></a></td>

                </tr>
                 </table>



		</div>
</div>

<div id="main">

    <!-- Header -->
    <div id="headerIndex">

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
    <div id="col-top"></div>            <!--espacio en blanco entre el menu y el contenido-->
    <div id="col" class="box">          <!--Arranca el contenido-->

       <div id="marco"> <p id="tituloCol" class="tituloCol">Destacados:</p> </div>

                         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <div class="item active">
                        <img style="height: 365px; width:690px;" src="img/cplusplus.jpg" alt="...">
                        <div class="carousel-caption">
                          <h3>Curso de C++</h3>

                        </div>
                      </div>
                            <div class="item">
                            <img style="height: 365px; width:690px;" src="img/word.jpg" alt="...">
                            <div class="carousel-caption">
                              <h3>Curso de Word</h3>

                            </div>
                          </div>
                          <div class="item">
                          <img style="height: 365px; width:690px;" src="img/word.jpg" alt="...">
                          <div class="carousel-caption">
                            <h3>Curso de Word</h3>

                          </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>





    </div> <!-- /col -->



    <div id="col-bottom"></div>       <!--espacio en blanco entre el contenido y el bloque gris-->


   <!--llegue hasta aca-->



    <!-- 2 columns -->
    <div id="cols2-top"></div>
    <div id="cols2" class="box">

        <!-- Blog -->



        <!-- Testimonials -->
        <div id="col-right">



            <div class="box">



                <table id="tablacursos" class="tablacursos">
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


                    $sql = "SELECT * FROM curso order by id desc limit 12";



                    $result = $conn->query($sql);
                    $i=0;

                        while($row = $result->fetch_assoc()) {
                          if($i%3==0)
                          {
                              echo "<tr>";
                          }
                          echo "<td class='tablacursos'><a href='curso.php?id=". $row["Id"] ."'><div class='bloqueimagen'><img class='imagenjuego' src=" . $row["Foto"] . "><div class='fadedbox'>
        <div class='title text titulocurso'> ". $row["Nombre"] ." </div><div class=' text descCurso'> ". $row["DescripcionBreve"] ." </div></div></div></a> </td>";
                          if($i%3==2)
                          {
                              echo "</tr>";
                          }
                          $i=$i+1;
                        }
                        if($i==1)
                        {
                          echo "<td class='tablacursos'></td><td class='tablacursos'></td>";
                        }
                        elseif($i==2)
                        {
                          echo "<td class='tablacursos'></td>";
                        }

                    $conn->close();
                    ?>




                </table>





            </div> <!-- /box -->

        </div> <!-- /col-right -->

    </div> <!-- /cols2 -->
    <div id="cols2-bottom"></div>




</div> <!-- /main -->



</div><!-- /pagina -->

    <!-- Footer -->
    <div id="footer">
    <div id="footerizq">

        <div id="tituloinf">Medios de pago habilitados</div>
        <img id="mediospago" src="img/mediospago.png">

    </div>
    <div id="footercen">

        <div id="tituloinf">Información de Contacto</div>
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

    <div id="tituloinf">Links Relevantes</div>

        <div id="descripcion">
          <ul>
            <li class="linksrelevantesfooter"><a>Aviso legal</a></li>
            <li class="linksrelevantesfooter"><a>Soporte al Cliente</a></li>
            <li class="linksrelevantesfooter"><a>Preguntas Frecuentes</a></li>
          </ul>













</div>

</div>
 <!-- /footer -->


</body></html>

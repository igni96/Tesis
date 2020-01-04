<html >

<head>



    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css">
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link type="text/css" href="css/menu.css" rel="stylesheet">
    <link rel="icon" href="img/Lambdaicon.png">
    <script src="slide.js" type="text/javascript"></script>

    <title>Lambda</title>
</head>

<body >
<div id="pagina">
<!--Sidebar-->
<div id="homepageDivizq">
    	<div id="divizq">
    		<!--<div class="divizqHeader">Juegos populares:</div>--><p class= "Sidebar">Juegos Populares:</p>
    		<div class="divizqItems">
                <a class="divizqItem" href="juego.php?id=3">Call of Duty: WWII</a>
                <a class="divizqItem" href="juego.php?id=2">FIFA 18</a>
                <a class="divizqItem" href="juego.php?id=4">Battlefield 1</a>
            </div>
            <p class="Sidebar">Categorías:</p>
            <div class="divizqItems">
                <a class="divizqItem" href="categorias.php?categoria=Más vendidos">Más vendidos</a>
                <a class="divizqItem" href="categorias.php?categoria=Novedades">Novedades</a>
                <a class="divizqItem" href="categorias.php?categoria=Próximamente">Próximamente</a>
                <a class="divizqItem" href="categorias.php?categoria=Ofertas">Ofertas</a>
                <a class="divizqItem" href="categorias.php?categoria=Especiales">Especiales</a>
                <a class="divizqItem" href="categorias.php?categoria=Realidad virtual">Realidad virtual</a>
            </div>

            <p class="Sidebar">Nuestas redes sociales:</p>

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

            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {

              echo"<a href='carrito.php'><img id='iconocarrito' src='img/carrito2.png'></a>";
              echo"<span id='usuario'>". $_SESSION['usu']."</span>";
              echo "<span> | </span> <a id='logout' href='logout.php'>Cerrar sesión</a>";
            }
            else
            {
            echo "<a href='login.php'>Iniciar sesión</a> <span>|</span> <a href='registro.php'>Registrarse</a>";
            }

            ?>
        </div> <!-- Fin barra de navegacion -->

    </div> <!-- /header -->

    <!-- Menu -->
    <div id="menu">


    <ul class="navegacion">
        <li class="primer"><a href="#">Cursos <i class="arrow down"></i></a>
            <ul class=" nivel1">
              <li  class="desplegado impar"><a href="catalogo.php">Todos los cursos</a></li>
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



                <table id="tablajuegos" class="tablajuegos">

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
                  $busqueda=$_POST['busqueda'];


                  $sql = "SELECT * FROM curso WHERE Nombre like '%$busqueda%'";
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
                    <!--<tr>
                        <td class="tablajuegos"><a href="juego.php?id=4"><img class="imagenjuego" src="img/battlefield.jpg"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=2"><img class="imagenjuego" src="img/fifa18.jpg"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=1"><img class="imagenjuego" src="img/playerunknowns-battlegrounds.jpg"></td></a>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=3"><img class="imagenjuego" src="img/callofdutyww2.png" onload="setTimeout(fix, 200);"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=5"><img class="imagenjuego" src="img/pes2018.jpg"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=6"><img class="imagenjuego" src="img/assassinscreed.jpg"></td></a>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=7"><img class="imagenjuego" src="img/overwatch.jpg"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=8"><img class="imagenjuego" src="img/darksouls.jpg"></td></a>
                        <td class="tablajuegos"><a href="juego.php?id=9"><img class="imagenjuego" src="img/farcry5.jpg"></td></a>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=10"><img class="imagenjuego" src="img/csgo.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=11"><img class="imagenjuego" src="img/gtav.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=12"><img class="imagenjuego" src="img/rocketleague.jpg"></a></td>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=13"><img class="imagenjuego" src="img/forza.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=14"><img class="imagenjuego" src="img/needforspeed.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=15"><img class="imagenjuego" src="img/nba.jpg"></a></td>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=16"><img class="imagenjuego" src="img/bendy.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=17"><img class="imagenjuego" src="img/left4dead.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=18"><img class="imagenjuego" src="img/amnesia.jpg"></a></td>
                    </tr>
                    <tr>
                        <td class="tablajuegos"><a href="juego.php?id=19"><img class="imagenjuego" src="img/outlast.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=20"><img class="imagenjuego" src="img/residentevil1.jpg"></a></td>
                        <td class="tablajuegos"><a href="juego.php?id=21"><img class="imagenjuego" src="img/residentevil2.jpg"></a></td>
                    </tr>-->

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

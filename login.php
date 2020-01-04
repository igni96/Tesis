
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/mainlogin.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/login.css">

    <link rel="icon" href="img/Lambdaicon.png">
    <script src="login.js" type="text/javascript"></script>
    <title>Lambda</title>
</head>
<body>
<a href="index.php"><button ><span id="marcoflecha">
    <img id="fotoflecha" src="img/arrow-109.png">
</span><span id="textoboton">Volver</span></button></a>

<div id="main">
    <!-- Menu -->

    <!-- Promo -->
    <div id="col-top"></div>            <!--espacio en blanco entre el menu y el contenido-->
    <div id="col" class="box">          <!--Arranca el contenido-->

<form action="iniciar.php" method="post">

 <p class="tituloform">Iniciar sesión:</p>

<div class="container">
    <label for="usuario"><p class="tituloElemento">Nombre de usuario:</p></label>
    <input type="text" style="width: 46%;" name="usuario" placeholder="Ingresar usuario" id="usuario" required>

    <label for="password"><p class="tituloElemento">Contraseña:</p></label>
    <input type="password" name="contraseña" placeholder="Ingresar contraseña" id="password" required>

    <input type="submit" value="Iniciar sesión"></input>
  </div>
 <img class="imgJuego" src="img/logo.png">
  <div class="container">
		<span class="psw"><a href="registro.php">¿No tienes una cuenta?</a></span><br>
		<span class="psw"><a onclick="alerta()">¿Olvidó su contraseña?</a></span>

    <script>
    function alerta() {
        alert("Se ha enviado un e-mail a su casilla de correo electrónico para recuperar la contraseña.");
    }
    </script>
  </div>
</form>
</div>
</div>
</body>
</html>

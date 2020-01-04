
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/maincompra.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/compra.css">

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

<div id="div1">
    <p id="titulo">¡Compra realizada con éxito!</p>
    <img class="imgTick" src="img/purchaseOk.png">
    <p id="texto">El código de su compra se enviará a la casilla de correo asociada a su cuenta dentro de las próximas 72 horas.</p>
</div>
</div>
</div>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lambda";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("SET NAMES 'utf8'");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    $id=$_SESSION['id'];
    $sql = "SELECT id FROM carrito WHERE carrito.idusuario= '$id'";
    $result = $conn->query($sql);
    $filas=mysqli_num_rows($result);
    if($filas>0)
    {
    	$row = $result->fetch_assoc();
    	$idcarrito=$row['id'];
    	mysqli_query($conn,"DELETE from carrito_juego WHERE carrito_juego.idcarrito='$idcarrito' ");
    }
    mysqli_query($conn,"DELETE from carrito WHERE carrito.idusuario='$id' ");
    $conn->close();
    ?>
</body>
</html>
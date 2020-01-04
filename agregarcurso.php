
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

<a href="index.php"><button ><span id="marcoflecha">
    <img id="fotoflecha" src="img/arrow-109.png">
</span><span id="textoboton">Volver</span></button></a>

<div id="main">



    <!-- Menu -->

    <!-- Promo -->
    <div id="col-top"></div>            <!--espacio en blanco entre el menu y el contenido-->
    <div id="col" class="box">          <!--Arranca el contenido-->

<form action="nuevoCurso.php" method="POST" enctype="multipart/form-data">

 <p class="tituloform">Crear un nuevo curso:</p>

<table id="tablaCursoNuevo" class="formtable">

<tr class="formtable">

    <td class="formtable col1">

    <div class="pregunta" ><p>Nombre del curso: </p></div>
 </td>
 <td class="formtable col2">

    <input type="text" id="nombre" name="nombre" placeholder="Completar.." title="Introduzca texto..." required="required"/>


    </td >
 </tr >

 <tr class="formtable">

     <td class="formtable col1">

     <div class="pregunta" id="preguntaDesc" ><p>Descripcion Breve: </p></div>
  </td>
  <td class="formtable col2">

     <textarea cols="40" rows="5" id="descripcionBreve" name="descripcionBreve" placeholder="Completar.." title="Introduzca texto..." required="required"></textarea>


     </td >
  </tr >
  <tr class="formtable">

      <td class="formtable col1">

      <div class="pregunta" id="preguntaDesc" ><p>Descripcion Completa: </p></div>
   </td>
   <td class="formtable col2">

      <textarea cols="40" rows="5" id="descripcionCompleta" name="descripcionCompleta" placeholder="Completar.." title="Introduzca texto..." required="required"></textarea>


      </td >
   </tr >

   <tr class="formtable">

       <td class="formtable col1">

       <div class="pregunta" ><p>Imagen: </p></div>
    </td>
    <td class="formtable col2">

       <input type="file" id="imagen" name="imagen" value="Elegir archivo" required="required"/>


       </td >
    </tr >





 <tr class="formtable">

    <td class="formtable col1">

    <div class="pregunta"><p>Seleccione tema: </p></div>
 </td>
 <td class="formtable col2">
<select id="tema" name="tema" style="width:60%;" title="Seleccione tema">
  <option >Seleccionar..</option>
  <option value="AF">Computacion</option>
  <option value="AX">Ciencia</option>
  <option value="AL">Historia</option>
  <option value="DZ">Idiomas</option>
  <option value="AS">Literatura</option>
  <option value="AD">Programacion</option>

  </select>

    </td >
 </tr >

 <tr class="formtable">

    <td class="formtable col1">

    <div class="pregunta"><p>Seleccione idioma: </p></div>
 </td>
 <td class="formtable col2">
<select id="idioma" name="idioma" name="user"style="width:60%;" title="Seleccione tema">
  <option >Seleccionar..</option>
  <option value="AF">Español</option>
  <option value="AX">Ingles</option>
  <option value="AL">Portugues</option>


  </select>

    </td >
 </tr >

 <tr class="formtable">

     <td class="formtable col1">

     <div class="pregunta" ><p>Link al trailer: </p></div>
  </td>
  <td class="formtable col2">

     <input type="text" id="trailer" name="trailer" placeholder="Completar.." title="Introduzca texto..." required="required"/>


     </td >
  </tr >


 <tr class="formtable">
  <td class="formtable col1">

  <div class="pregunta "><p>Dificultad(1-5): </p></div>
 </td>
 <td class="formtable col2">
  <input id="dificultad" type="text" name="dificultad" required   placeholder="Completar.." title="Introduzca dificultad">

  </td >
 </tr >






 <tr class="formtable">
 <td class="formtable boton" colspan="2">

    <input type="submit" id="enviar"  name="submit" value="Enviar datos">


    </td>
 </tr >



</table class="formtable">
 </form>







    </div> <!-- /col -->



    <div id="col-bottom"></div>       <!--espacio en blanco entre el contenido y el bloque gris-->




</div> <!-- /main -->


</body></html>

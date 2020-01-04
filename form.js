/*COLORES*/
var COLOR_FONDO_ERROR= '#FFB6C1';
var COLOR_FONDO_NORMAL= '#d9d9d9';
var COLOR_FONDO_EDICION= '#d9d9d9';
var COLOR_FONDO_CORRECTO= '#99ff99';
var arr=[0,0,0,0,0,0,0];

/*Expreciones regulares*/
var RE_NUM_5ENT2DEC =/(?!^0*\.0*$)^\d{1,5}(\.\d{1,2})?$/;
var RE_VACIO=/^\s*$/;
var EMAIL=/[-a-zA-Z0-9._]*+@([a-zA-Z.]*)/;

/*FUNCIONES DE COLORES DE FONDO*/
function editandoColorFondo(miID)
{  document.getElementById(miID).style.backgroundColor=COLOR_FONDO_EDICION; }
function errorColorFondo(miID)
{  document.getElementById(miID).style.backgroundColor=COLOR_FONDO_ERROR; }
function normalColorFondo(miID)
{  document.getElementById(miID).style.backgroundColor=COLOR_FONDO_NORMAL; }
function correctoColorFondo(miID)
{  document.getElementById(miID).style.backgroundColor=COLOR_FONDO_CORRECTO; }




/*FUNCION VACIO*/
function esVacio(miID) {
    var patron = RE_VACIO;
    var contenido=document.getElementById(miID).value;
    return patron.test(contenido);
}






/*VALIDAR NOMBRE*/
function validarNombre(miID)                                                            //Numero 0
{
  expr = /^[A-Z][a-zñ]+$/;
  var x = document.getElementById("nombre").value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con un Nombre que comienze con Mayuscula";
    Validacion(0,0);
  }
    else if (!expr.test(x)){

        errorColorFondo(miID);
    text = "Completar con un Nombre que comienze con Mayuscula";
    Validacion(0,0);
    }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,0);
  }document.getElementById("nombreError").innerHTML = text;
}


function validarContraseña(miID)                                                            //Numero 0
{

  var x = document.getElementById("contraseña").value;
  var y = document.getElementById("contraseña2").value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con una contraseña";
    Validacion(0,6);
  }
    else{ if (x!=y){

        errorColorFondo(miID);
    text = "Las contraseñas no coinciden";
    document.getElementById("contraseña2Error").style.color="red";
    Validacion(0,6);
    }
  else{
    correctoColorFondo(miID);
    text ="Las contaseñas coinciden";
    document.getElementById("contraseña2Error").style.color="green";
    Validacion(1,6);
  }
}document.getElementById("contraseña2Error").innerHTML = text;
}




/*VALIDAR APELLIDO*/
function validarApellido(miID)                                                            //Numero 0
{
  expr = /^[A-Z][a-zñ]+$/;
  var x = document.getElementById("apellido").value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con un Apellido que comienze con Mayuscula";
    Validacion(0,2);
  }
    else if (!expr.test(x)){

        errorColorFondo(miID);
    text = "Completar con un Apellido que comienze con Mayuscula";
    Validacion(0,2);
    }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,2);
  }document.getElementById("apellidoError").innerHTML = text;
}


/*VALIDAR DOMICILIO*/
function validarUsuario(miID)                                                        //Numero 6
{
  var x = document.getElementById(miID).value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con un Usuario";
    Validacion(0,4);
  }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,4);
  }document.getElementById("usuarioError").innerHTML = text;
}

function validarcontraseña2(miID)                                                        //Numero 6
{
  var x = document.getElementById(miID).value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con una contraseña";
    Validacion(0,3);
  }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,3);
  }document.getElementById("contraseñaError").innerHTML = text;
}




/*VALIDAR FECHA*/
function validarFecha(miID)                                                                //Numero 5
{
  expr = /^([0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01]))$/;
  var x = document.getElementById(miID).value;
     if (!expr.test(x)){
        errorColorFondo(miID);
    text = "Completar con una Fecha como la Indicada dd/mm/aaaa";
    Validacion(0,5);
    }
  else{
    normalColorFondo(miID)
    text ="";
    Validacion(1,5);
  }document.getElementById("fechaError").innerHTML = text;
}

/*VALIDAR EMAIL*/
function validarEmail(miID)                                                              //Numero 1
{
  expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var x = document.getElementById("email").value;
    if (esVacio(miID)) {
      errorColorFondo(miID);
    text ="Completar con una email de la forma ejemplo@prueba.com";
    Validacion(0,1);
  }
    else if (!expr.test(x)){

        errorColorFondo(miID);
    text = "Completar con una email de la forma ejemplo@prueba.com";
    Validacion(0,1);
    }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,1);
  }document.getElementById("emailError").innerHTML = text;
}

function validarpais(miID)                                                        //Numero 7
{
  var x = document.getElementById(miID).value;
    if (x=="Seleccionar..") {
      errorColorFondo(miID);
    text ="Elegir un pais";
    Validacion(0,7);
  }
  else{
    normalColorFondo(miID);
    text ="";
    Validacion(1,7);
  }document.getElementById("paisError").innerHTML = text;
}


/*RESETEAR FORMULARIO*/

function Reiniciarformulario()
{
  document.getElementById("nombre").value="";
  normalColorFondo("nombre");
  document.getElementById("nombreError").innerHTML="";
  document.getElementById("apellido").value="";
  normalColorFondo("apellido");
  document.getElementById("apellidoError").innerHTML="";
  document.getElementById("email").value="";
  normalColorFondo("email");

  document.getElementById("emailError").innerHTML="";

  document.getElementById("usuario").value="";
  normalColorFondo("usuario");
  document.getElementById("usuarioError").innerHTML="";
  document.getElementById("contraseña").value="";
  document.getElementById("contraseña2").value="";
  normalColorFondo("contraseña2");
  document.getElementById("contraseñaError").innerHTML="";
   normalColorFondo("contraseña");
  document.getElementById("contraseña2Error").innerHTML="";

  document.getElementById("pais").value="";
  normalColorFondo("pais");
  document.getElementById("paisError").innerHTML="";
  document.getElementById("fechaNac").value="";
  normalColorFondo("fechaNac");
  document.getElementById("fechaError").innerHTML="";
  document.getElementById("buscadorError").innerHTML="";
  document.getElementById("radio01").checked=0;
  document.getElementById("radio02").checked=0;





}

function Verficiarformulario()
{

  validarEmail('email');
  validarFecha('fechaNac');
  validarNombre('nombre');

  validarApellido('apellido');

  validarpais('pais');
  validarUsuario('usuario');
  validarcontraseña2('contraseña');
  validarContraseña('contraseña2');




}

/*VALIDAR FORMULARIO*/

function Validacion(num,pos)
{

  arr[pos]=num;


  if( (arr[0]==1) && (arr[1]==1) && (arr[2]==1) && (arr[3]==1) && (arr[4]==1) && (arr[5]==1) && (arr[6]==1) )
  {
    Confirmacion(1);
  }
  else
  {
    Confirmacion(0);
  }


}



function Confirmacion(x) {

    /*if(!x)
       {
        document.getElementById("enviar").disabled = 0;
        }
    else
      {
        document.getElementById("enviar").disabled = 0;
      }
*/


}

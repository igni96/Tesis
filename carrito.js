function aumentarcantidad(miID,idju,miID2,miID3,miID4) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(miID).innerHTML = this.responseText;
     updatecantidadtotal(miID3);
     updateprecio(miID2,miID4,idju);

    }

  };


  xhttp.open("GET", "aumentarcantidad.php?idjuego="+idju, true);
  xhttp.send();

}





function reducircantidad(miID,idju,miID2,miID3,miID4) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(miID).innerHTML = this.responseText;
     updatecantidadtotal(miID3);
     updateprecio(miID2,miID4,idju);
    }
  };
  xhttp.open("GET", "reducircantidad.php?idjuego="+idju, true);
  xhttp.send();
}

function updateprecio(miID,miID2,idju) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(miID).innerHTML = this.responseText;
     updatepreciototal(miID2);

    }

  };


  xhttp.open("GET", "updateprecio.php?idjuego="+idju, true);
  xhttp.send();

}

function updatecantidadtotal(miID) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(miID).innerHTML = this.responseText;
     validarcompra();
    }

  };


  xhttp.open("GET", "updatecantidadtotal.php", true);
  xhttp.send();

}

function updatepreciototal(miID) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(miID).innerHTML = this.responseText;

    }

  };


  xhttp.open("GET", "updatepreciototal.php", true);
  xhttp.send();

}

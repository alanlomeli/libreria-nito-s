var backendnitos="http://localhost/libreria-nito-s/nitosback/";
var backendSketis="http://localhost/libreria-nito-s/nitosback/";
const peticionBarnav = new XMLHttpRequest();
var respuestaVerificarSesion;
const peticionVerificarSesion = new XMLHttpRequest();
var  tipoCuenta;
peticionBarnav.open("POST", "barnav.html");
peticionBarnav.send();

peticionBarnav.onload = function () {
  document.getElementById("insertar-barra").innerHTML = `${this.responseText}`;
  peticionVerificarSesion.open("POST",backendnitos+"verificar_sesion.php");
  peticionVerificarSesion.withCredentials = true;
  peticionVerificarSesion.send();
};

peticionVerificarSesion.onload = function () {
  respuestaVerificarSesion=JSON.parse(this.responseText);
  if (respuestaVerificarSesion.success === true) {
    document.getElementById("nombre-persona").innerHTML = `bienvenid@ ${respuestaVerificarSesion.nombre}`;

    if (respuestaVerificarSesion.tipo === 2) {
      document.getElementById("menu-personalizado").innerHTML = `
                  <a href="creadores.html">creadores de contenido</a>
                  <a href="nuevoEvento.html">crear evento</a>
                  <a href="articulos.html">libros</a>
                  `;
      tipoCuenta = 2;
      document.getElementById("carro-opcion").innerHTML=`
                  <a href="carrito.html">
                  <img src="/libreria-nito-s/nitos/Assets/icons/bookmark.png" class="shopping-icon">
                  </a>`;

    } else if (respuestaVerificarSesion.tipo === 3) {
      document.getElementById("menu-personalizado").innerHTML = `
                  <a href="articulos.html">libros</a>`;
      tipoCuenta = 3;

    }else if (respuestaVerificarSesion.tipo === 1)
     {

    }

  } else {

    document.getElementById("menu").innerHTML = ``;
    document.getElementById("carro-opcion").innerHTML=`
                  <a href="carrito.html">
                  <img src="/libreria-nito-s/nitos/Assets/icons/bookmark.png" class="shopping-icon">
                  </a>`;

  }

};

function login(){
  if(!(tipoCuenta === 1||tipoCuenta === 2||tipoCuenta === 3)) {
    window.location.href = 'login.html';
  }
}

function cerrar_sesion(){
  tipoCuenta=0;
  var respuestaCerrarSesion;
  const peticionCerrarSesion = new XMLHttpRequest();
  peticionCerrarSesion.onload = function () {
    respuestaCerrarSesion=JSON.parse(this.responseText);
    if(respuestaCerrarSesion.success===true){
      window.location.href = 'login.html';
    }
  };

  peticionCerrarSesion.open("POST",backendnitos+"cerrar_sesion.php",true);
  peticionCerrarSesion.withCredentials = true;
  peticionCerrarSesion.send();
}






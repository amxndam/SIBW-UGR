
/*variables globales*/
palabrotas = ["gilipollas", "puta", "mierda", "pringado", "tonto", "tonta", "zorra", "idiota", "capullo", "joder"];
palabra = "";


function openNav() {
  document.getElementById("espacioCom").style.width = "500px";
}


function closeNav() {
  document.getElementById("espacioCom").style.width = "0";
}

n 

function publicarComentario(event) {

  event.preventDefault();

  if(document.getElementById("nombre").value.length == 0 || document.getElementById("email").value.length == 0 ||
    document.getElementById("comentarioUsu").value.length == 0){

    alert("Todos los campos deben de estar completos"); 

  }

  else if(!comprobarEmail(document.getElementById("email").value)){
    alert("El email es incorrecto");

  }

  else{
    
    var listaCom = document.createElement("DIV");

    listaCom.classList.add("comentario");

    var contenido_nombre = document.createElement("nombre");
    contenido_nombre.innerHTML= document.getElementById("nombre").value;

    var contenido_email = document.createElement("email");
    contenido_email.innerHTML= document.getElementById("email").value;
    
    var contenido_comentario = document.createElement("P");
    contenido_comentario.innerHTML = document.getElementById("comentarioUsu").value
      
    var contenido_fecha = document.createElement("P");
    var fecha = new Date();
    contenido_fecha.classList.add("com_fecha");

    //al mes hay que sumarle un 1 porque empieza en 0 y a minutos si es > 10, hay que añadirle un 0
    if(fecha.getMinutes() < 10)
      contenido_fecha.innerHTML = fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" 
                                + fecha.getFullYear() + " " + fecha.getHours() + ":0" + fecha.getMinutes();
    

    else
      contenido_fecha.innerHTML = fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" 
                                + fecha.getFullYear() + " " + fecha.getHours() + ":" + fecha.getMinutes();
      
    listaCom.appendChild(contenido_nombre);
    listaCom.appendChild(contenido_comentario);
    listaCom.appendChild(contenido_fecha);

    document.getElementById("next").insertAdjacentElement("afterend",listaCom);


    //limpiamos los campos
    document.getElementById("nombre").value = '';
    document.getElementById("email").value = '';
    document.getElementById("comentarioUsu").value = '';

    return false;
      
  }
 
}


function comprobarEmail(email) {
  return ( (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i).test(email));
}



function censura(palabra){

  var comment = document.getElementById("comentarioUsu");
  var commentCensurado = " ";

      
  for(var j=0; j<palabra.length; j++){ 
    commentCensurado += "*";
  }

  var comentarioCen = comment.value.substring( 0, comment.value.length - palabra.length ) + commentCensurado; 
  comment.value = comentarioCen;
}


function comprueba(event){

  var comment = document.getElementById("comentarioUsu");
  var key = String.fromCharCode(event.keyCode).toLowerCase(); //se recoge lo que se ha escrito con el teclado
  var letra = /[a-zA-Z]/;
  
  //si es una letra, lo añadimos a la variable palabra
  if(letra.test(key))
    palabra += key;

  //si es un signo o espacio, significa que ya ha terminado la palabra, y lo comprobamos para censurarla
  else if(key == "."||key == " " || key == ","|| key == "?"|| key == "!"|| key == ":"){ 
  
    for(var i=0; i<palabrotas.length; i++){
      if(palabra === palabrotas[i])
        censura(palabra);

    }
      
    palabra = ""; 

  }

}


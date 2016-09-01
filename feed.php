<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>
<body>
    <header>
        <?php include "navigationsleiste.php";?>
    </header>
    <main>
        <?php include "neuer_plan_dialog.php";?>

        <section id="feed-container">
              <h1>Notifikationen</h1>
            <ul>
                <li>
                    <form action="tagesplan.php" method="get">
                        <figure>
                            <img src="" width="80" height="70" />                                    <!--Profilbild-->
                        </figure>
                        <button id="notifikation-text" type="submit">                                <!--wird als Hyperlink gestylt-->
                            Thomas hat deinen Task <strong>Tasktitel</strong> kommentiert
                        </button>
                        <time>am 29.08.16  16:30Uhr</time><br />
                        <label>betrifft den Plan <strong>Tagesplantitel <time>22.08.16</time></strong></label>
                        <input type="hidden" name="task_id-plan_id" value="6,13" />
                    </form>
                </li>
            </ul>
        </section><br />
        <section id="freunschaftsanfrage-container">
            <h3>Freunschaftsanfrage senden</h3>
            <form id="anfrage-senden" action="javascript:anfrage-senden();">
                <label for="suche">nach anderen Nutzer suchen  </label><br />
                <input id="suche" type="search" placeholder="Nutzername.."/><br />
                <input id="anfragetext" placeholder="Anfragetext..." /><br />
                <input type="submit" value="Anfrage senden" />
            </form>

        </section><br />

        <section id="chat-container">
            <h2>Chat</h2>
            <figure id="chatpartner">
                <img id="profilbild-chatpartner" src="" width="80" height="70" />
                <figcaption>Name des Chatpartners</figcaption>
            </figure>
            <ul>
                <li>Textnachricht 1        </li>
                <li>Textnachricht 2        </li>
            </ul>
            <form id="form-chat" action="javascript:chat-msg-senden();">
                <input id="chat-msg" type="text" placeholder="Nachricht..."/>
                <input type="submit" value="absenden"/>
            </form>
        </section>

    </main>
    <br />
    <footer>&copy; Copyright 2016 Hajir</footer>
<script>
//***********************************JS Code auslagern*****************************************
//gebe autocomplete input-Felder & bild-Containern eine unique ID
            var tagsArray = document.getElementsByClassName("tags");
            for (var i = 0; i < tagsArray.length; i++) {
                tagsArray[i].setAttribute("id","tags"+i);
            }
            var img_conteinerArray = document.getElementsByClassName("img_container");
            for (var i = 0; i < img_conteinerArray.length; i++) {
                img_conteinerArray[i].setAttribute("id", "img_container" + i);
            }
    </script>
 <script>
 //Dialog(neuer Plan) öffnen/schliessen
         var startbutton = document.getElementById("Neuer-Plan"),
         dialog = document.getElementById("dialog"),
         erstellebutton = document.getElementById("Erstelle"),
         zurueckbutton = document.getElementById("Zurueck");
         startbutton.addEventListener('click', zeigeFenster);
         erstellebutton .addEventListener('click', schliesseFenster2);
         zurueckbutton .addEventListener('click', schliesseFenster);
         function zeigeFenster() {
          dialog.showModal();
         }
         function schliesseFenster() {
             dialog.close();
             document.getElementById("form_neuer_plan_dialog").reset();
             var img_container = document.getElementById("img_container0")
             while (img_container.firstChild) {
             img_container.removeChild(img_container.firstChild);
          }
          }
         function schliesseFenster2() {
                                                                      //Verbesserung: AJAX -> Server macht DB Eintrag -> JSON String zurück "Erfolgreich"/"Fehlgeschlagen"
             dialog.close();
         }
//Autocomplete
        function showHint(e,objref) {
            var xhttp;
            var str = objref.value;
            if (str.length == 0) {
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var serverResponse = xhttp.responseText;
                        //server schickt JSON-String zurück
      					console.log("Server raw JSON:"+serverResponse);
      					console.log("Typeof response: "+typeof serverResponse);
                        //liefert Array von JS-Objekten. jedes Objekt entspricht einer Zeile in der DB-Tabelle
      					var jsObjArray = JSON.parse(serverResponse);  
                        //iteriere über jedes Objekt im Array -> fülle Wert vom name-Attribut in nameArray UND Wert vom imgUrl-Attribut in imgUrlArray
      					console.log(jsObjArray);
      					var nameArray = new Array();
      					var imgUrlProfilArray = new Array();
      					var username ="";
      					console.log("Die name/imgArrays: ");
      					for (var i = 0; i < jsObjArray.length; i++) {
      					    username = jsObjArray[i].username;
      					    nameArray[i] = jsObjArray[i].name.concat("("+username+")");
      					    imgUrlProfilArray[i] = jsObjArray[i].imgUrlProfil;
      					    console.log(nameArray[i] + " und " + imgUrlProfilArray[i]);
      					}
      					console.log("JS Objekt: ");
      					console.log(jsObjArray);
      					$( function() {
      						function split( val ) {
      						  return val.split( /,\s*/ );
      						}
      						function extractLast( term ) {
      						  return split( term ).pop();
      						}
      						$( ".tags" )
      						  // don't navigate away from the field on tab when selecting an item
      						  .on("keydown", function (event) {
      							if ( event.keyCode ===$.ui.keyCode.TAB &&
      								$( this ).autocomplete( "instance" ).menu.active ) {
      							  event.preventDefault();
      							}
      						  })
      						  .autocomplete({
      							minLength: 0,
      							source: function( request, response ) {
      							  response( $.ui.autocomplete.filter(
      								nameArray, extractLast(request.term)));
      							},
      							focus: function() {
      							  return false;
      							},
      							select: function( event, ui ) {
      							  var terms = split( this.value );
      							  terms.pop();
      							  terms.push( ui.item.value );
      							  terms.push( "" );
      							  this.value = terms.join(", ");
      							  var imgName = ui.item.value.replace(/\s/g, "_").concat("_profil.jpg");  
      							  var src = "";
      							  for (var i = 0; i < imgUrlProfilArray.length; i++) {
      							      var imgUrl = imgUrlProfilArray[i];
      							      if (imgUrl.includes(imgName)) {                                   
      							          src = imgUrl;
      							      }
      							  }
      							  var child = document.createElement('img');
      							  child.setAttribute('class','profilImg');
      							  child.setAttribute('src', '' + src + '');
      							  child.setAttribute('height', '70px');
      							  child.setAttribute('width', '80px');
      							  e.target.nextElementSibling.appendChild(child);
      							  return false;
      							}
      						  });
      					  } );
                }
            };
  			//String splitten -> String Array -> letztes Element zum Server schicken
  			var str2 = str;
  			var strArray;
  			if(str.includes(",")){                    
  				strArray = str.split(" ");              //split beim " "-Leerzeichen, dann Array bilden. Leerzeichen werden entfernt Bsp: "Peru, Belgien, Ungarn" ->["Peru,", "Belgien,", "Ungarn"]
  				str2 = strArray[strArray.length - 1];   //letztes Element des Arrays
  			}
  			console.log("Dein Input: "+str2);
  			xhttp.open("GET", "form_eval_freischalten_markieren_freunde.php?keyword=" + str2, true);
        xhttp.send();
          }
</script>

</body>
</html>

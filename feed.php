<!DOCTYPE html>
<!--Die Datei wurde mit .php-Endung gespeichert, da sonst <?php //include?> nicht funktioniert-->
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
    <header>                                                                        <!--Kopfbereich des BODY-->
        <?php include "navigationsleiste.php";?>
    </header>
    <main>                                                                          <!--Hauptbereich des BODY-->
        <?php include "neuer_plan_dialog.php";?>
        <dialog id="server_antwort_dialog">                                         <!--Zeigt an, ob Plan oder Task erfolgreich angelegt wurde oder nicht -->
        </dialog>

        <section id="feed-container">                                               <!--Container für Feed-->
              <h1>Notifikationen</h1>                                               <!--Überschrift-->
            <ul>                                                                    <!--Liste mit List-Elementen. Jedes Element enthält eine Notifikation-->
                <li>                                                                <!--List-Element wird samt Inhalt dynamisch erzeugt anhand von DB Daten.-->
                    <form action="tagesplan.php" method="get">                      <!--Formular beinhaltet die Notifikation. Beim absenden wird tagesplan.php aufgerufen und der Parameter "task_id-plan_id" übergeben-->
                        <figure>                                                    <!--Bereich für Profilbild des Nutzers, welcher die Notifikation ausgelöst hat-->
                            <img src="" width="80" height="70" />                   <!--Profilbild-->
                        </figure>
                        <button id="notifikation-text" type="submit">              <!--Submit Button beinhaltet Notifikation-Text. Wird als Hyperlink gestylt. Notifikation-Text beschreibt worum es geht und welcher Task betroffen ist-->
                            Thomas hat deinen Task <strong>Tasktitel</strong> kommentiert
                        </button>
                        <time>am 29.08.16  16:30Uhr</time><br />                                                <!--Zeitraum der Notifikation-->
                        <label>betrifft den Plan <strong>Tagesplantitel <time>22.08.16</time></strong>          <!--Gibt an welcher Plan betroffen ist und wer den Plan erstellt hatte-->
                            <em>Ersteller: peter</em>
                        </label>  
                        <input type="hidden" name="task_id-plan_id" value="6,13" />                             <!--Unsichtbar für Nutzer. Hilfreich bei interner Zuordnung der Notifikation mit einem Task und einem Plan-->
                    </form>
                </li>
            </ul>
        </section><br />
        <section id="freunschaftsanfrage-container">                                <!--Conatiner für: Freunschaftsanfrage versenden-->
            <h3>Freunschaftsanfrage senden</h3>                                     <!--Überschrift-->
            <form id="anfrage-senden" action="javascript:anfrage-senden();">        <!--Formular beinhaltet die Anfrage-Daten-->
                <label for="suche">nach anderen Nutzer suchen  </label><br />       <!--Label-->
                <input id="suche" type="search" placeholder="Nutzername.." required="required"/><br />  <!--Suche eines Nutzers mit Autocompletefunktion-->
                <input id="anfragetext" placeholder="Anfragetext..." /><br />                           <!--Anfragetext (optional)-->
                <input type="submit" value="Anfrage senden" />                                          <!--Submit Button-->
            </form>

        </section><br />

        <section id="chat-container">                                               <!--Conatiner für Chat-->          
            <h2>Chat</h2>                                                           <!--Überschrift-->
            <figure id="chatpartner">                                               <!--Bereich für Profilbild + Name des Chatpartners--> 
                <img id="profilbild-chatpartner" src="" width="80" height="70" />   <!--Profilbild-->
                <figcaption>Name des Chatpartners</figcaption>                      <!--Nutzername-->
            </figure>
            <ul>                                                                    <!--Liste. Beinhaltet Chatverlauf in form von List-Elementen.-->
                <li>Textnachricht 1        </li>                                    <!--List-Element beinhaltet eine Chatnachricht-->
                <li>Textnachricht 2        </li>
            </ul>
            <form id="form-chat" action="javascript:chat-msg-senden();">            <!--Formular beinhaltet Text-Input zum eingeben einer Chatnachricht-->
                <input id="chat-msg" type="text" placeholder="Nachricht..."/>       <!--Chatnachricht-->
                <input type="submit" value="absenden"/>                             <!--Submit Button-->
            </form>
        </section>
    </main>
    <br />
    <footer>&copy; Copyright 2016 Hajir</footer>                                            <!--Fußbereich des BODY-->
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
         serverAntwortDialog = document.getElementById("server_antwort_dialog"),
         zurueckbutton = document.getElementById("Zurueck");
         startbutton.addEventListener('click', zeigeFenster);
         zurueckbutton.addEventListener('click', schliesseFenster);
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
//AJAX -> Server macht DB Eintrag -> JSON String zurück "Erfolgreich"/"Fehlgeschlagen"
    $("#form_neuer_plan_dialog").on('submit', (function (e) {
        e.preventDefault();                    
        var planTitel = document.getElementById("titel").value,
        planDatum = document.getElementById("datum").value,
        freischaltenFuer = document.getElementById("tags0").value;
        $.ajax({
            url: "form_eval_neuer_plan_dialog.php",
            type: "GET",
            data: "titel="+planTitel+"&datum="+planDatum+"&freischaltenFuer="+freischaltenFuer, 
            success: function (data)    
            {
                serverAntwortDialog.innerHTML = data + "</br></br><button onclick='schliessen()'>Schließen</button>";
                serverAntwortDialog.showModal();
            },
            error: function ()          
            {
            }
        });
    }));
     
         function schliessen() {
              dialog.close();
              serverAntwortDialog.close();
              document.getElementById("form_neuer_plan_dialog").reset();
             var img_container0 = document.getElementById("img_container0")
             while (img_container0.firstChild) {
             img_container0.removeChild(img_container0.firstChild);
          }
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
                        //liefert Array von JS-Objekten. jedes Objekt entspricht einer Zeile in der DB-Tabelle
      					var jsObjArray = JSON.parse(serverResponse);  
                        //iteriere über jedes Objekt im Array -> fülle Wert vom name-Attribut in nameArray UND Wert vom imgUrl-Attribut in imgUrlArray
      					var nameArray = new Array();
      					var imgUrlProfilArray = new Array();
      					var username ="";
      					for (var i = 0; i < jsObjArray.length; i++) {
      					    username = jsObjArray[i].username;
      					    nameArray[i] = jsObjArray[i].name.concat("("+username+")");
      					    imgUrlProfilArray[i] = jsObjArray[i].imgUrlProfil;
      					}
      					$( function() {
      						function split( val ) {
      						  return val.split( /,\s*/ );
      						}
      						function extractLast( term ) {
      						  return split( term ).pop();
      						}
      						$( ".tags" )
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
  			xhttp.open("GET", "form_eval_freischalten_markieren_freunde.php?keyword=" + str2, true);
        xhttp.send();
          }
</script>

</body>
</html>

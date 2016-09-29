<!DOCTYPE html>
<!--Die Datei wurde mit .php-Endung gespeichert, da sonst <?php //include?> nicht funktioniert-->
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>
<body>
<header>                                                                                <!--Kopfbereich des BODY-->
    <?php include "navigationsleiste.php";?>                                            <!--Navigationsleiste-->
</header>
<main>                                                                                  <!--Hauptbereich des BODY-->
    <?php include "neuer_plan_dialog.php";?>                                            <!--Dialog(neuer Plan)-->
    <dialog id="server_antwort_dialog">                                                 <!--Zeigt an, ob Plan oder Task erfolgreich angelegt wurde oder nicht -->
    </dialog>

    <section id="suchergebnis-container">                                               <!--Container für Suchergebnis-->
        <header><h1>Suchergebnisse</h1></header>                                        <!--Suchergebnis Kopfbereich mit Überschrift-->
        <table>                                                                         <!--Tabelle mit Suchergebnissen als Zellen-->
            <caption><h3>Folgende Tasks wurden gefunden</h3></caption>                  <!--Tabellenüberschrift-->
            <tbody>                                                                     <!--Tabellenkörper-->
            <tr>                                                                        <!--Tabellenzeile. Wird später dynamisch erzeugt und mit Inhalt(Zellen) gefüllt-->  
                <td class="zelle">                                                      <!--Tabellenzelle. Inhalt wird dynamisch erzeugt. Dabei werden Daten aus einer DB ausgelesen und hier eingefügt-->
                    <form action="tagesplan.php" method="get">                          <!--Formular beinhaltet einen Task-> beim absenden wird tagesplan.php aufgerufen-->
                    <fieldset>    
                        <legend>Titel des Task</legend>                                 <!--Überschrift(Titel des Task)-->
                        <time>Anfangs/Endzeit: 13:00 bis 14:00</time><br><br />         <!--Anfangs/Endzeit des Task-->
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span><br /><br /> <!--Beschreibung(die der Taskersteller eingegeben hatte)-->
                        <a href="javascript:" onclick="this.parentNode.submit();">befindet sich im :
                            <strong>Tagesplan vom <time>08.07.16</time></strong><em> Ersteller: shahir</em>         <!--Verweis. Zeigt an in welchem Plan sich dieser Task befindet und wem der Plan gehört. Beim Betätigen wird das Formular abgesendet-->
                        </a>
                        <input type="hidden" name="plan_id" value="5">                                              <!--Id des Planes, in der sich dieser Task befindet. Unsichtbar für Nutzer. Hilfreich bei interner Zuordnung des Task mit einem Plan-->
                    </fieldset>
                    </form>
                </td>
                <td class="zelle">                                                      <!--nächste Zelle s.o.-->
                    <form action="tagesplan.php" method="get">
                    <fieldset>
                        <legend>Titel des Task2</legend>
                        <time>Anfangs/Endzeit: 18:00 bis 19:00</time>
                        <br /><br />
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span>
                        <br />
                        <br />
                        <a href="javascript:" onclick="this.parentNode.submit();">
                            befindet sich im :
                            <strong>
                                Tagesplan vom
                                <time>21.07.16</time>
                            </strong><em> Ersteller: ali</em> 
                        </a>
                        <input type="hidden" name="plan_id" value="8" />
                    </fieldset>
                    </form>
                </td>
                <td class="zelle">
                    <form action="tagesplan.php" method="get">
                    <fieldset>
                        <legend>Titel des Task3</legend>
                        <time>Anfangs/Endzeit: 13:00 bis 16:00</time>
                        <br /><br />
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span>
                        <br />
                        <br />
                        <a href="javascript:" onclick="this.parentNode.submit();">
                            befindet sich im :
                            <strong>
                                Tagesplan vom
                                <time>22.08.16</time>
                            </strong><em> Ersteller: thomas</em> 
                        </a>
                        <input type="hidden" name="plan_id" value="13" />
                    </fieldset>
                    </form>
                </td>
              </tr>
            </tbody>
        </table>
    </section>
</main>
<footer>&copy; Copyright 2016 Hajir</footer>                                                        <!--Fußbereich des BODY-->
<script>
//***********************************JS Code auslagern*****************************************
//gebe autocomplete input-Feldern & bild-Containern eine unique ID
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
</script>
<script>
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

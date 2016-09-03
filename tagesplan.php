<!DOCTYPE html>

<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>
<body>
    <header>                                        <!--Kopfbereich des BODY-->
        <?php include "navigationsleiste.php";  ?>  <!--Navigationsleiste einbinden-->
    </header>
    <main>                                          <!--Hauptbereich des BODY-->
        <?php include "neuer_plan_dialog.php";  ?>  <!--modalen Dialog für 'neuen plan' einbinden-->
        
        <dialog id="neuer_task_dialog">                                                                <!--modaler Dialog für 'neuer Task'. Wird angezeigt bei Klick auf "+Neuer Task" im Tagesplan-Bereich-->
            <h2>Neuen Task erstellen</h2>                                                              <!--Überschrift-->
            <form id="form_neuer_task_dialog" action="form_eval_neuer_task_dialog.php" method="get">   <!--Formular zum Erstellen eines neuen Task -->
                <label for="titel">Titel</label>                                                       <!--Label-->
                <br />
                <input type="text" id="taskTitel" name="titel" required="required"/>                       <!--Input Titel-->
                <br />
                <label for="anfangszeit">Anfangszeit</label>                                           <!--Label-->
                <br />
                <input type="time" id="anfangszeit" name="anfangszeit" required="required"/>           <!--Input Anfangszeit-->
                <br />
                <label for="endzeit">Endzeit</label>                                                   <!--Label-->
                <br />
                <input type="time" id="endzeit" name="endzeit" required="required" />                  <!--Input Endzeit-->
                <br />
                <label for="taskBeschreibung">Beschreibung</label>                                         <!--Label-->
                <br />
                <input type="text" id="taskBeschreibung" name="taskBeschreibung" />                            <!--Input Beschreibung-->
                <br />
                <?php include "freischalten_markieren_freunde.html" ?>                                 <!-- Bereich: Freischalten für Freunde/Markieren von Freunden-->
                <br />
                <input type="submit" id="ErstelleTask" value="Erstelle"/>                                  <!--Button schickt Formular ab und schließt modalen Dialog -->
                <button type="button" id="ZurueckTask">Zurueck</button>                                    <!--Button schließt modalen Dialog-->
            </form>
        </dialog>
        
        <article id="tagesplan">                    <!--Bereich für Tagesplan. Wird später dynamisch erzeugt-->
            <header>                                <!--Tagesplan Kopfbereich-->
                <h1>                                <!--Überschrift-->                                                   
                    Tagesplan
                </h1>
                <time>28.08.16</time>               <!--Tagesplan-Datum-->
                <button id="Neuer-Task">+Neuer Task</button>                <!--Button öffnet modalen Dialog(Neuer-Plan-Dialog)-->
            </header>
            <ul>                                                            <!--Liste von Tasks-->
                <li>                                                        <!--Listen-Element beinhaltet Task-Container. Wird später dynamisch erzeugt-->
                    <section id="task-container">                           <!--Bereich für Task. Wird später samt Inhalt dynamisch erzeugt-->
                        <header><h3>Name dieses Tasks</h3></header>         <!--Task Kopfbereich mit Überschrift-->
                        <time>Anfang: 10:00</time><br>                      <!--Task Anfangszeit-->
                        <time>Ende: &nbsp; &nbsp; 13:00</time><br>          <!--Task Endzeit-->
                        <textarea id="beschr" rows="4" cols="60" placeholder="Beschreibe den Task hier..." readonly></textarea> <!--Task Beschreibung-->
                        <figure id="image_slider" class="w3-content w3-display-container">                              <!--Container für Imageslider-->
                            <img class="mySlides" src="mountain01.jpg" />                                               <!--Image. Wird später dynamisch erzeugt-->
                            <img class="mySlides" src="mountain02.jpg" />
                            <img class="mySlides" src="mountain03.jpg" />
                            <div class="slider-nav w3-center w3-section w3-large w3-text-white w3-display-bottomleft" >             <!--Container für Slider Navigation-->
                                <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>      <!--'Zurück' Symbol-->
                                <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>     <!--'Vor' Symbol. Zusammen mit 'Zurück' ermoglicht es die Navigation des Sliders-->
                                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span> <!--zusätzliche Navigationssymbole. Jedes Image-Element korrespondiert mit einem Symbol -> klickt man auf das Symbol, wird direkt zum dazugehörigem Image-Element navigiert-->
                                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                            </div>
                        </figure>
                        <figure id="video_slider" class="w3-content w3-display-container">                              <!--Container für Videoslider. Bietet die selbe Funktion wie der Imageslider s.o.-->
                            <video class="myVSlides" src="video1.mp4" controls></video>
                            <video class="myVSlides" src="video2.mp4"  controls></video>
                            <div class="slider-nav w3-center w3-section w3-large w3-text-white w3-display-bottomleft" >
                                <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs2(-1)">&#10094;</div>
                                <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs2(1)">&#10095;</div>
                                <span class="w3-badge demo2 w3-border w3-transparent w3-hover-white" onclick="currentDiv2(1)"></span>
                                <span class="w3-badge demo2 w3-border w3-transparent w3-hover-white" onclick="currentDiv2(2)"></span>
                            </div>
                        </figure>
                        <footer id="taskfooter">                                                            <!--Task Fußbereich-->
                            <?php include "freischalten_markieren_freunde.html"; ?>                         <!--Freunde suchen und wählen-->
                            <button onclick="javascript:taskFreischalten();">Freischalten</button><br />    <!--Button ermöglicht freischalten dieses Tasks für ausgewählte Freunde-->
                            <section id="kommentar-container">                                              <!--Kommentar Conatiner-->
                                <h3>Kommentarbereich</h3>                                                   <!--Überschrift-->
                                <ul>                                                                        <!--Liste von Kommentaren. Wird samt Inhalt später dynamisch erzeugt-->
                                    <li>                                                                    <!--Listen-Element beinhaltet Kommentar-->
                                        <span>Kommentar1   </span>                                          <!--Kommentartext-->
                                        <em>                                                                <!--Betonung des Nutzernamen und der Zeit(in der dieses Kommentar verfasst wurde)-->
                                            <small>                                                         <!--Text kleiner darstellen (evtl. besser mit CSS)-->                 
                                                nutzerX                                                     <!--Nutzername des Kommentators-->
                                                <time>22.07.16 18:00uhr </time>                             <!--Zeit der Kommentarverfassung-->
                                            </small>
                                        </em>
                                    </li>
                                </ul><br /><br />
                               <form action="javascript:kommentar-msg-senden();">                           <!--Formular zum Posten eines Kommentars-->
                                   <input type="text" placeholder="Kommentar..." />                         <!--Kommentar Input-->
                                   <input type="submit" value="posten" />                                   <!--Submit Button-->
                               </form><br />
                               <button id="task-aendern">Task Ändern</button>                               <!--Button. Ein modaler Dialog wird initiiert(wird später implementiert). Folgende Funktionen bietet der Dialog:  Anfangs-Endzeit oder Beschreibung ändern, Bilder/Videos hochladen/löschen, vergebene Berechtigungen an einzelne Freunde zurücknehmen, kompletten Task löschen-->
                            </section>
                        </footer>
                    </section>
                </li>
            </ul><br>
            <footer>                                                                    <!--Tagesplan Fußbereich-->                                
                <h4>Schalte Plan frei für Freunde</h4>                                  <!--Überschrift-->
                <?php include "freischalten_markieren_freunde.html"; ?>                 <!--Freunde suchen und auswählen-->
                <button onclick="javascript:planFreischalten();">Freischalten</button>  <!--Button ermöglicht Freischalten des Planes für ausgewählte Freunde-->
                <br /><button id="plan-aendern">Plan Ändern</button>                    <!--Button. Ein modaler Dialog wird initiiert(wird später implementiert). Folgende Funktionen bietet der Dialog:  Plantitel/Datum ändern, vergebene Berechtigungen an einzelne Freunde zurücknehmen, kompletten Task löschen-->
            </footer>
        </article>
    </main>
    <footer>&copy; Copyright 2016 Hajir</footer>                                        <!--Fußbereich des BODY-->
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
         erstellebutton.addEventListener('click', schliesseFenster2);
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
         function schliesseFenster2() {
                                                                      //Verbesserung: AJAX -> Server macht DB Eintrag -> JSON String zurück "Erfolgreich"/"Fehlgeschlagen"
             dialog.close();
         }
</script>
<script>
//Dialog(neuer Task) öffnen/schliessen (gleiche Vorgehensweise wie oben)
         var startbuttonTask = document.getElementById("Neuer-Task"),
         dialogTask = document.getElementById("neuer_task_dialog"),
         erstellebuttonTask = document.getElementById("ErstelleTask"),
         zurueckbuttonTask = document.getElementById("ZurueckTask");
         startbuttonTask.addEventListener('click', zeigeFensterTask);
         erstellebuttonTask.addEventListener('click', schliesseFensterTask2);
         zurueckbuttonTask.addEventListener('click', schliesseFensterTask);

         function zeigeFensterTask() {
          dialogTask.showModal();
         }
         function schliesseFensterTask() {
             dialogTask.close();
             document.getElementById("form_neuer_task_dialog").reset();
             var img_container1 = document.getElementById("img_container1")
             while (img_container1.firstChild) {
             img_container1.removeChild(img_container1.firstChild);
          }
          }
         function schliesseFensterTask2() {
                                                                      //Verbesserung: AJAX -> Server macht DB Eintrag -> JSON String zurück "Erfolgreich"/"Fehlgeschlagen"
             dialogTask.close();
         }
</script>
<script>
//Image Slider
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
    }
//Video Slider
    var vSlideIndex = 1;
    showDivs2(vSlideIndex);

    function plusDivs2(n) {
        showDivs2(vSlideIndex += n);
    }

    function currentDiv2(n) {
        showDivs2(vSlideIndex = n);
    }

    function showDivs2(n) {
        var i;
        var x = document.getElementsByClassName("myVSlides");
        var dots = document.getElementsByClassName("demo2");
        if (n > x.length) { vSlideIndex = 1 }
        if (n < 1) { vSlideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[vSlideIndex - 1].style.display = "block";
        dots[vSlideIndex - 1].className += " w3-white";
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

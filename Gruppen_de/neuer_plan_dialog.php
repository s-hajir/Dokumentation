    <dialog id="dialog">                                                                 <!--Dialog Bereich. Wird angezeigt bei Klick auf "+neuer plan" --> -->
      <h2>Neuen Plan erstellen</h2>
      <form action="tagesplan.php" method="get">                                         <!--Bereich Neuer-Plan-Formular -->
        <label for="titel"></label><br>                                                  <!--Label für Titel -->
        <input type="text" id="titel" name="titel"/> <br>                                <!--Input Titel -->
        <label for="datum"></label><br>                                                  <!--Label für Datum -->
        <input type="date" id="datum" name="datum"/> <br>                                <!--Input Datum -->
        <?php include "freischalten_markieren_freunde.html" ?>                            <!-- Bereich: Freischalten für Freunde/Markieren von Freunden. Name des Dokumentes entspricht nicht buchstabengenu dem Namen der Gruppe--> 
        <button type="submit" id="Erstelle">Erstelle</button>                            <!--Button schickt Formular ab -->
        <button type="button" id="Zurueck">Zurueck</button>                              <!--Button schickt Formular nicht ab -->
      </form>
    </dialog>
    <script>
         //öffnet und schliesst Dialog für neue Plan-Erstellung
         var startbutton = document.getElementById("Neuer-Plan"),
         dialog = document.getElementById("dialog"),
         erstellebutton = document.getElementById("Erstelle"),
         zurueckbutton = document.getElementById("Zurueck");
         startbutton.addEventListener('click', zeigeFenster);
         erstellebutton .addEventListener('click', schliesseFenster);
         zurueckbutton .addEventListener('click', schliesseFenster);

         function schliesseFenster() {
          dialog.close();
          document.getElementById("tags").value="";                    //Wert & img_container leeren
          var img_container = document.getElementById("img_container");
          while (img_container.firstChild) {                                    
              img_container.removeChild(img_container.firstChild);
          }
         }
         function schliesseFenster2() {
                                                                      //Verbesserung: AJAX -> Server macht DB Eintrag -> JSON String zurück "Erfolgreich"/"Fehlgeschlagen"
             dialog.close();
         }
    </script>

<dialog id="dialog">
    <!--Dialog Bereich. Wird angezeigt bei Klick auf "+neuer plan" in der Navigationsleiste-->
    <h2>Neuen Plan erstellen</h2>                                                            <!--Überschrift-->
      <form id="form_neuer_plan_dialog">
        <label for="titel">Titel</label>                                                     <!--Label für Titel-->
        <br />
        <input type="text" id="titel" name="titel" />                                        <!--Input Titel(optional)-->
        <br />
        <label for="datum">Datum</label>                                                     <!--Label für Datum -->
        <br />
        <input type="date" id="datum" name="datum" required="required" />                    <!--Input Datum -->
        <br />
        <?php include "freischalten_markieren_freunde.html" ?>                               <!-- Bereich: Freischalten für Freunde/Markieren von Freunden-->
        <br>
        <input type="submit" id="Erstelle" value="Erstelle" />                               <!--Button schickt Formular ab und schließt modalen Dialog -->
        <input type="button" id="Zurueck" value="Zurueck"/>                                  <!--Button schließt modalen Dialog-->
      </form>
</dialog>

<dialog id="dialog">
    <!--Dialog Bereich. Wird angezeigt bei Klick auf "+neuer plan" -->-->
    <h2>Neuen Plan erstellen</h2>
    <form id="form_neuer_plan_dialog" action="form_eval_neuer_plan_dialog.php" method="get">
        <!--Bereich Neuer-Plan-Formular -->
        <label for="titel">Titel</label>
        <br /><!--Label für Titel -->
        <input type="text" id="titel" name="titel" />
        <br /><!--Input Titel -->
        <label for="datum">Datum</label>
        <br /><!--Label für Datum -->
        <input type="date" id="datum" name="datum" />
        <br /><!--Input Datum -->
        <?php include "freischalten_markieren_freunde.html" ?><!-- Bereich: Freischalten für Freunde/Markieren von Freunden. Name des Dokumentes entspricht nicht buchstabengenu dem Namen der Gruppe, welche im 'strukt.html' steht-->
        <br>
        <button type="submit" id="Erstelle">Erstelle</button><!--Button schickt Formular ab -->
        <button type="button" id="Zurueck">Zurueck</button><!--Button schickt Formular nicht ab -->
    </form>
</dialog>

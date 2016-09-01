<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <link rel="stylesheet" href="style.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="Chart.min.js"></script>
</head>
<body>
    <header>
        <?php include "navigationsleiste.php";?>
    </header>
    <main>
        <?php include "neuer_plan_dialog.php";?>

        <section id="uebersicht">                                                       <!--Container für Tabelle und Tabellen-Navigation-->
            <header>
                <h1>Übersicht der Pläne</h1>                                            <!--Überschrift-->
            </header>
            <section class="month_nav">                                                 <!--Container für Tabellen-Navigation: Es geht monatsweise 'vor' und 'zurück'-->
                <ul>                                                                    <!--Liste der Navigations-Elemente-->
                    <li class="prev">&#10094;</li>                                      <!--'Zurück'-Element-->
                    <li class="next">&#10095;</li>                                      <!--'Vor'-Element-->
                    <li class="month_year">August<br />2016</li>                        <!--Montag und Jahr-->
                </ul>
            </section>
            <table>                                                                     <!--Bereich für die Tabelle. Tabelle enthält Zeilen, die wiederum Zellen enthalten-->
                <tbody>                                                                 <!--Tabellenkörper-->
                    <tr>                                                                <!--Bereich für Tabellenzeile. Tabellenzeilen werden später dynamisch erzeugt & mit Zellen befüllt-->
                        <td>                                                            <!--Bereich für Tabellenzelle. Zellen werden später dynamisch erzeugt & mit DB-Daten befüllt. eine Zelle = ein Tagesplan-->
                            <form action="tagesplan.php" method="get">                  <!--Formular umhüllt Zellendaten, ruft beim absenden tagesplan.php auf-->
                                <h3>Titel des Planes</h3>                               <!--Titel-->
                                <time>22.08.16</time>                                   <!--Datum des Planes-->
                                <br />
                                <label>                                                 <!--Gibt Anzahl der im Plan enthaltenen Tasks an-->
                                    Plan enthält
                                    <strong>7 </strong>Tasks
                                </label>
                                <input type="submit" value="zum plan" />                <!--Formular Submit-->
                                <input type="hidden" name="plan_id" value="13" />       <!--Beinhaltet die Id dieses Planes.Feld ist unsichtbar. Id wird an tagesplan.php gesendet-->
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section><br />
        <section id="diagramm">                                         <!--Container für Diagramm-->
                <canvas id="nutzer_statistik" height="250"></canvas>    <!--Fläche, auf der das Diagramm gezeichnet wird--> 
        </section>
    </main><br />
    <footer>&copy; Copyright 2016 Hajir</footer>
</body>
</html>

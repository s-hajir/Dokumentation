<!DOCTYPE html>
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
<header>
    <?php include "navigationsleiste.php";?>
</header>
<main>
    <?php include "neuer_plan_dialog.php";?>

    <section>
        <header><h1>Suchergebnisse</h1></header>
        <table>
            <caption><h3>Folgende Tasks wurden gefunden</h3></caption>
            <tbody>
            <tr>                                                                                                                       <!--tr-Elemente werden dynamisch erzeugt-->
                <td class="zelle">                                                                                                                   <!--Inhalt der tr werden auch dynamisch mit einer Schleife erzeugt-->
                    <form action="tagesplan.php" method="get">
                        <h3>Titel des Task</h3>
                        <time>Anfangs/Endzeit: 13:00 bis 14:00</time><br><br />
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span><br /><br />
                        <a href="javascript:;" onclick="this.parentNode.submit();">befindet sich im :
                            <strong>Tagesplan vom <time>08.07.16</time></strong>
                        </a>
                        <input type="hidden" name="plan_id" value="5"> <!--Id des Planes, in der sich dieser Task befindet-->
                    </form>
                </td>
                <td class="zelle">
                    <form action="tagesplan.php" method="get">
                        <h3>Titel des Task2</h3>
                        <time>Anfangs/Endzeit: 18:00 bis 19:00</time>
                        <br /><br />
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span>
                        <br />
                        <br />
                        <a href="javascript:;" onclick="this.parentNode.submit();">
                            befindet sich im :
                            <strong>
                                Tagesplan vom
                                <time>21.07.16</time>
                            </strong>
                        </a>
                        <input type="hidden" name="plan_id" value="8" />
                    </form>
                </td>
                <td class="zelle">
                    <form action="tagesplan.php" method="get">
                        <h3>Titel des Task3</h3>
                        <time>Anfangs/Endzeit: 13:00 bis 16:00</time>
                        <br /><br />
                        <span id="beschr" readonly rows="4" cols="50">Beschreibung des Task.... </span>
                        <br />
                        <br />
                        <a href="javascript:;" onclick="this.parentNode.submit();">
                            befindet sich im :
                            <strong>
                                Tagesplan vom
                                <time>22.08.16</time>
                            </strong>
                        </a>
                        <input type="hidden" name="plan_id" value="13" />
                    </form>
                </td>
              </tr>
            </tbody>
        </table>
    </section>
</main>
<footer>&copy; Copyright 2016 Hajir</footer>
</body>
</html>

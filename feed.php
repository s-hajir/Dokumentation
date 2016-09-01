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
</body>
</html>

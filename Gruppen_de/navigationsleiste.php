<?php session_start(); ?>
<nav>                                                                       <!--Navigations-Bereich-->
    <ul>                                                                    <!--Navigation besteht aus einer Liste von Links-->
        <li>
            <a href="index.php">                                            <!--Logo, Link zur Startseite-->
                <img src="logo.jpg" />
            </a>
        </li>
        <li>                                                                
            <form action="task_suchergebnis.php" action="get">                      <!--Such-Formular-Bereich-->
                <input id="navbar-suche" type="search" placeholder="Suche..." />    <!--Suche nach Tasks-->
                <button type="submit">Suchen</button>                               <!--Formular abschicken-->
            </form>
        </li>
        <li>
            <button id="Neuer-Plan">+ neuer Plan</button>                           <!--Button startet modalen Dialog für Erstellung eines neuen Planes-->
        </li>
        <li>
            <a href="#">Mehr</a>                                                    <!--Liste mit Dropdownfunktion -->
            <ul>
                <li>
                    <a href="tagesplan.php">Tagesplan</a>                           <!--Link zur Tagesplan-Ansicht -->
                </li>
                <li>
                    <a href="feed.php">Feed</a>                                     <!--Link zur Feed-Ansicht -->
                </li>
                <li>
                    <a href="uebersicht.php">Uebersicht</a>                         <!--Link zur Übersicht-Ansicht -->
                </li>
            </ul>
        </li>
        <li>
            <a href="feed.php" class="notifikation" data-badge="5">Notifikationen</a>   <!--Notifikationen mit einem Badge. Badge gibt Anzahl der Notifikationen an. Link zur Feed-Ansicht -->
        </li>
        <li>
            <a href="#">
                <?php echo $_SESSION['username'];?>                                     <!--Nutzername des eingeloggten Nutzers -->
            </a>
            <ul>                                                                        <!--Liste mit Dropdownfunktion-->
                <li>
                    <a href="einstellung.php">Profileinstellungen</a>                   <!--Link zur Einstellungen-Ansicht -->
                </li>
                <li>
                    <a href="ausloggen.php">Ausloggen</a>                               <!--Link zu Ausloggen-Ansicht(wird noch erstellt)-->
                </li>
            </ul>
        </li>
    </ul>
</nav>

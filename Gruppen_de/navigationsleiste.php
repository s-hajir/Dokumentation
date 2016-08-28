<?php session_start(); ?>
<nav>                                                                                   <!--Navigations-Bereich-->
    	<ul>                                                                            <!--Navigation besteht aus Liste von Links-->
    		<li><a href="index.php"><img src="logo.gif"></a></li>                       <!--Logo-->
    		<li>                                                                        <!--Such-Formular-Bereich-->
    		  <form action="such_ergebnis.php" action="get">                            <!--Suche nach Tasks/Plänen-->
    		      <input id="navbar-suche" type="search" value="Suche..." onkeyup="showHint(this.value)">  <!--Autocomplete Funktion -->
    		      <button type="submit">Suchen</button>                                         
    		  </form>
    		</li>
    		<li><button id="Neuer-Plan">+ neuer Plan</button></li>                          <!--startet Dialog für Erstellung eines neuen Planes-->
    		<li><a href="#">Mehr</a>                                                        <!--Dropdown-Liste -->                                                                    
    				<ul>
    					<li><a href="tagesplan.php">Tagesplan</a></li>                      <!--Link zu Tagesplan-Ansicht -->
    					<li><a href="feed.php">Feed</a></li>                                <!--Link zu Feed-Ansicht -->
    					<li><a href="freunde_und_chat.php">Freunde und Chat</a></li>        <!--Link zu Freunde und Chat-Ansicht -->
    					<li><a href="uebersicht.php">Übersicht</a></li>                     <!--Link zu Übersicht-Ansicht -->
    				</ul>
    		</li>
    		<li><a href="feed.php" class="notifikation" data-badge="5">Notifikationen</a></li>     <!--Notifikationen mit einem Badge. Badge gibt Anzahl der Notifikationen an -->
    		<li><a href="#"><?php echo $_SESSION['username'];?></a>                                <!--Nutzername -->                                                              
    		    <ul>                                                                        <!--Dropdown-Liste -->
    					<li><a href="profil.php">Dein Profil</a></li>                       <!--Link zu Profil-Ansicht -->
    					<li><a href="einstellung.php">Einstellungen</a></li>                <!--Link zu Einstellungen-Ansicht -->
    					<li><a href="ausloggen.php">Ausloggen</a></li>                      <!--Link zu Ausloggen-Ansicht(wird noch erstellt)-->
    				</ul>
    		</li>
    	</ul>
    </nav>
    <script>
        function showHint(str) {
            //AJAX : Autocomplete ähnlich, wie in 'freischalten_markieren_freunde.html' implementiert
        }
    </script>

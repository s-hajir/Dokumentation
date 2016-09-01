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
    <header>
        <?php include "navigationsleiste.php";  ?>  <!--Navigationsleiste einbinden-->
    </header>
    <main>
        <?php include "neuer_plan_dialog.php";  ?>  <!--Dialog einbinden-->
        <article id="tagesplan">                    <!--Bereich für Tagesplan. Wird später dynamisch erzeugt-->
            <header>                                <!--Tagesplan Kopfbereich-->
                <h1>                                <!--Überschrift-->                                                   
                    Tagesplan
                </h1>
                <time>28.08.16</time>               <!--Tagesplan-Datum-->
                <button id="neuer_task">+Neuer Task</button>                <!--Button öffnet modalen Dialog(Neuer-Plan-Dialog)-->
            </header>
            <ul>                                                            <!--Liste von Tasks-->
                <li>                                                        <!--Listen-Element beinhaltet Task-Container. Wird später dynamisch erzeugt-->
                    <section id="task-container">                           <!--Bereich für Task. Wird später samt Inhalt dynamisch erzeugt-->
                        <header><h3>Name dieses Tasks</h3></header>         <!--Task Kopfbereich mit Überschrift-->
                        <time>Anfang: 10:00</time><br>                      <!--Task Anfangszeit-->
                        <time>Ende: &nbsp; &nbsp; 13:00</time><br>          <!--Task Endzeit-->
                        <textarea id="beschr" rows="4" cols="60" placeholder="Beschreibe den Task hier..."></textarea>  <!--Task Beschreibung-->
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
                               </form>
                            </section>
                        </footer>
                    </section>
                </li>
            </ul><br>
            <footer>                                                                    <!--Tagesplan Fußbereich-->                                
                <h4>Schalte Plan frei für Freunde</h4>                                  <!--Überschrift-->
                <?php include "freischalten_markieren_freunde.html"; ?>                 <!--Freunde suchen und auswählen-->
                <button onclick="javascript:planFreischalten();">Freischalten</button>  <!--Button ermöglicht Freischalten des Planes für ausgewählte Freunde-->
            </footer>
        </article>

    </main>
    <footer>&copy; Copyright 2016 Hajir</footer>
</body>
        <script>
            //hole die autocomplete-input-Felder gebe ihnen eine unique ID
            var tagsArray = document.getElementsByClassName("tags");
            for (var i = 0; i < tagsArray.length; i++) {
                tagsArray[i].setAttribute("id","tags"+i);
            }
        </script>
</html>

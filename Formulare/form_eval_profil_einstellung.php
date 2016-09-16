<!--Aufgerufen von einstellungen.php->uploadProfilbild -->

<?php
session_start();

if($_FILES["fileToUpload"]["error"] == 0) { //falls Upload OK ist Ergebnis 0 (falls kein File-Upload -> 4, falls File zu groß -> 1)
    $fullname = $_SESSION['name'];
    $fullnameNoSpace = str_replace(" ","_",$fullname);
    $username = $_SESSION['username'];
    $imgUrl = $_SESSION['imgUrl'];

    //Falls es kein Verzeichnis für diesen Nutzer gibt -> lokal anlegen
    if(!is_dir($fullnameNoSpace)){
        mkdir($fullnameNoSpace);
    }
    
    //File ins Verzeichnis rein
    $erfolg = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imgUrl); 
    echo "<figcaption>Bild wurde veraendert, bitte Seite neu laden </figcaption>";
    }
?>


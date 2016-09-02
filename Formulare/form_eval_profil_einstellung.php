<!--Aufgerufen von einstellungen.php->uploadProfilbild
1.über ($_SESSION['username'])  Nutzernamen holen
2.mit (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Zielverzeichnis/Dateiname")) das Profilbild im Verzeichnis des Nutzers ablegen
3.mit (echo "<img src='BildUrl' width='150' height='140'></img>") ein img-Element an Client schicken-->

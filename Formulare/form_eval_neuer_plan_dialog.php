<?php
session_start();

define('DB_SERVER', "localhost");
define('DB_USER', "shahir");
define('DB_PASSWORD', "toor");
define('DB_DATABASE', "webapp");
define('DB_DRIVER', "mysql");

if(isset($_GET['datum']) && !empty($_GET['datum'])){

    $titel = $_GET['titel'];
    $datum = $_GET['datum'];
    $freischaltenFuer = $_GET['freischaltenFuer'];
    $beschreibung = $_GET['beschreibung'];
    $username =  $_SESSION['username'];
    $iduser = "";
	
	//aus String -> Array mit String-Elementen bilden und dabei "," entfernen
	$freundeArray = explode(',', $freischaltenFuer);

     $db = getDbConnection();
     //SELECT userid
     $stmt = $db->prepare("SELECT iduser FROM `appusers` WHERE username='".$username."'");
     $isQueryOk = $stmt->execute();
     if ($isQueryOk) {
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN,0); 
            $iduser = $results[0];

            //INSERT Plan + SELECT idTp des neu erzeugten Planes
            $stmt2 = $db->prepare("INSERT INTO `tagesplaene` (`idTp`, `beschreibung`, `datum`, `zeitstempel`, `iduser`, `bezeichnung`) VALUES (NULL, '".$beschreibung."', '".$datum."',NULL , '".$iduser."', '".$titel."'); ");
            $isQueryOk2 = $stmt2->execute();
			$stmt3 = $db->prepare("SELECT idTp FROM `tagesplaene` WHERE datum='".$datum."';" );
			$stmt3->execute();
         
             if ($isQueryOk2) {
			//hole idTp des neu erzeugten Planes
				 $resultsIdTp = $stmt3->fetchAll(PDO::FETCH_COLUMN,0); 
				 $idTp = $resultsIdTp[0];
             //INSERT alle bereichtigte Nutzer in Tabelle `berechtigtenutzertp`
				$trimmedArray = array_map('trim', $freundeArray);
				$freundeArray2 = array_filter($trimmedArray);
				foreach($freundeArray2 AS $name) {
						$stmt4 = $db->prepare("INSERT INTO `berechtigtenutzertp` (`idBerechtNTp`, `name`, `zeitstempel`, `idTp`) VALUES (NULL, '".$name."', NULL, '".$idTp."'); ");
							$isQueryOk4 = $stmt4->execute();
				}
                    echo json_encode("<p style='color:green;'>Plan '".$titel."' erfolgreich angelegt. Die Plan-ID lautet: ".$idTp."");
             }else {
                    trigger_error('Error executing statement.', E_USER_ERROR);
                    }

     }else{
        trigger_error('Error executing statement.', E_USER_ERROR);
     }


}else{
      echo json_encode("<p style='color:red;'>Fehler: Datum nicht angegeben</p>");
}


function getDbConnection() {
    $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

?>

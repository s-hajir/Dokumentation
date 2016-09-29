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


     $db = getDbConnection();
     
     $stmt = $db->prepare("SELECT iduser FROM `appusers` WHERE username='".$username."'");
     $isQueryOk = $stmt->execute();
     if ($isQueryOk) {
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN,0); 
            $iduser = $results[0];

            
            $stmt2 = $db->prepare("INSERT INTO `tagesplaene` (`idTp`, `beschreibung`, `datum`, `zeitstempel`, `iduser`, `bezeichnung`) VALUES (NULL, '".$beschreibung."', '".$datum."',NULL , '".$iduser."', '".$titel."');");
            $isQueryOk2 = $stmt2->execute();
             if ($isQueryOk2) {
                    echo json_encode("<p style='color:green;'>Plan '".$titel."' erfolgreich angelegt");
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

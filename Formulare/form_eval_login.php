<?php

session_start();

define('DB_SERVER', "localhost");
define('DB_USER', "shahir");
define('DB_PASSWORD', "toor");
define('DB_DATABASE', "webapp");
define('DB_DRIVER', "mysql");

function getDbConnection() {
    $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function validateLogin() {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT CONCAT(vName,' ', nName) As name, username, passwort FROM `appusers` WHERE username='".$username."' AND passwort='".$password."'");
    $isQueryOk = $stmt->execute();
    $results = array();

    if ($isQueryOk) {
        $results = $stmt->fetchAll(PDO::FETCH_COLUMN,0);  //Nur erste Spalte zurück als Array
        if(!empty($results)){    //Nutzer existiert
            echo "<form action='tagesplan.php' method='get'><h2>Willkommen! ".$username."</h2><p style='color:green;'>Hier gehts weiter</p><br><button type='submit' style='color:green;' >Weiter</button></form>";
            $_SESSION['name']= $results[0];
            $_SESSION['username'] =$username;
            
            $fullnameNoSpace = str_replace(" ","_",$results[0]); 
            $foldername = $fullnameNoSpace."(".$username.")"; 
            $_SESSION['imgUrl'] = $foldername."/".$foldername."_profil.jpg";

        }else{echo "<p style='color:red;'>Nutzername/Passwort falsch ! Bitte nochmal versuchen</p>";} //Nutzer existiert nicht
    } else {
        trigger_error('Error executing statement.', E_USER_ERROR);
        echo "<p style='color:red;'>Datenbank-Problem beim Anlegen des Accounts</p>";
    }
    //Verbindung beenden
    $db = null;
}

validateLogin();
?>

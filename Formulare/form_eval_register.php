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

function validateRegistration() {
    $username = $_GET['username'];
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT username FROM `appusers` WHERE username='".$username."'");
    $isQueryOk = $stmt->execute();
    $results = array();
    if ($isQueryOk) {
        $results = $stmt->fetchAll();
        if(empty($results)){           //wenn Nutzer nicht existiert
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            $password = $_GET['password'];

            $stmt2 = $db->prepare("INSERT INTO `appusers` (`iduser`, `vName`, `nName`, `imgUrlProfil`, `username`, `passwort`) VALUES (NULL, '".$firstname."', '".$lastname."', '".$firstname."_".$lastname."(".$username.")/".$firstname."_".$lastname."(".$username.")_profil.jpg', '".$username."', '".$password."');");
            $isQueryOk2 = $stmt2->execute();
            if ($isQueryOk2){
                echo "<form action='tagesplan.php' method='get'><h2>Willkommen! ".$username."</h2><p style='color:green;'>Ihr Konto wurde erfolgreich angelegt. Hier gehts weiter</p><br><button type='submit' style='color:green;' >Weiter</button></form>";
                $_SESSION['name'] = $firstname." ".$lastname;
                $_SESSION['username'] = $username;
                
                $foldername = $firstname."_".$lastname."(".$username.")";
                $_SESSION['imgUrl'] = $foldername."/".$foldername."_profil.jpg";
            }else{
                echo "<p style='color:red;'>Datenbank-Problem beim Anlegen des Accounts</p>";
            }

        }else{ //wenn Nutzer schon existiert
            echo "<p style='color:red;'>Fehler: Der Nutzername existiert schon</p>";
        }
    } else {
        trigger_error('Error executing statement.', E_USER_ERROR);
        echo "<p style='color:red;'>Datenbank-Problem</p>";
    }
    //Verbindung beenden
    $db = null;
}

validateRegistration();

?>

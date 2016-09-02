<?php
if (!isset($_GET['keyword'])) {       
	die();
}

define('DB_SERVER', "localhost");
define('DB_USER', "shahir");
define('DB_PASSWORD', "toor");
define('DB_DATABASE', "webapp");
define('DB_DRIVER', "mysql");

//Verbindung aufbauen
function getDbConnection() {
    $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
//suchen
function searchForKeyword($keyword) {
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT CONCAT(vName,' ', nName) As name, imgUrlProfil, username FROM `appusers`  WHERE (CONCAT(vName,' ', nName) LIKE ?)"); // 2 spalten zu 1 konkatenieren. optional: ORDER BY (CONCAT(vName,' ', nName))
    $keyword ='%' . $keyword . '%';
    $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);

    $isQueryOk = $stmt->execute();

    $results = array();
    if ($isQueryOk) {
        $results = $stmt->fetchAll();
    } else {
        trigger_error('Error executing statement.', E_USER_ERROR);
    }
//Verbindung abbauen
    $db = null;
    return $results;   //Array zurück
}


$keyword = $_GET['keyword'];
$results = searchForKeyword($keyword);
echo json_encode($results);             //Array als JSON String zurück

?>

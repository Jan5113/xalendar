<?php
$imgPath = $_POST["img_path"];
$artId = $_POST["art_id"];

$servername = "db55.netzone.ch";
$username = "obermeier";
$password = "supernova";
$dbname = "obermeier";

// Establish connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $db->connect_error;
}

$sql = "SELECT ".$artId." AS val FROM shroomnet_imgdata WHERE img_path='".$imgPath."'";


$val = $db->query($sql)->fetch_assoc();
$val = $val["val"] + 1;


$sql = "UPDATE shroomnet_imgdata SET ".$artId."=".$val." WHERE img_path='".$imgPath."'";

echo $sql;

$db->query($sql);


?>
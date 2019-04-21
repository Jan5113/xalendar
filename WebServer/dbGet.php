<?php
$servername = "db55.netzone.ch";
$username = "obermeier";
$password = "supernova";
$dbname = "obermeier";

$sumSql = "img_art01 + img_art02 + img_art03 + img_art04 + img_art05 + 
img_art06 + img_art07 + img_art08 + img_art09 + img_art10 + img_art11 + img_art12 + 
img_art13 + img_art14 + img_art15 + img_art16 + img_art17 + img_art18 + img_art19 + 
img_art20 + img_art21";

// Establish connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $db->connect_error;
}

$sql = "SELECT img_path AS paths FROM shroomnet_imgdata";
$fileNamesSQL = $db->query($sql);
$arrNames = array();
while($path = $fileNamesSQL->fetch_assoc()) {
	array_push($arrNames, $path["paths"]);
}
$arrVotes = array();
foreach ($arrNames as $fileName) {
	$sql = "SELECT (".$sumSql.") AS votes FROM shroomnet_imgdata WHERE img_path='".$fileName."'";
	$votes = $db->query($sql)->fetch_assoc();
	array_push($arrVotes, $votes["votes"]);
}

$arrMinNames = array();
$minValue = min($arrVotes);
for ($i = 0; $i < count($arrVotes); $i++){
	if ($arrVotes[$i] == $minValue || $arrVotes[$i] == $minValue + 1) {
		array_push($arrMinNames, $arrNames[$i]);
	}
}

echo $arrMinNames[rand(0, (count($arrMinNames) - 1))];

?>
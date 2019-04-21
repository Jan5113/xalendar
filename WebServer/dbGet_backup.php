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

$sql = "SELECT MAX(`index`) AS maxIndex FROM shroomnet_imgdata";
$cRows = $db->query($sql)->fetch_assoc();
$cRows = $cRows["maxIndex"];

$arrSums = array();
for ($x = 1; $x <= $cRows; $x++) {
	$sql = "SELECT (".$sumSql.") AS sum FROM shroomnet_imgdata WHERE `index` =".$x;
	$sumRow = $db->query($sql)->fetch_assoc();
	$sumRow = $sumRow["sum"];
	$arrSums[$x] = $sumRow;
}

$arrMinIdx = array();
$minValue = min($arrSums);

for ($i = 1; $i <= $cRows; $i++) {
	if ($arrSums[$i] == $minValue) {
		array_push($arrMinIdx, $i);
	}
}
echo print_r($arrMinIdx)



//echo "02-20180426134651.jpg";
?>
<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$artString = $_POST["art_string"];
$uploaderName = $_POST["uploader_Name"];
$artId = $_POST["art_id"];
$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

if (strlen($artId) == 1) {
	$artId = "0".$artId;
}

if (!$fileTmpLoc) {
	echo "Datei nicht gefunden.";
	exit();
}

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

$picId = 0;

$path = $artId."-".date('YmdHis').$picId.".".$fileExt;

while(file_exists("shroomnet_uploads/".$path)) {
	$picId ++;
	$path = $artId."-".date('YmdHis').$picId.".".$fileExt;
}

if(move_uploaded_file($fileTmpLoc, "shroomnet_uploads/".$path)){
	
	if ($artId == "21") {
		$sql = "INSERT INTO shroomnet_imgdata (img_path, img_art21, img_customart, uploader_Name)
			VALUES ('".$path."', '1', '".$artString."', '".$uploaderName."');";
		
	} else if ($artId == "00") {
		$sql = "INSERT INTO shroomnet_imgdata (img_path, uploader_Name)
			VALUES ('".$path."', '".$uploaderName."');";
	} else {
		$sql = "INSERT INTO shroomnet_imgdata (img_path, img_art".$artId.", uploader_Name)
			VALUES ('".$path."', '1', '".$uploaderName."');";
	}
	
	if ($db->query($sql) === TRUE) {
		echo "Hochladen erfolgreich!\n Gespeichert als: ".$path."\n Vielen herzlichen Dank ".$uploaderName."!";
	} else {
		echo "Fehler: " . $sql . "<br>" . $db->error;
	}
	
	$db->close();
	
} else {
	echo "Serverfehler, Bild konnte nicht gespeichert werden.";
}
?>

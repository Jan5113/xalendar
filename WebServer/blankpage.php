<?php /* Template Name: blankpage */
	
	if ($_POST["msg"] == "YEETETET") {
		echo "somethings here";
		echo $_POST["msg"];
		echo $_POST["val"];
	} else {
		echo "nope";
	}
	echo $_POST["dic"];
	echo var_dump($_POST);


/*
$file = $_SERVER['DOCUMENT_ROOT'];
$file .= ("/custom_files/test.txt");

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Type: application/txt');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
	echo "file not found";
}
*/
?>
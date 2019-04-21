<?php /* Template Name: blankpage */
	
$user_id = null;
$user_password = null;
$user_id = $_POST["user_id"];
$user_password = $_POST["user_password"];

$check = checkPassword($user_password, $user_id);

if ($check == 0) {
	die("ERROR\nIncorrect password.");
} elseif ($check == -1) {
	die("ERROR\nInvalid user.");
}

// authentication successful
//----------------------------------

// get whole sync

// get delta sync

function echoChange($id_in) {
	$changeRaw = db("SELECT * FROM xalendar_changes WHERE id = ".$id_in);
	$numrows = $chaneRaw->num_rows;
	if ($numrows != 1) {
		die("ERROR:\nInvalid change ID");
	}
	$change = $changeRaw->fetch_assoc();
	$changed_table = $change["changed_table"];
	$changed_id = $change["changed_id"];
	$change_type = $chnage["change_type"];
	$change_user_id = $change["user_id"];

	echo "CHANGE ".$changed_table." ".$changed_id." ".$change_type."\n";
	echo "user_id: ".$change_user_id."\n";
	switch (change_type) {
		case 'add':
			echoEvent($changed_table, $changed_id);
			break;
		case 'edit':
			echoEvent($changed_table, $changed_id);
			break;
		case 'delete':
			
			break;
		default:
			die("ERROR:\nInvalid change type");
			break;
	}
}

function echoEvent($changed_table, $changed_id){
	$event = db("SELECT * FROM xalendar_".$changed_table." WHERE id = ".$changed_id);
	$numrows = $chaneRaw->num_rows;
	if ($numrows != 1) {
		die("ERROR:\nInvalid ".$changed_table." event ID");
	}
	switch ($changed_table) {
		case 'calendar':
			echoCalendar($event);
			break;
		case 'todo':
			echoTodo($event);
			break;
		
		default:
			die("EROOR:\nInvalid table")
			break;
	}
}

function echoCalendar($event){
	$user_id = $event["user_id"];
	$category = $event["change_user_id"];
	$name = $event["name"];
	$description = $event["description"];
	$location = $event["location"];
	$due_date = $event["due_date"];
	$status = $event["status"];
	$accepted_user_id = $event["accepted_user_id"];
}

function echoTodo($event){
	
}

function db ($sql) {
    static $conn;
    if ($conn===NULL){ 
    	$servername = "db55.netzone.ch";
		$username = "obermeier";
		$password = "H!pern()va5113";
		$dbname = "obermeier";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
		if ($conn->connect_error) {
		    die("ERROR\nCouldn't establish connection to datbase: " . $conn->connect_error);
		}
    }
    $result = $conn->query($sql);
    return $result;
}


function checkPassword($pwd_in, $id_in) {
    $result = db("SELECT password FROM xalendar_user WHERE id = ".$id_in);
	$numrows = $result->num_rows;

	if ($numrows == 0) {
		return -1;
	}
	$ans = $result->fetch_assoc();
	$pwd = $ans["password"];

	if ($pwd_in == $pwd) {
		return 1;
	} else {
		return 0;
	}
} 


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
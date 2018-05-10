<?php require_once '../web-config/config.php';
require_once '../web-config/database.php';
require_once 'includes/encryption.php';
$url = $_SERVER['REQUEST_URI'];

if (isset($_POST['save'])) {
	
	$plate_number = $database->escape_value($_POST['plate_number']);
	$insurance = $database->escape_value($_POST['insurance']);
	$model = $database->escape_value($_POST['model']);
	$institution= $database->escape_value($_POST['institution']);

	$sql= "INSERT INTO cars(plate_nber,model,insurance_camp,owner) VALUES('$plate_number','$model','$insurance',$institution)";
	if ($database->query($sql)) {
		$id = $Hash->encrypt($institution);
		header("location:display?id=$id");
	}
	else
		header("location:$url");

}
else
	header("location:$url");
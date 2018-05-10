<?php 
require_once '../web-config/config.php';
	  require_once '../web-config/database.php';
session_start();
if (isset($_SESSION['institution'])) {
	$id = $_SESSION['institution'];
	$name = $_POST['name'];
	echo $database->get_item('institution_details','id',$id,$name);
}
else
echo "not";

function getName(){
	if (isset($_SESSION['institution'])) {
		$id = $_SESSION['institution'];
		$name = $_POST['name'];
		echo $database->get_item('institution_details','id',$id,'name');
	}
	else
		echo "";
}
function getPhone(){
	if (isset($_SESSION['institution'])) {
		$id = $_SESSION['institution'];
		$name = $_POST['name'];
		echo $database->get_item('institution_details','id',$id,'telephone');
	}
	else
		echo "";
}
function getContact(){
	if (isset($_SESSION['institution'])) {
		$id = $_SESSION['institution'];
		$name = $_POST['name'];
		echo $database->get_item('institution_details','id',$id,'contact_person');
	}
	else
		echo "";
}
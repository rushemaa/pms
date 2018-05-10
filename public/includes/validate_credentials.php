<?php
require_once '../web-config/grobals.php';
if(!isset($_SESSION["id"]) || !isset($_SESSION["username"])  || !isset($_SESSION["level"])) {
   header("location:index.php");
}else{
	$sql = "SELECT id, username, level FROM user WHERE username ='{$_SESSION["username"]}' AND id='{$_SESSION["id"]}' AND active='1' LIMIT 1";
	$query = $database->query($sql);
	$n = $database->num_rows($query);
	if($n == 0){
	 header("location:index");
	}
}
?>
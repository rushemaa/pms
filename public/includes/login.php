<?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
session_start();
if(isset($_POST["login"])){
	require_once("../../web-config/config.php"); 
    require_once("../../web-config/database.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = $database->escape_value($_POST['username']);
	$p1 = $_POST['password'];
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($e == "" || $p1 == ""){
		echo "login_failed";
        exit();
	} else {
		$p = md5($p1);
	// END FORM DATA ERROR HANDLING
		$n=0;
		$sql = "SELECT id, username, level FROM user WHERE username ='{$e}' AND password='{$p}' AND active='1' LIMIT 1";
        $query = $database->query($sql);
        $n = $database->num_rows($query);
		if($n == 0){
			echo "login_failed";
            exit();
		} else {
			$row = $database->fetch_array($query);
		    $db_id = $row['id'];
		    $db_pagename = $row['username'];
			$level = $row['level'];
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['id'] = $db_id;
			$_SESSION['username'] = $db_pagename;
			$_SESSION['level'] = $level;
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE user SET ip='$ip', lastlogin=now() WHERE username='$db_pagename' LIMIT 1";
            $database->query($sql);
			echo "yes";
		    exit();
		}
	}
	exit();
}
?>

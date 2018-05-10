<?php require_once '../web-config/config.php';
require_once '../web-config/database.php';
require_once 'includes/encryption.php';
if (isset($_POST['save1'])) {
$name = $database->escape_value($_POST['name']);
$institution = $database->escape_value($_POST['institution']);
$phone = $database->escape_value($_POST['phone']);
$contact_person = $database->escape_value($_POST['contact_name']);
$contact_phone = $database->escape_value($_POST['contact_phone']);
$location = $database->escape_value($_POST['location']);

if (!isset($_POST['country_loc'])) {
$country = $database->escape_value($_POST['country']);
$email = $database->escape_value($_POST['email']);
$res =$database->query("SELECT * FROM institution_details WHERE country=$country AND id_institution=$institution");
if ($database->num_rows($res) > 0) {
 		$row = $database->fetch_array($res);
 		$id = $row['id'];

 		$sql= "UPDATE institution_details SET name='$name',telephone='$phone',contact_person='$contact_person',location='$location',country=$country,contact_phone='$contact_phone',email='$email' WHERE id_institution=$institution";
 		if ($database->query($sql)) {
 			$id=$Hash->encrypt($id);
 			if ($institution ==2) 
			header("location:register-foreign-embassy-step2?id=$id");
			else if ($institution==3) 
 			header("location:register-rwandan-embassy-step2?id=$id");
 			else if ($institution==4)
 			header("location:register-ngo-step2?id=$id");	
 		}
}
else{
	$sql= "INSERT INTO institution_details(name,id_institution,telephone,contact_person,location,country,contact_phone,email) VALUES('$name',$institution,'$phone','$contact_person','$location','$country','$contact_phone','$email')";
		
		if ($database->query($sql)) {
			$id=$Hash->encrypt($database->inset_id());
			if ($institution ==2) 
			header("location:register-foreign-embassy-step2?id=$id");
			elseif ($institution==3) 
 			header("location:register-rwandan-embassy-step2?id=$id");
 			elseif ($institution==4)
 			header("location:register-ngo-step2?id=$id");
		}
	}
}else {
$country_loc = $database->escape_value($_POST['country_loc']);
$country = $database->escape_value($_POST['country']);
$email = $database->escape_value($_POST['email']);
$res =$database->query("SELECT * FROM institution_details WHERE country=$country AND id_institution=$institution");
if ($database->num_rows($res) > 0) {
 		$row = $database->fetch_array($res);
 		$id = $row['id'];

 		$sql= "UPDATE institution_details SET name='$name',telephone='$phone',contact_person='$contact_person',location='$location',country=$country,country_loc=$country_loc,contact_phone='$contact_phone',email='$email' WHERE id_institution=$institution";
 		if ($database->query($sql)) {
 			$id=$Hash->encrypt($id);
 			if ($institution ==2) 
			header("location:register-foreign-embassy-step2?id=$id");
			else if ($institution==3) 
 			header("location:register-rwandan-embassy-step2?id=$id");
 			else if ($institution==4)
 			header("location:register-ngo-step2?id=$id");	
 		}
}
else{
	$sql= "INSERT INTO institution_details(name,id_institution,telephone,contact_person,location,country,country_loc,contact_phone,email) VALUES('$name',$institution,'$phone','$contact_person','$location','$country','$country_loc','$contact_phone','$email')";
		
		if ($database->query($sql)) {
			$id=$Hash->encrypt($database->inset_id());
			if ($institution ==2) 
			header("location:register-foreign-embassy-step2?id=$id");
			elseif ($institution==3) 
 			header("location:register-rwandan-embassy-step2?id=$id");
 			elseif ($institution==4)
 			header("location:register-ngo-step2?id=$id");
		}
	}
}}

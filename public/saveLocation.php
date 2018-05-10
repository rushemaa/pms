<?php require_once '../web-config/config.php';
	  require_once '../web-config/database.php';
session_start();
$province = $_POST['province'];
$district = $_POST['district'];
$sector = $_POST['sector'];
$cell = $_POST['cell'];
$plot_nber = $_POST['plot_nber'];
$country = $_POST['country'];
$id = $_SESSION['institution'];

if ($database->num_rows($database->query("SELECT * FROM location WHERE owner=$id")) > 0) {
	$sql = "UPDATE location SET province='$province',district='$district',sector='$sector',cell=''$cell,plot_nber='$plot_nber',country='$country'";

}
else{
	$sql= "INSERT INTO location(province,district,sector,cell,plot_nber,country,owner) VALUES('$province','$district','$sector','$cell','$plot_nber','$country',$id)";
}


if ($database->query($sql)) {
	$last_id = $database->inset_id();
	$s = "UPDATE institution_details SET id_location=$last_id WHERE id=$id";
	$database->query($s);
	echo $s;
}
else
echo $sql;
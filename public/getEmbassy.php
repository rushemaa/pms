<?php require_once '../web-config/config.php';
require_once '../web-config/database.php';
$id = $_POST['id'];
$res = $database->query("SELECT name FROM institution_details WHERE id=$id AND id_institution=2");
if ($database->num_rows($res) > 0){
$row = $database->fetch_array($res);
echo $row['name'];}
else echo "no Embassy registered check Country selected";
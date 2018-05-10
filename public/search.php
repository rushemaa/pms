<?php
require_once '../web-config/config.php';
require_once '../web-config/database.php';
require_once 'includes/encryption.php';

$search = $_POST['search'];
if ($search!=="") {
	
$sql = "SELECT * FROM institution_details WHERE telephone LIKE '%$search%'
   											 OR name  LIKE '%$search%'
   											 OR contact_person LIKE '%$search%'
   											 OR comments LIKE '%$search%'";
$res = $database->query($sql);  											 

while ($row = mysqli_fetch_assoc($res)) {?>
<a href="display.php?id=<?=$Hash->encrypt($row['id']);?>">
		<div class="itemH">
			<div class="itemB">
				<span class="headerName"> <?=$row['name']?></span>
			</div>
			<div class="itemB">
				<span>tel: </span>
				<span class="value"> <?=$row['telephone']?></span>
			</div class="itemB">
		</div>
</a>
<?php }}
?>
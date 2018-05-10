<?php require_once '../web-config/config.php';
require_once '../web-config/database.php';
require_once 'includes/encryption.php';
if (isset($_POST['save1'])) {
    $given = $database->escape_value($_POST['given_names']);
    $fnames = $database->escape_value($_POST['family_names']);
    $other = $database->escape_value($_POST['other_names']);
    $gender = $database->escape_value($_POST['gender']);
    $dob = $_POST['dob'];
    $pob = $database->escape_value($_POST['pob']);
    $nob = $_POST['nob'];
    $nop = $_POST['nop'];
    $doi = $_POST['doi'];
    $doe = $_POST['doe'];
    $email = $database->escape_value($_POST['email']);
    $telephone = $database->escape_value($_POST['telephone']);
    $pass_no = $database->escape_value($_POST['pass_no']);
    $profession = $database->escape_value($_POST['profession']);
    $occupation = $database->escape_value($_POST['occupation']);
    $employer = $database->escape_value($_POST['employer']);
    $father_name = $database->escape_value($_POST['father_name']);
    $father_nat = $database->escape_value($_POST['father_nat']);
    $mother_name = $database->escape_value($_POST['mother_name']);
    $mother_nat = $database->escape_value($_POST['mother_nat']);
    $marital_status = $database->escape_value($_POST['marital_status']);
    $spouse = $database->escape_value($_POST['spouse']);

    if (isset($_POST['update'])){
        $update_id = $_POST['update'];
        $sql = "UPDATE diplomats SET given_names='$given',family_names='$fnames',other_names='$other',gender='$gender',dob='$dob',pob='$pob',nob='$nop',email='$email',telephone='$telephone',pass_no='$pass_no',nop='$nop',doi='$doi',doe='$doe',profession='$profession',occupation='$occupation',employer='$employer',father_name='$father_name',father_nat='$father_nat',mother_name='$mother_name',mother_nat='$mother_nat',marital_status='$marital_status',spouse='$spouse' WHERE id=$update_id";
        if ($database->query($sql)) {
            $id=$Hash->encrypt($update_id);
            header("location:register-visitor-step2?id=$id");
        }
    }


    $sql= "INSERT INTO diplomats(given_names,family_names,other_names,gender,dob,pob,nob,email,telephone,pass_no,nop,doi,doe,profession,occupation,employer,father_name,father_nat,mother_name,mother_nat,marital_status,spouse,type) VALUES('$given','$fnames','$other','$gender','$dob','$pob','$nob','$email','$telephone','$pass_no','$nop','$doi','$doe','$profession','$occupation','$employer','$father_name','$father_nat','$mother_name','$mother_nat','$marital_status','$spouse','visitor')";

    if ($database->query($sql)) {
        $id=$Hash->encrypt($database->inset_id());
        header("location:register-visitor-step2?id=$id");
    }


}
if (isset($_POST['save2'])){
    $reason = $database->escape_value($_POST['reason']);
    $host_person = $database->escape_value($_POST['host_person']);
    $arrival = $database->escape_value($_POST['arrival']);
    $departure = $database->escape_value($_POST['departure']);
    $embassy = $_POST['embassy'];
    $visitor = $_POST['visitor'];
    $protocol= $database->escape_value($_POST['protocol']);

    $sql = "INSERT INTO visit(reason,host_person,arrival,departure,id_embassy,protocol) VALUES ('$reason','$host_person','$arrival','$departure','$embassy','$protocol')";
    if ($database->query($sql)) {
        $id = $database->inset_id();
        $database->query("UPDATE diplomats SET visit_details=$id WHERE id=$visitor");
        $id=$Hash->encrypt($id);
        header("location:register-visitor-step3?id=$id");
    }

}
if (isset($_POST['save3'])){
    $names = $database->escape_value($_POST['names']);
    $gender = $database->escape_value($_POST['gender']);
    $date = $_POST['dob'];
    $visitor = $_POST['visitor'];

    $sql = "INSERT INTO companion(names,gender,dob,visitor) VALUES ('$names','$gender','$date',$visitor)";
    if ($database->query($sql)) {
        $id=$Hash->encrypt($visitor);
        if (isset($_POST['checked']))
            header("location:register-visitor?id=$id");
        else
            header("location:register-visitor-step3?id=$id");
    }

}

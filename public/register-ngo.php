<?php require_once("includes/validate_credentials.php"); 
require_once '../web-config/config.php';
require_once '../web-config/database.php';
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<?php require_once("includes/head.php");

    function check_if($value){
      $Hash = new Encryption();
      $database = new mysqldatabase(DB_NAME);
        if (isset($_GET['id'])) {
            $id = $Hash->decrypt($_GET['id']);
            $val = $database->get_item('institution_details','id',$id,$value);
            return $val;
        }
        else return "";
}
 ?>
</head>
<body>
    <style type="text/css">
    .error{
      color: maroon;
    }
    select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option, .form-control{
    font-family: Georgia;
    font-size: 14px;
}

label{
    font-weight: bold;
    font-family: serif;
}


       .tab-container{
        background: #fff;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        padding-bottom: 20px;
       }
       .tab-container nav{
        background: transparent;
        border: none;
       }
       .tab-content{
        padding: 0px 40px;
       }
       .tab-content legend{
            margin-bottom: 20px;
            margin-top:40px; 
            text-align: center;
            color: #272c33;
            font-family: georgia;
       }
       .tab-content-body{
        margin: 0 auto;
        width: 80%;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
       }
       .btn ,.btn-primary{background: #272c33;color: #fff}
       #nav-tab{width: 80%;margin:0 auto;}
       #nav-tab ul
        {
        margin: 0;
        background: #000;
        padding: 0;
        list-style-type: none;
        text-align: center;
        }

        #nav-tab ul li { display: inline;float: left;padding: 15px 10%;background:#272c33;border-right: 1px solid grey }
        #nav-tab ul li a{
            color: #fff;
        }
        #nav-tab ul li#active{background: #E74C3C !important}
    </style>
    <?php require_once 'includes/left_nav.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
     <?php require_once 'includes/top_nav.php'; ?>
    <div class="container">
        <div class="tab-container">
            <div class="tab-content" id="nav-tabContent">
                <div id="nav-tab">
                    <ul>
                        <li id="active"><a href="<?=$_SERVER['REQUEST_URI']?>">Basic Info</a></li>
                         <?php if (isset($_GET['id'])) { $id =$_GET['id'];?> 
                        <li><a href="register-ngo-step2?id=<?=$id?>">Additional Info</a></li><li><a href="register-ngo-step3?id=<?=$id?>">Add Cars</a></li>
                        <?php } else{?>
                        <li><a href="register-ngo-step2">Additional Info</a></li>
                        <li><a href="register-ngo-step3">Add Cars</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="tab-content-body">
                    <legend>Registration Form  for NGO</legend>
                    <form action="save-ngo.php" method="POST" id="form">
                  <div class="form-group">
                    <label for="name">NGO Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Embassy Name" minlength="4" value="<?=check_if('name');?>">
                  </div>
                  <div class="form-group">
                    <label for="name">NGO Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Embassy Phone" minlength="10" value="<?=check_if('telephone');?>">
                  </div>
                  <div class="form-group">
                    <label for="name">NGO Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Embassy Phone" value="<?=check_if('email');?>">
                  </div>
                  <input type="hidden" name="institution" value="4">
                  <div class="form-group">
                    <label for="contact_phone">Contact Person Phone Number</label>
                    <input type="text" class="form-control" id="contact_phone" placeholder="Enter Contact Person Phone Number" name="contact_phone" value="<?=check_if('contact_phone');?>">
                  </div>
                  <div class="form-group">
                    <label for="contact_name">Contact Person full Names</label>
                    <input type="text" class="form-control" id="contact_name" placeholder="Enter Contact Person Full Names" name="contact_name" value="<?=check_if('contact_person');?>">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                        <select class="form-control" id="country" name="country">
                    <?php $st2 = $database->query("SELECT * FROM countries"); 
                    foreach ($st2 as $key => $value) {?>
                        <option id="option" value="<?=$value['id']?>"><?=$value['name']?></option><?php } ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="location"> Location</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="Full Address" value="<?=check_if('location');?>">  
                  </div>
                  <div>
                    <button  type="submit" name="save1" class="btn pull-right">Save and Continue</button>
                  </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

 </div>  
<script src="assets/js/vendor/jquery-1.9.1.js"></script>
<script src="assets/js/vendor/jquery-validate.min.js"></script>
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script type="text/javascript">
    $("#country option[value=178]").prop('selected', true);
    $(function() {
    $("#form").validate({
      rules: {
        
        name: "required",
        phone: "required",
        location: "required",
        contact_phone: "required",
        contact_name: "required",
        email: {
          required: true,
          email: true
        }
        
      },
      
      messages: {
        firstname: "Please enter your firstname",
        lastname: "Please enter your lastname",
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        email: "Please enter a valid email address"
      }, 
      submitHandler: function(form) {
        form.submit();
      }
    });
    });
  
</script>
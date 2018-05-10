<?php require_once("includes/validate_credentials.php");

$result = $database->query("SELECT Id FROM `institution` WHERE Name='Rwandan Embassies'");
$row=$database->fetch_array($result);
$id=$row[0];
$rlt = $database->query("SELECT * FROM institution_details WHERE id_institution=$id");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<?php require_once("includes/head.php"); ?>
</head>
<body>
    <!-- Left Panel -->
      <?php require_once 'includes/left_nav.php'; ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
     <?php require_once 'includes/top_nav.php'; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="home">Dashboard</a></li>
                            <li><a href="users">Users</a></li>
                            <li class="active">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Register</strong>
                        </div>
                        <div class="card-body">
                          <div id="register_div">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">User information</h3>
                                  </div>
                                  <hr>
                                  <form id="registerfrm"   onsubmit="return false" method="post" novalidate="novalidate" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label class="form-label">First Name<span class="required-mark">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter First name" name="firstname" id="firstname"  required="" value="">
                                                
                                            </div>
                                    <div class="form-group">
                                        <label class="form-label">Middle name</label>
                                            <input type="text" class="form-control" placeholder="Enter Middle name" name="middlename" id="middlename" required=""  value="">
                                            
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name<span class="required-mark">*</span></label>
                                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last name" id="lastname" required="" value="">
                                            
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email<span class="required-mark">*</span></label>
                                            <input type="email" class="form-control" placeholder="Enter email"  name="email" id="email"   value="">
                                            
                                
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Access Level<span class="required-mark">*</span></label>
                                        

                                            <select class="form-control" id="level" name="level">
                                                <?php
                                                $query= "SELECT * FROM `level`";
                                                $result1 = $database->query($query);
                                                while ($row=mysqli_fetch_assoc($result1)) {?>
                                                <option value="<?php echo $row["id"];?>"><?php echo $row["name"];}?></option>
                                            </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Institution<span class="required-mark">*</span></label>
                                            <select class="form-control show-tick" id="institution" name="institution">
                                                <option value="0">MOFA</option>
                                                <?php while ($row=$database->fetch_array($rlt)) {?>
                                                <option value="<?php echo $row["id"];?>"><?php echo $row["name"];} ?></option>
                                            </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Username<span class="required-mark">*</span></label>
                                            <input type="text" class="form-control"  name="username" placeholder="Enter username" autocomplete="off" id="username" onblur="check_username()"  value="">
                                        <span  id="feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password<span class="required-mark">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter password" name="password"  id="password"  autocomplete="off"  value="">
                                            <span>* required fields</span>
                                        <span id="error"></span>
                                        
                                    </div>
                                            <span id="status"></span>
                                     <div>
                        <button type="submit" id="registerbtn" class="btn btn-primary btn-sm" onclick="register()">
                          <i class="fa fa-dot-circle-o"></i> Register
                        </button>
                       <a class="btn btn-danger btn-sm" href="users.php"><i class="fa fa-ban"></i> Cancel </a>
                      </div>

                                        

                                  </form>
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                 

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/user.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

    </body>
</html>
<?php require_once("includes/validate_credentials.php"); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<?php require_once("includes/head.php"); ?>
</head>
<body>
        <?php 
                 $id=$Hash->decrypt($_GET['id']);
                $stmt = $database->query("SELECT *  FROM institution_details WHERE id = '$id'");
                 $row = $database->fetch_array($stmt);
                 $cnt=$row['country'];
                  $cntl=$row['country_loc']; 
                 $stmcnt = $database->query("SELECT *  FROM countries WHERE id = '$cnt'");
                 $rowcnt = $database->fetch_array($stmcnt);
                 $stmcntl = $database->query("SELECT *  FROM countries WHERE id = '$cntl'");
                 $rowcntl = $database->fetch_array($stmcntl);
                 
             ?>
             <?php 
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $telephone = $_POST['telephone'];
                        $contact_person = $_POST['contact_person'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];
                        $email = $_POST['email'];
                        $contact_phone = $_POST['contact_phone'];
                        $location = $_POST['location'];
                        $country = $_POST['country'];
                        $country_loc = $_POST['country_loc'];
                        $type = $_POST['type'];
            $stmts = $database->query("UPDATE institution_details SET 
                name = '$name', 
                telephone = '$telephone', 
                contact_person = '$contact_person', 
                start_date = '$start_date', 
                end_date = '$end_date',
                email = '$email',
                contact_phone = '$contact_phone',
                country = '$country', 
                country_loc = '$country_loc',
                location = '$location'
                WHERE id = '$id'") ;
                
                 $value['id']= $row['id'];
                header('Location: display.php?id='.$Hash->encrypt($value['id']).'');
            }
            
                 ?>
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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

           
                 <div class="col-lg-9 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">EDIT Basic Information</strong>
                             <?php  
                                     $values['id']= $row['id'];
                                     echo '<a href="display.php?id='.$Hash->encrypt($values['id']).'"  style="color:black;" class="pull-right">Back to institution</a>';
                                     ?>
                            </div>
                            <div class="card-body">
                           <form action='' method='post' name="form">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="name" 
                            class="form-control" name="name" value='<?php echo $row['name'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="email" 
                            class="form-control" name="email" value='<?php echo $row['email'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">Telephone</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="telephone" 
                            class="form-control" name="telephone" value='<?php echo $row['telephone'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">Contact Person</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="contact_person" 
                            class="form-control" name="contact_person" value='<?php echo $row['contact_person'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">Conatct Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="contact_phone" 
                            class="form-control" name="contact_phone" value='<?php echo $row['contact_phone'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">Country</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <select name="country">
                                   <?php 
                                  $stmtcntry = $database->query("SELECT * FROM countries");
                                   echo'<option value='.$rowcnt['id'].'>'.$rowcnt['nicename'].'</option>';
                                   while ($rowcntry = $database->fetch_array($stmtcntry)) {
                                    echo ' <option value='.$rowcntry['id'].'>'.$rowcntry['nicename'].'</option>';

                                   }
                                   ?>
                            </select>
                                    </div>
                                    
                                </div>
                                <label for="name">Country Represented</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <select name="country_loc">
                                   <?php 
                                  $stmtcntryl = $database->query("SELECT * FROM countries");
                                   echo'<option value='.$rowcntl['id'].'>'.$rowcntl['nicename'].'</option>';
                                   while ($rowcntryl = $database->fetch_array($stmtcntryl)) {
                                    echo ' <option value='.$rowcntryl['id'].'>'.$rowcntryl['nicename'].'</option>';

                                   }
                                   ?>
                            </select>
                                    </div>
                                    
                                </div>
                                <label for="name">Location</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="location" 
                            class="form-control" name="location" value='<?php echo $row['location'];?>'>
                                    </div>
                                    
                                </div>
                                
                                <label for="name">Start Date</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="start_date" 
                            class="form-control" name="start_date" value='<?php echo $row['start_date'];?>'>
                                    </div>
                                    
                                </div>
                                <label for="name">End Date</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="end_date" 
                            class="form-control" name="end_date" value='<?php echo $row['end_date'];?>'>
                                    </div>
                                    
                                </div>
                               </div>

                                <input type='submit' name='submit' value='Update' class="btn btn-primary ">
                            </form>
                            </div>
                        </div>
                    </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    

</body>
</html>

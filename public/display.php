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
             ?>
            
            <?php 
            // save new car
             $user= $_SESSION['username'];
                if(isset($_POST['savec'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        

        if(!isset($error)){

            try {

                $owner = $row['id'];

                //insert into database
                $stmtca = $database->query("INSERT INTO cars (plate_nber,model,insurance_camp,owner,status)
                 VALUES ('$plate_nber', '$model', '$insurance_camp', '$owner', 'active')") ;
                

                   
                //redirect to index page
                 $values['id']=$row['id'];
                header('Location: display.php?id='. $Hash->encrypt($values['id']).'');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
    // save new house
    if(isset($_POST['saveh'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        

        if(!isset($error)){

            try {
                $owner = $row['id'];
                $stmtca = $database->query("INSERT INTO location (province,district,sector,cell,plot_nber,country,status)
                 VALUES ('$province', '$district', '$sector', '$cell',' $plot_nber', '$country', 'active')") ;
             
                 $id_location= $database->inset_id();
                //insert into database
                $stmtca = $database->query("INSERT INTO houses (type,owner,id_location, status) VALUES ('$type', '$owner', '$id_location', 'active')");
                
                
                
                 
                //redirect to index page
                $values['id']=$row['id'];
                header('Location: display.php?id='. $Hash->encrypt($values['id']).'');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
    
      // add a comment
     if(isset($_POST['send'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        

        if(!isset($error)){

            try {

                $owner = $row['id'];
                $id_institution= $row['id_institution'];
                $stmtcat = $database->query("SELECT * FROM institution WHERE id = '$id_institution'");
                $rowtype = $database->fetch_array($stmtcat);
                $type= $rowtype['Name'];
                $time= date('Y-m-d H:i:s');
               

                //insert into database
                $stmtca = $database->query("INSERT INTO comments (user,comment,type,owner,time,status)
                 VALUES ('$user', '$comment', '$type', '$owner', '$time', 'active')") ;
                

                   
                //redirect to index page
                $valuered['id']=$row['id'];
                header('Location: display.php?id='.$Hash->encrypt($valuered['id']).'');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo '<p class="error">'.$error.'</p>';
        }
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
        <!-- displaying institution basic info -->
        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Institution Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="basic-info-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Information</a>
                                                <a class="nav-item nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars" aria-selected="false">Cars</a>
                                                <a class="nav-item nav-link" id="houses-tab" data-toggle="tab" href="#houses" role="tab" aria-controls="houses" aria-selected="false">Houses</a>

                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <!-- basic info tab -->
                                            <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                                              <ul class="list-group list-group-flush">
                                                     <?php 
                                                         
                                                          $pid= $row['id_institution'];
                                                          $stmt = $database->query("SELECT * FROM institution WHERE Id = '$pid' ");
                                                          $rowin = $database->fetch_array($stmt);
                                                           $cnid= $row['country'];
                                                        $stmtcntry = $database->query("SELECT * FROM countries WHERE id= '$cnid'");
                                                         $rowcntry = $database->fetch_array($stmtcntry);
                                                         $cnloc= $row['country_loc'];
                                                        $stmtloc = $database->query("SELECT * FROM countries WHERE id= '$cnloc'");
                                                         $rowloc = $database->fetch_array($stmtloc);
                                                          $value['id']= $row['id'];
                                                          if ($rowin['Name']== "O N G") {
                                                            echo '
                                                               
                                                               <li class="list-group-item"><b>Name:</b> '.$row['name'].'</li>
                                                                       <li class="list-group-item"><b>Type:</b> '.$rowin['Name'].'</li>
                                                                       <li class="list-group-item"><b>Email:</b> '.$row['email'].'</li>
                                                                       <li class="list-group-item"><b>Telephone:</b> '.$row['telephone'].'</li>
                                                                       <li class="list-group-item"><b>Contact Person:</b> '.$row['contact_person'].'</li>
                                                                       <li class="list-group-item"><b>Contact phone:</b> '.$row['contact_phone'].'</li>
                                                                       <li class="list-group-item"><b>Country:</b> '.$rowcntry['nicename'].'</li>
                                                                       <li class="list-group-item"><b>Location:</b> '.$row['location'].'</li>
                                                                       <li class="list-group-item"><b>Benefits:</b> '.$row['benefits'].'</li>
                                                                       <li class="list-group-item"><b>Meeting:</b> '.$row['meeting'].'</li>
                                                                       <li class="list-group-item"><b>Animal contribution:</b> '.$row['animal_contribution'].'</li>
                                                                       <li class="list-group-item"><b>Responsible Ministry:</b> '.$row['responsible_ministry'].'</li>
                                                                       <li class="list-group-item"><b>Attachment:</b> <a href="'.$row['attachment'].'" download>'.$row['attachment'].'</a></li>
                                                                       <li class="list-group-item"><b>Payment date:</b> '.$row['payment_date'].'</li>
                                                                       <li class="list-group-item"><b>Start Date:</b> '.$row['start_date'].'</li>
                                                                       <li class="list-group-item"><b>End Date:</b> '.$row['end_date'].'</li>
                                                                       <li class="list-group-item"><a href="editong.php?id='.$Hash->encrypt($value['id']).'" style="font_size:30px;" >
                                                                     <button type="button" class="btn btn-secondary">Edit</button></a></li>
                                                                  ';
                                                          }
                                                          elseif ($rowin['Name']== "Rwandan Embassies") {
                                                            echo '
                                                               
                                                               <li class="list-group-item"><b>Name:</b> '.$row['name'].'</li>
                                                                       <li class="list-group-item"><b>Type:</b> '.$rowin['Name'].'</li>
                                                                       <li class="list-group-item"><b>Email:</b> '.$row['email'].'</li>
                                                                       <li class="list-group-item"><b>Telephone:</b> '.$row['telephone'].'</li>
                                                                       <li class="list-group-item"><b>Contact Person:</b> '.$row['contact_person'].'</li>
                                                                       <li class="list-group-item"><b>Contact phone:</b> '.$row['contact_phone'].'</li>
                                                                       <li class="list-group-item"><b>Country:</b> '.$rowcntry['nicename'].'</li>
                                                                       <li class="list-group-item"><b>Location:</b> '.$row['location'].'</li>
                                                                       <li class="list-group-item"><b>Start Date:</b> '.$row['start_date'].'</li>
                                                                       <li class="list-group-item"><b>End Date:</b> '.$row['end_date'].'</li>
                                                                       <li class="list-group-item"><a href="editrwem.php?id='.$Hash->encrypt($value['id']).'" style="font_size:30px;" >
                                                                     <button type="button" class="btn btn-secondary">Edit</button></a></li>
                                                                  ';
                                                          }
                                                          elseif ($rowin['Name']== "Foreign Embassies") {
                                                            echo '
                                                               
                                                               <li class="list-group-item"><b>Name:</b> '.$row['name'].'</li>
                                                                       <li class="list-group-item"><b>Type:</b> '.$rowin['Name'].'</li>
                                                                       <li class="list-group-item"><b>Email:</b> '.$row['email'].'</li>
                                                                       <li class="list-group-item"><b>Telephone:</b> '.$row['telephone'].'</li>
                                                                       <li class="list-group-item"><b>Contact Person:</b> '.$row['contact_person'].'</li>
                                                                       <li class="list-group-item"><b>Contact phone:</b> '.$row['contact_phone'].'</li>
                                                                       <li class="list-group-item"><b>Country:</b> '.$rowcntry['nicename'].'</li>
                                                                       <li class="list-group-item"><b>Country Represented:</b> '.$rowloc['nicename'].'</li>
                                                                       <li class="list-group-item"><b>Location:</b> '.$row['location'].'</li>
                                                                       <li class="list-group-item"><b>Start Date:</b> '.$row['start_date'].'</li>
                                                                       <li class="list-group-item"><b>End Date:</b> '.$row['end_date'].'</li>
                                                                       <li class="list-group-item"><a href="editforem.php?id='.$Hash->encrypt($value['id']).'" style="font_size:30px;" >
                                                                     <button type="button" class="btn btn-secondary">Edit</button></a></li>
                                                                  ';
                                                          }
                                                          elseif ($rowin['Name']== "MOFA") {
                                                            echo '
                                                               
                                                               <li class="list-group-item"><b>Name:</b> '.$row['name'].'</li>
                                                                       <li class="list-group-item"><b>Type:</b> '.$rowin['Name'].'</li>
                                                                       <li class="list-group-item"><b>Email:</b> '.$row['email'].'</li>
                                                                       <li class="list-group-item"><b>Telephone:</b> '.$row['telephone'].'</li>
                                                                       <li class="list-group-item"><b>Contact Person:</b> '.$row['contact_person'].'</li>
                                                                       <li class="list-group-item"><b>Contact phone:</b> '.$row['contact_phone'].'</li>
                                                                       <li class="list-group-item"><b>Country:</b> '.$rowcntry['nicename'].'</li>
                                                                       <li class="list-group-item"><b>Location:</b> '.$row['location'].'</li>
                                                                       <li class="list-group-item"><a href="editin.php?id='.$Hash->encrypt($value['id']).'" style="font_size:30px;" >
                                                                     <button type="button" class="btn btn-secondary">Edit</button></a></li>
                                                                  ';
                                                          }
                                                          
                                                              
                                              ?>
                                              </ul>
                                            </div>
                                            <!-- add car tab -->
                                            <div class="tab-pane fade" id="cars" role="tabpanel" aria-labelledby="cars-tab">
                                                <ul class="list-group list-group-flush">
                                                  <li class="list-group-item">
                                                      <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addcar">
                                                         Add Car
                                                        </button>
                                                    </li>
                                                  <?php 
                                                
                                                  $car_id= $Hash->decrypt($_GET['id']);
                                                 $stmtc = $database->query("SELECT * FROM cars WHERE owner = '$car_id' AND status!='deleted' ");
                                                 $num=$database->num_rows($stmtc);
                                                if ($num != 0) {
                                                    $c=1;
                                                    while ($rowi = $database->fetch_array($stmtc)) {
                                                      $value['id']=$rowi['id'];
                                                        echo '

                                                            <li class="list-group-item">
                                                            <a href="cars.php?id='.$Hash->encrypt($value['id']).'">
                                                            <b>Car'.$c.' Plate Number:</b> '.$rowi['plate_nber'].'
                                                            </a>
                                                           </li>

                                                            ';
                                                            $c=$c+1;
                                                    }
                                                    
                                                }
                                                else{
                                                    
                                                    echo "<b>No cars</b>";
                                                }
                                               
                                                    
                                                 ?>
                                                  </ul>
                                            </div>
                                            <!-- add house tab -->
                                            <div class="tab-pane fade" id="houses" role="tabpanel" aria-labelledby="houses-tab">
                                              <ul class="list-group list-group-flush">
                                              <li class="list-group-item">
                                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addhouse">
                                                  Add House
                                               </button>
                                               </li>
                                                 <?php 
                                                
                                                $house_id= $Hash->decrypt($_GET['id']);
                                                $stmth = $database->query("SELECT * FROM houses WHERE owner = '$house_id' AND status!='deleted' ");
                                                    $numh=$database->num_rows($stmth);
                                                if ($numh != 0) {
                                                  
                                                    $n=1;
                                                     while ($rowh = $database->fetch_array($stmth)) {

                                                              $idh=$rowh['id_location'];
                                                            $stmtl = $database->query("SELECT * FROM Location WHERE id = '$idh' AND status!='deleted' ");
                                                             $rowl = $database->fetch_array($stmtl);
                                                             $valueho['id']=$rowh['id'];
                                                             echo ' 
                                                                  
                                                                 <li class="list-group-item">
                                                                 <a href="houses.php?id='.$Hash->encrypt($valueho['id']).'">
                                                                 <div>
                                                                <b>Type of House number '.$n.':</b> '.$rowh['type'].'<br/>
                                                                 <b>Province:</b> '.$rowl['province'].'
                                                                 </div>
                                                                 </a>
                                                                 </li>
                                                                
                                                               
                                                             ';
                                                             $n=$n+1;
                                                         }
                                                    
                                                }
                                                else{
                                                    echo "<b>No houses</b>";   
                                                         }   

                                                 ?>
                                                  </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                      <!-- Comments section -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Comments</h4>
                                </div>
                                <div class="card-body">
                                  <form action='' method='post' name="form">
                                 <div class="form-line">
                                 <div class="form-group">
                                <label >Comment</label>
                                <textarea class="form-control" name='comment' cols='10' rows='5'><?php if(isset($error)){ echo $_POST['comment'];}?></textarea>
                                </div>
                                </div>

                                <input type='submit' name='send' value='Send' class="btn btn-primary ">
                            </form>
                            <!-- displaying comments -->
                            <ul class="list-group list-group-flush card-body">
                              <?php 
                                                
                                                  $cmnt_id= $Hash->decrypt($_GET['id']);
                                                  $typein=$rowin['Name'];
                                                 $stmtc = $database->query("SELECT * FROM comments WHERE owner = '$cmnt_id' AND status!='deleted' AND type = '$typein' ");
                                                 $nums=$database->num_rows($stmtc);
                                                if ($nums != 0) {
                                                    
                                                    while ($rowcmnt = $database->fetch_array($stmtc)) {
                                                      $valuecmnt['id']=$rowcmnt['id'];
                                                      $usernm= $rowcmnt['user']; 
                                                        echo '

                                                            <li class="list-group-item"><b>User:</b> '.$rowcmnt['user'].'<br/>
                                                           <b>Comment:</b> '.$rowcmnt['comment'].'<br/>
                                                           
                                                          

                                                            ';
                                                            if ($user==$usernm) {
                                                              echo ' <a href="editcomment.php?id='.$Hash->encrypt($valuecmnt['id']).'">Edit</a>';
                                                            }
                                                            echo ' </li>';
                                                            
                                                    }
                                                    
                                                }
                                                else{
                                                    
                                                    echo "<b>No Comments</b>";
                                                }
                                               
                                                    
                                                 ?>
                                          </ul>
                                </div>
                            </div>

                          </div>
     
            </div> <!-- .content -->
        <!-- inserting modals -->
        
                <!-- add car -->
     <div class="modal fade" id="addcar" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add Car</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action='' method='post' name="form">
                                <label >Plate Number</label>
                                <div class="form-group">
                                <div class="form-line">
                                 <input type="text" id="plot_nber" class="form-control" name="plate_nber" value='<?php if(isset($error)){ echo $_POST['plate_nber'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >Model</label>
                                 <input type="text" id="model" class="form-control" name="model" value='<?php if(isset($error)){ echo $_POST['model'];}?>' required>
                                </div>
                                
                                <div class="form-line">
                                <label >Insurance</label>
                                 <input type="text" id="insurance_camp" class="form-control" name="insurance_camp" value='<?php if(isset($error)){ echo $_POST['insurance_camp'];}?>' required>
                                </div>

                                </div>

                                <input type='submit' name='savec' value='Save' class="btn btn-primary ">
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add house -->
     <div class="modal fade" id="addhouse" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add House</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action='' method='post' name="form">
                                <label >Type of House</label>
                                <div class="form-group">
                                <div class="form-line">
                                 <input type="text" id="type" class="form-control" name="type" value='<?php if(isset($error)){ echo $_POST['type'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >Province</label>
                                 <input type="text" id="province" class="form-control" name="province" value='<?php if(isset($error)){ echo $_POST['province'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >District</label>
                                 <input type="text" id="district" class="form-control" name="district" value='<?php if(isset($error)){ echo $_POST['district'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >Sector</label>
                                 <input type="text" id="sector" class="form-control" name="sector" value='<?php if(isset($error)){ echo $_POST['sector'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >Cell</label>
                                 <input type="text" id="cell" class="form-control" name="cell" value='<?php if(isset($error)){ echo $_POST['cell'];}?>' required>
                                </div>
                                <div class="form-line">
                                <label >Plot Number</label>
                                 <input type="text" id="plot_nber" class="form-control" name="plot_nber" value='<?php if(isset($error)){ echo $_POST['plot_nber'];}?>' required>
                                </div>
                                <label for="Name">Country</label>
                                <div class="form-line">
                                <select name="country">
                               <?php 
                                  $stmtcntry = $database->query("SELECT * FROM countries");
                                   while ($rowcntry = $database->fetch_array($stmtcntry)) {
                                    echo ' <option value='.$rowcntry['id'].'>'.$rowcntry['nicename'].'</option>';

                                   }

                                 ?>
                                    
                                </select>
                                </div>

                                </div>

                                <input type='submit' name='saveh' value='Save' class="btn btn-primary ">
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
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

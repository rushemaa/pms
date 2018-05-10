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
<?php require_once("includes/head.php"); ?>
</head>
<body>
    <!-- adding new institution category -->
                <?php

    //if form has been submitted process it
    if(isset($_POST['save'])){

        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

         $Name = $_POST['Name'];
          $status = "active";

        if(!isset($error)){

            try {

                

                //insert into database
                $stmt = $database->query("INSERT INTO institution (Name,status) VALUES ('$Name', '$status')") ;
               

                //redirect to index page
                header('Location: home');
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
<!-- Main content -->
        <div class="content mt-3">
            <!-- diplaying main content -->
           <?php
          try {

        $stmt = $database->query('SELECT Id, Name FROM institution  WHERE status !="deleted"  ORDER BY Id DESC');
         while($row = $database->fetch_array($stmt)){
            $stmtt = $database->query('SELECT COUNT(*)
                                FROM institution_details
                                WHERE id_institution = "'.$row['Id'].'"');
            $rowc = $database->fetch_array($stmtt);
            $value['id']= $row['Id'];
            
                                        
            echo '
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <a href="editinstitutioncat.php?id='.$Hash->encrypt($value['id']).'"><div class="stat-icon dib">
                                    <i class="ti-pencil-alt text-success border-success"></i>
                                    </div></a>
                                    <div class="stat-content dib">
                                        <a href="single.php?id='.$Hash->encrypt($value['id']).'"><div class="stat-text">'.$row['Name'].'</div></a>
                                        <h4 class="mb-0">
                                            <span class="count">'.$rowc[0].'</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            
                   
            ';
            
             }
            } catch(PDOException $e) {
             echo $e->getMessage();
             }
                                
                ?>
                
                
    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addmodal">
        Add Institution Category
     </button>
     <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action='' method='post' name="form">
                                <label for="Name">Name</label>
                                <div class="form-group">
                                <div class="form-line">
                                 <input type="text" id="Name" class="form-control" name="Name" value='<?php if(isset($error)){ echo $_POST['Name'];}?>' required>
                                </div>
                                

                                </div>

                                <input type='submit' name='save' value='Save' class="btn btn-primary ">
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
    
        </div> 
        <!-- end of main content -->
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

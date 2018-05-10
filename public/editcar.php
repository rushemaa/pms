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
                $stmt = $database->query("SELECT *  FROM cars WHERE id = '$id'");
                $row = $database->fetch_array($stmt); 
             ?>
              <?php 
                    if(isset($_POST['submit'])){
                        $plate_nber = $_POST['plate_nber'];
                        $model = $_POST['model'];
                        $insurance_camp = $_POST['insurance_camp'];
                        
           $stmts = $database->query("UPDATE cars SET plate_nber = '$plate_nber', model = '$model', 
            insurance_camp = '$insurance_camp' WHERE id = '$id'") ;
                $valuei['id']=$row['id'];
                header('Location: cars.php?id='.$Hash->encrypt($valuei['id']).'');
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

           
                 <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">EDIT Car</strong>
                            </div>
                            <div class="card-body">
                             <form action='' method='post' name="form">
                                <label >Plate Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="plate_nber" 
                            class="form-control" name="plate_nber" value='<?php echo $row['plate_nber'];?>'>
                                    </div>
                                    
                                </div>
                                <label>Model</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="model" 
                            class="form-control" name="model" value='<?php echo $row['model'];?>'>
                                    </div>
                                    
                                </div>
                                <label>Insurance</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="insurance_camp" 
                            class="form-control" name="insurance_camp" value='<?php echo $row['insurance_camp'];?>'>
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

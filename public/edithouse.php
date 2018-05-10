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
            $id = $Hash->decrypt($_GET['id']);
                $stmt = $database->query("SELECT *  FROM houses WHERE id = '$id'");
                $row = $database->fetch_array($stmt);
                
             ?>
             <?php 
                    if(isset($_POST['submit'])){
                        $type = $_POST['type'];
                        $province = $_POST['province'];
                        $district = $_POST['district'];
                        $sector = $_POST['sector'];
                        $cell = $_POST['cell'];
                        $plot_nber = $_POST['plot_nber'];
                        $idh=$row['id_location'];
                        $country = $_POST['country'];

            $stmts = $database->query("UPDATE houses SET type = '$type' WHERE id = '$id'") ;
               
                 $stmtl = $database->query("UPDATE location SET province = '$province', district = '$district',
                  sector = '$sector', cell = '$cell', plot_nber = '$plot_nber', country = '$country' WHERE id = '$idh'") ;
                $values['id']= $row['id'];
                header('Location: houses.php?id='.$Hash->encrypt($values['id']).'');
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
                                <strong class="card-title">EDIT House</strong>
                            </div>
                            <div class="card-body">
                             <form action='' method='post' name="form">
                                <label >Type of House</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="type" 
                            class="form-control" name="type" value='<?php echo $row['type'];?>'>
                                    </div>
                                    
                                </div>
                                <?php 
                                    $idl=$row['id_location'];
                                   $resl = $database->query("SELECT * FROM Location WHERE id = '$idl' ");
                                    $rowl = $database->fetch_array($resl);
                                    $cnt=$rowl['country']; 
                                    $stmcnt = $database->query("SELECT *  FROM countries WHERE id = '$cnt'");
                                    $rowcnt = $database->fetch_array($stmcnt); 
                                 ?>
                                <label>Province</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="province" 
                            class="form-control" name="province" value='<?php echo $rowl['province'];?>'>
                                    </div>
                                    
                                </div>
                                <label>District</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="district" 
                            class="form-control" name="district" value='<?php echo $rowl['district'];?>'>
                                    </div>
                                    
                                </div>
                                <label>Sector</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="sector" 
                            class="form-control" name="sector" value='<?php echo $rowl['sector'];?>'>
                                    </div>
                                    
                                </div>
                                 <label>Cell</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="cell" 
                            class="form-control" name="cell" value='<?php echo $rowl['cell'];?>'>
                                    </div>
                                    
                                </div>
                                <label>Plot Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                            <input type="text" id="plot_nber" 
                            class="form-control" name="plot_nber" value='<?php echo $rowl['plot_nber'];?>'>
                                    </div>
                                    
                                </div>
                               <label>Country</label>
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

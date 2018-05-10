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
        $house_id= $Hash->decrypt($_GET['id']);
        $stmth = $database->query("SELECT * FROM houses WHERE id = '$house_id' AND status!='deleted' ");
        $rowh = $database->fetch_array($stmth);
        $idh=$rowh['id_location'];
        $stmtl = $database->query("SELECT * FROM Location WHERE id = '$idh' AND status!='deleted' ");
        $rowl = $database->fetch_array($stmtl);
        $country= $rowl['country'];
        $stmtcnt = $database->query("SELECT * FROM countries WHERE id = '$country'");
        $rowcnt = $database->fetch_array($stmtcnt);
        // deleting a House
       if(isset($_POST['del'])){
                        
            $stmts = $database->query("UPDATE houses SET status='deleted' WHERE  id = '$house_id'") ;
                $stmtse = $database->query("UPDATE location SET status='deleted' WHERE  id = '$idh'") ;
                $values['id']= $rowh['owner'];
                header('Location: display.php?id='.$Hash->encrypt($values['id']).'');
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
        
                        <!-- displaying Cars -->
                        <div class="col-lg-8 col-md-6">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="text-light display-6"> <?php echo $rowh['type'];?> 
                                            </h4>
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                  <?php
                                
                                        $valueho['id']=$rowh['id'];
                                        $valueh['id']=$rowh['owner'];
                                        echo '
                       
                                                <li class="list-group-item active bg-cyan">
                                                    <a href="edithouse.php?id='.$Hash->encrypt($valueho['id']).'"  style="color:white;">Edit</a>
                                                    <a href="display.php?id='.$Hash->encrypt($valueh['id']).'"  style="color:white;" class="pull-right">Back to institution</a>
                                                </li>
                                                <li class="list-group-item"><b>Type of House:</b> '.$rowh['type'].'</li>
                                                <li class="list-group-item"><b>Province:</b> '.$rowl['province'].'</li>
                                                <li class="list-group-item"><b>District:</b> '.$rowl['district'].'</li>
                                                <li class="list-group-item"><b>Sector:</b> '.$rowl['sector'].'</li>
                                                <li class="list-group-item"><b>Cell:</b> '.$rowl['cell'].'</li>
                                                <li class="list-group-item"><b>Plot Number:</b> '.$rowl['plot_nber'].'</li>
                                                <li class="list-group-item"><b>Country:</b> '.$rowcnt['nicename'].'</li>
                                                <li class="list-group-item">
                                                <form action="" method="post" name="form" >
                                                <input type="submit" clas="pull-right" name="del" value="Delete" class="btn btn-primary ">
                                                </form>
                                                </li>
                                            ';
                                           
                               
                                    
                                 ?>
                                  </ul>
                                  </section>
                        </aside>
                    </div>
                    <!-- displaying houses -->
                     

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

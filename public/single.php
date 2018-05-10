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

    <style type="text/css">
            .itemB{
            padding: 3px;
            padding-left: 2%;
    }
    .dataTables_filter, .dataTables_info { display: none; }
    .itemH{
        border-bottom: 1px solid #DCDCDC;
    }
    .search_data{
        background: white;
        left: 72%;
        top: 190px;
        width: 25%;
        border-radius: 2px;: 
        border:1px solid #DCDCDC;
    }
    .itemB span{
        font-size: 16px;
    }
    .headerName{
        font-size: 18px;
        font-weight: bold;
    }
    .value{
        margin-left: 20%;
    }
    #search{
        width: 120%;
        font-size: 22px;
    }
    .search_data a {
        text-decoration: none;
        color: grey;
    }
    </style>

  
    <?php require_once 'includes/left_nav.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
     <?php require_once 'includes/top_nav.php'; ?>
        <!-- Header-->
     <section class="content">
        <div class="container-fluid">
            <div class="block-header text-center" style="position: relative;top: 20px;margin-right: 10%;">
                <h2 id="header-h2">
                    LIST OF <?=$database->get_item('institution','Id',$Hash->decrypt($_GET['id']),'Name')?>
                   
                </h2>
            </div><br>
                    <div class="pull-right" style="margin-bottom: 20px;">
                        <form>
                        <div style="display: inline;">
                        <i class="fa fa-search pull-right" style="position:absolute;margin-left: 18%;margin-top: 10px;"></i>
                        <form autocomplete="off">
                        <input class="form-control pull-right" placeholder="Search ... " maxlength="20" id="search" aria-label="Search" type="text" name="search" autocomplete="off" style="border: none;border-bottom: 1px solid #095C7E;background: transparent;box-shadow: none;color: #095C7E"> 
                        </form>
                        </div>
                    </form>
                    </div>
                    <div class="search_data pull-right" style="position: absolute;z-index: 9999;"></div>
                    </div>
 
            <!-- Basic Examples -->
            <div class="row clearfix">    
                        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"></strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Phone Number</th>
                                            <th>Contact Person</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                      <tbody><?php $id = $Hash->decrypt($_GET['id']); 
                      $st4 = $database->query("SELECT  * from institution_details WHERE id_institution=$id AND status=1 ORDER BY id DESC");

                        foreach ($st4 as $key => $value) {?>
                                        
                                        <tr>
                                            <td><?=$value['name']?></td>
                                            <td><?=$database->get_item('institution','id',$value['id_institution'],'Name');?></td>
                                                <?php $pr = $database->get_item('location','id',$value['id_location'],'province');
                                                      $dis = $database->get_item('location','id',$value['id_location'],'district');
                                                      $cell = $database->get_item('location','id',$value['id_location'],'cell');
                                                ?>

                                            <td><?=getLocation($pr,$dis,$cell)?></td>
                                            <td><?=$value['telephone']?></td>
                                            <td><?=$value['contact_person']?></td>
                                            <td><?=$value['duration']?></td>
                                            <td><a href="display?id=<?=$Hash->encrypt($value['id'])?>"><input class="btn btn-primary update" type="submit" value="View More" name="" data-id=<?=$value['id']?>></a></td>
                                        </tr>
                        <?php } ?>                
                                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>
                    
            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script type="text/javascript">
        $('#search').keyup(function(e){
            var length = $(this).val().length;
            if (!(e.keyCode == 32 && length < 2)) {
            $(".search_data").html('');
             $.ajax({
                url : 'search.php',
                type : 'POST',
                data : {
                    'search' : $(this).val(),
                },
                success : function(data){
                    $(".search_data").append(data);
                    console.log(data);
                }
            });
        }});
    </script>
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
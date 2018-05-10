<?php require_once("includes/validate_credentials.php");

$sql="SELECT * FROM user WHERE status = 'active'";
$result=$database->query($sql);
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
                            <li class="active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated">

                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Users</strong>
                    </div>
                    <div class="card-body">
                        <table id="user-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Institution</th>
                                <th>Access Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($row=$database->fetch_array($result)) {?>

                                <tr>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['mname'];?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <?php if($row['id_institution']==0){ ?>
                                    <td>MOFA</td> <?php }else{ ?>
                                    <td><?php echo $database->get_item("institution_details","id",$row['id_institution'],"name");?></td><?php }?>
                                    <td><?php echo $database->get_item("level","id",$row['level'],"name"); ?></td>

                                    <td>
                                        <a href="edituser.php?id=<?php echo $Hash->encrypt($row['id']);?>" >
                                            <button class="btn btn-primary btn-sm mb-1" type="submit"  name="edit">Edit</button>
                                        </a>
                                        <button type="button" class="btn btn-primary btn-sm mb-1 delete_user" onclick="return confirm('Are you sure to delete data?')?deleteUser('<?php echo $row['id']; ?>',this):false;">Delete</button>
                                    </td>


                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>






            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        function deleteUser(id,r) {

            // AJAX Request
            var ajax = ajaxObj("POST", "userAction.php");
            ajax.onreadystatechange = function() {
                if(ajaxReturn(ajax) == true) {
                    if(ajax.responseText == "deleted"){
                        var i = r.parentNode.parentNode.rowIndex;
                        document.getElementById("user-table").deleteRow(i);
                    }
                }
            };
            ajax.send("id="+id+"&delete=delete");


        }


    </script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>


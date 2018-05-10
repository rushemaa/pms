<?php
session_start();
require_once("../web-config/config.php"); 
require_once("../web-config/database.php"); 
if(isset($_SESSION["id"]) && isset($_SESSION["username"])  && isset($_SESSION["level"])) {
      //updating last login
        $sql = "SELECT id, username, level FROM user WHERE username ='{$_SESSION["username"]}' AND id='{$_SESSION["id"]}' AND active='1' LIMIT 1";
        $query = $database->query($sql);
        $n = $database->num_rows($query);
		if($n > 0){
	     $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
         $sql = "UPDATE user SET ip='$ip', lastlogin=now() WHERE username='{$_SESSION['username']}' LIMIT 1";
         $query = $database->query($sql);
         header("location:home");
		}
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<?php require_once("includes/head.php"); ?>
</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        
                        <span id="status"></span>
                        
                        <button type="button" id="loginbtn" onclick="log()" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/login.js"></script>
</body>
</html>

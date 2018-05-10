
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
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form>
                    	<div class="form-group">
                            <label>First Name</label><span class="required-mark">*</span>
                            <input type="text" id="fname" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label><span class="required-mark">*</span>
                            <input type="text" id="lname" class="form-control" maxlength="255">
                        </div>
                        
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" maxlength="255">
                        </div>
                        
                        <div class="form-group">
                            <label>User Name</label><span class="required-mark">*</span>
                            <input type="text" class="form-control" maxlength="16">
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label><span class="required-mark">*</span>
                            <input type="text" id="password" class="form-control" maxlength="40">
                        </div>
                       
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="index">Back</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>

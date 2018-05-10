<?php
require_once '../web-config/grobals.php';
require_once 'encryption.php';

$sql="SELECT * FROM institution";
$re=$database->query($sql);
?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Diplomats</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Add Diplomats</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-ambassador">Add Ambassadors </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-foreign-diplomat"> Add a Foreign Diplomat </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-visitor"> Add a Visitor </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-mofa"> Add a Mofa Staff </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-rwandan-diplomat"> Add a Rwandan Diplomat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Institutions</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Add Institution</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                 <i class="menu-icon ti-plus"></i><a href="register-ngo">Add NGO </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-foreign-embassy"> Add a Foreign Embassy </a>
                            </li>
                            <li>
                                <i class="menu-icon ti-plus"></i><a href="register-rwandan-embassy"> Add a Rwandan Embassy </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Embassy</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-home"></i><a href="single.php?id=<?=$Hash->encrypt(3)?>&name=<?=$Hash->encrypt('Rwandan Embassy')?>">Rwandan Embassy</a></li>
                            <li><i class="menu-icon ti-home"></i><a href="single.php?id=<?=$Hash->encrypt(2)?>&name=<?=$Hash->encrypt('Foreign Embassy')?>">Foreign Embassy</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="single.php?id=<?=$Hash->encrypt(4)?>&name=<?=$Hash->encrypt('NGO')?>"> <i class="menu-icon ti-home"></i>NGO </a>
                    </li>
                    <li>
                        <a href="single.php?id=<?=$Hash->encrypt(1)?>&name=<?=$Hash->encrypt('MOFA Employees')?>"> <i class="menu-icon ti-home"></i>Mofa </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-user"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-menu"></i><a href="users">Users List</a></li>
                            <li><i class="menu-icon ti-plus"></i><a href="register-user">Register</a></li>
                            
                        </ul>
                    </li>

                   
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
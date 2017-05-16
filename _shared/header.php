<?php
// Start the session
session_start();
if (!isset($_SESSION['logged_user'])) {
    header("Location: login.php");
}
include_once('backend/dbConnect.php');
// read notifications
if($_SESSION['logged_user']['type'] == "officer"){
    $sql = "SELECT * FROM notifications WHERE officer = 1";
} else {
    $sql = "SELECT * FROM notifications WHERE admin = 1";
}
$results = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Police Web | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
    <?php
        if($_SESSION['logged_user']['type'] != "officer"){
    ?>
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>WD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Police</b>Web</span>
        </a>
    <?php
        }
    ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top"
        <?php if ($_SESSION['logged_user']['type'] == "officer") {
            ?>
            style="margin-left:0px"
        <?php
        }
        ?>
        >
    <?php
        if($_SESSION['logged_user']['type'] != "officer"){
    ?>
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
    <?php
        } else {
    ?>
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>WD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Police</b>Web</span>
        </a>
    <?php
        }
    ?>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?php echo $results->num_rows; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <!-- inner menu: contains the actual data -->
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                            <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                            <?php
                                $count = 1;
                                while ($row = $results->fetch_assoc()) {
                            ?>
                              <li>
                                <a href="#">
                                  <i class="fa fa-warning text-yellow"></i> <?php echo $row['message']; ?></a>
                              </li>
                            <?php
                                }
                            ?>
                            </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                          </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['logged_user']['name']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['logged_user']['name']; ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="api/service.php?logout=true" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php
        if($_SESSION['logged_user']['type'] != "officer"){
    ?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['logged_user']['name']; ?></p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="officers.php"><i class="fa fa-users"></i> <span>Police Officers</span></a></li>
                <li><a href="drivers.php"><i class="fa fa-car"></i> <span>Drivers</span></a></li>
                <li><a href="districts.php"><i class="fa fa-map"></i> <span>Districts</span></a></li>
                <li><a href="critical_hours.php"><i class="fa fa-clock-o"></i> <span>Critical Hours</span></a></li>
                <li><a href="traffic_violation.php"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        <span>Traffic Violations</span></a></li>
                <li><a href="admin_functions.php"><i class="fa fa-user-secret" aria-hidden="true"></i>
                        <span>Admin Functions</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <?php
        }
    ?>
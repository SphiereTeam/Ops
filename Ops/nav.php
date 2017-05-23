<!DOCTYPE html>
<?php
require("head.php");
 include("database_connection.php");
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HRFMS</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/skins/skin-purple-Green-dst.css" />
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/all.css" />
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css" />
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" />
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css" />
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>

    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php
include("function/number_to_string.php");
include("top_nav.php");
echo $user_id;
?>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="http://myhr.dst-group.com/selfservice/EmpImages/<?php echo  sprintf("%'.06d", $user_id)?>.jpg" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $username;?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                        <!-- /.search form -->
                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="active treeview">
                                <a href="index.php">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
							
							
						<li class="treeview">
						  <a href="#">
							<i class="fa fa-user"></i> <span>HR Operations</span>
								<span class="pull-right-container">
								  <i class="fa fa-angle-left pull-right"></i>
								</span>
						  </a>
						  <ul class="treeview-menu">
							<li>
							  <a href="#"><i class="fa fa-circle-o"></i> Administration
								<span class="pull-right-container">
								  <i class="fa fa-angle-left pull-right"></i>
								</span>
							  </a>
							  <ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i> Overview</a></li>
								<li>
								  <a href="#"><i class="fa fa-circle-o"></i> Configuration
									<span class="pull-right-container">
									  <i class="fa fa-angle-left pull-right"></i>
									</span>
								  </a>
								  <ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Year</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Date Configuration</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Payroll Calculation</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Overtime Calculation</a></li>
								  </ul>
								</li>
								
							  </ul>
							</li>
							
							<li>
							  <a href="#"><i class="fa fa-circle-o"></i> Payroll
								<span class="pull-right-container">
								  <i class="fa fa-angle-left pull-right"></i>
								</span>
							  </a>
							  <ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i> Approval</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Rejected Data</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Report Generation</a></li>
							
								
							  </ul>
							</li>
							<li>
							  <a href="#"><i class="fa fa-circle-o"></i> Reference Letter
								<span class="pull-right-container">
								  <i class="fa fa-angle-left pull-right"></i>
								</span>
							  </a>
							  <ul class="treeview-menu">
								<li><a href="reference.php"><i class="fa fa-circle-o"></i> Application</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Application For Team</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Approval</a></li>
								<li><a href="reference_admin.php"><i class="fa fa-circle-o"></i> Approved Letter</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Rejected Data</a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Report Generation</a></li>
							
								
							  </ul>
							</li>
							<li><a href="#"><i class="fa fa-circle-o"></i> Payroll Calculation</a></li>
						  </ul>
						</li>
							
							
							
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Kantech Administration</span>
                                    <span class="pull-right-container">
								<span class="label label-primary pull-right">4</span>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>  For Your Approval</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i>To do Lists</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i>  User Management</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i> Zone Management</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i> Inventory Management</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="application.php">
                                    <i class="fa fa-th"></i> <span>Application</span>
                                    <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pie-chart"></i>
                                    <span>My Attendance</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="new_sheet.php"><i class="fa fa-circle-o"></i> New Sheet</a></li>
                                    <li><a href="sheet_submit.php"><i class="fa fa-circle-o"></i> Submit My Sheet</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i> Submit Attendance</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i>My Attendance History</a></li>
                                </ul>
                            </li>
                            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                            <li class="header">LABELS</li>
                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <!------------------------------------------------------------------------------------------------------------------------------------------------------------------!>
  <!-- Content Wrapper. Contains page content -->

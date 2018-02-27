<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$ausername=$_SESSION['ausername'];

?>
<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>AlphaCare</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="../plugins/css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="../plugins/css/style.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (blue.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="../plugins/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <!-- Logo -->
                <div class="top-left-part">
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span>
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <!-- This is the message dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!---PNB --->
                    <!-- .Task dropdown -->

                    <!-- /.Task dropdown -->
                    <!-- .user dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/user(2).png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $ausername; ?></b> </a>
                        <ul class="dropdown-menu dropdown-user scale-up">
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.user dropdown-user -->
                    </li>
                    <!-- /.user dropdown -->
                    <!-- /.PNB removed mega menu-->
                    <!--<li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- Search input-group this is only view in mobile -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                        </div>
                        <!-- / Search input-group this is only view in mobile-->
                    </li>
                    <!-- User profile-->
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/users/user(2).png" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo $ausername; ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- User profile-->
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <!---DNS Added Dashboard menu --->
                    <li> <a href="index.html" class="waves-effect active"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>

                    <!---PNB Added Doctors menu --->
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Doctors <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="add-doctor.php">Add Doctor</a> </li>
							<li> <a href="doctors.html">View Doctors</a> </li>
                        </ul>
                    </li>
					<!---PNB Added Patient menu --->
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Patients <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="patients.html">View Patients</a> </li>
                            <li> <a href="add-patient.html">Add Patient</a> </li>
                            <li> <a href="edit-patient.html">Edit Patient</a> </li>
                            <li> <a href="patient-profile.html">Patient Profile</a> </li>
                        </ul>
                    </li>

                  <!--DNS Added Admin menu-->
                   <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu"> Admin <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="add-admin.php">Add Admin</a> </li>
							<li> <a href="view-admin.php">View Admins</a> </li>
                        </ul>
                    </li>
                   <!---PNB Added logout menu --->
                    <li><a href="logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>

                </ul>
            </div>
        </div>
        <!-- Left navbar-sidebar end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="#">Doctors</a></li>
                            <li class="active">View Doctors</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!--DNS added Dashboard content-->

                 <!--DNS Added Model-->
                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">EDIT Instructions</h4>
                                        </div>
                                        <div class="modal-body">
                                       	 To Edit Admin information or to delete Admin account you need to login to that admin account.
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <a href="logout.php" class="btn btn-danger waves-effect waves-light">Proceed for login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <!--DNS model END-->


                <!--row -->
                <div class="row">
                <?php
					$query = "SELECT 	doc_id,username, email, qualification, gender, phone FROM doctors";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><?php if($result["gender"]=='male'){ ?> <img src="../plugins/images/users/doctor-male.jpg" class="img-circle img-responsive"><?php } else { ?><img src="../plugins/images/users/doctor-female.jpg" class="img-circle img-responsive"> <?php } ?>  </a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Dr. <?php echo $result["username"]; ?></h3> <small><?php echo $result["qualification"]; ?></small>
                                    <p>
										<a href="mailto:<?php echo $result["email"]; ?>"> <?php echo $result["email"]; ?> </a> <br>
										<i class="fa fa-phone"></i><?php echo $result["phone"]; ?>
										<div class="p-t-5">
											<a href="edit-user.php?id=" class="fcbtn btn btn-info">Edit</a>
											<a href="#" class="fcbtn btn btn-danger model_img deleteDoctor" data-id="<?php echo $result["doc_id"]; ?>" id="deleteDoc">Delete</a>
									    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php
					}
				  ?>

				</div>

                <!--/row -->

                <!--DNS End-->
                <!-- .row -->
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Blank Starter page</h3>
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->
                <!-- .right-sidebar -->
                 <!-- Removed Service Panel DNS-->
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; AlphaCare: Online Hospital Management System </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../plugins/bootstrap/dist/js/tether.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="../plugins/js/jquery.slimscroll.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>

    <!--Wave Effects -->
    <script src="../plugins/js/waves.js"></script>
    <!---DNS Imported --->
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="../plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="../plugins/bower_components/peity/jquery.peity.init.js"></script>
    <script src="../plugins/js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--DNS End-->
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/js/custom.min.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
  $('.deleteDoctor').click(function(){
    id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
      }, function(){
          console.log(id);
          $.ajax({
          url: 'delete.php?id='+id,
          type: 'DELETE',
          data: {id:id},
          success: function(){
            swal("Deleted!", "User has been deleted.", "success");
            window.location.replace("view-doctors.php");
          }
        });

      });
  });

});
</script>

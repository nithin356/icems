<?php
include '../login/accesscontrolhead.php';
$username=$_SESSION['h_username'];
$query="SELECT * FROM head WHERE h_username='$username'";
$resu=mysqli_query($connection,$query);
$t=mysqli_fetch_assoc($resu);
					
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>ICEMS | HEAD</title>
    <?php include 'assets/csslink.php'; ?>
</head>

<body>

    <div><?php include 'assets/header.php'; ?>
	</div>
	<?php include 'assets/left-sidebar.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url(../plugins/images/700-min.jpg)">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div>
				<font size="100" color="#870E10" face="batmanforeveralternate"><center>WELCOME EVENT HEAD</center>	
					<br></font>
					
					<center><div><img src="../plugins/images/users/man.png" alt="user-img" class="img-circle"></div></center>
					<font size="100" face="algerian" color="#4F1490"><center><?php echo $t['hfname']; ?></center></font>
				</div>
				<BR>
				<center>
				You are Now Eligible Organize The Fest
				</center>
				
                    </div>
                </div>
              </div>
            </div>  <!--row -->
                <!-- /.row -->
                  <!-- /.container-fluid -->
                  <?php include 'assets/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
      <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>

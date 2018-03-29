<?php
require('connect.php');
$getfestname="SELECT f_id FROM result ";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$fid=$getfestnamerow['f_id'];
$getfname="SELECT fname FROM fest where f_id='$fid'";
$getfestnameresult1=mysqli_query($connection,$getfname);
$getfestnamerow1=mysqli_fetch_assoc($getfestnameresult1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICEMS Inter Collegiate Event Management System">
    <meta name="author" content="Nithin">
    <!--csslink.php includes fevicon and title-->
    <?php include 'assets/csslink.php'; ?>
</head>

<body class="fix-sidebar">
     <!--header.php includes preloader, top navigarion, logo, user dropdown-->
    <!--div id wrapper in header.php-->
    <!--left-sidebar.php includes mobile search bar, user profile, menu-->
    <?php include 'assets/header.php';
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div>
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Results</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                     </div>
                    <!-- /.breadcrumb -->
                </div>
				<div class="row">
                <?php
					$query = "SELECT * FROM result ";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
					<div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:7px"><i class="fa fa-bullhorn"></i></div>
                        <div class="white-box" style="background-image: url(../plugins/images/profile-menu-temp.png)">
                            <div class="row">
                                  <div class="col-md-8 col-sm-8">
									<h3>&nbsp;&nbsp;Fest Name:
										<br>
									&nbsp;&nbsp;<?php echo $getfestnamerow1['fname']; ?></h3>
                                   <h3>&nbsp;&nbsp;Event Name:<br>&nbsp;&nbsp;<?php echo $result['r_eventname']; ?></h3>
									<h3 >&nbsp;&nbsp;Team Code:<br>&nbsp;&nbsp;<?php echo $result['cname']; ?></h3>
									<h3>&nbsp;&nbsp;Round:<br>&nbsp;&nbsp;<?php echo $result['round']; ?></h3>
						     </div>
                            </div>
                        </div>
                    </div>
                  <?php
					}
				  ?>

				</div>
            </div>
			<!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>

</html>

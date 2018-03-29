<?php
include '../login/accesscontrolstdco.php';
require('connect.php');
$username=$_SESSION['s_username'];
$getfestname="SELECT s_id, fest FROM std_co WHERE s_username='$username'";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$sid=$getfestnamerow['s_id'];
$fid=$getfestnamerow['fest'];
$getfname="SELECT * FROM fest where f_id='$fid'";
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
	include 'assets/left-sidebar.php';
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url(../plugins/images/w.jpg)">
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Fests</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                       <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
				<div class="row">
             
                <div class="col-md-4 col-sm-4">
					<div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:7px"><i class="fa fa-calendar"></i></div>
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
									College Name:<h3 class="box-title m-b-0"><?php echo $getfestnamerow1['coname']; ?></h3>  
                                    Fest Name:<h3 class="box-title m-b-0"><?php echo $getfestnamerow1['fname']; ?></h3>  
                                    Date:<h3 class="box-title m-b-0"><?php echo $getfestnamerow1['date']; ?></h3>
                                    Description:
									  <h3 class="box-title m-b-0">  <p><?php echo $getfestnamerow1['f_desc']; ?></h3>
										<div class="p-t-5">
											   
								<a href="view-events.php?id=<?php echo $getfestnamerow1['f_id']; ?>" class="fcbtn btn btn-danger model_img">More Info</a>
									    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  
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
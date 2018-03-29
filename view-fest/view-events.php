<?php
require('connect.php');

$fid=$_GET['id'];

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
    <?php
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div>
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Events</h4>
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
					
                <?php
					$query = "SELECT * FROM add_event WHERE f_id='$fid'";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
					<div class="col-md-4 col-sm-4"><div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:7px"><i class="fa fa-calendar"></i></div>	
					    <div class="white-box">
                            <div class="row">
                                  <div class="col-md-10 col-sm-10">
									Event Name:<h3 class="box-title m-b-0"><?php echo $result['e_eventname']; ?></h3>
                                    <p>  
									Event Description:<h3 class="box-title m-b-0"><?php echo $result['e_desc']; ?></h3>
								<p>  
									Event Rounds:<h3 class="box-title m-b-0"><?php echo $result['round']; ?></h3>
									  
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
<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
$getfestname="SELECT s_id, fest FROM std_co";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$sid=$getfestnamerow['s_id'];
$fid=$getfestnamerow['fest'];
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Participant</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                      <?php echo breadcrumbs(); ?>
                    </div>
                </div>
				
      <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Registered Participants</h3>
                            <div class="table-responsive">
                                <table class="table table-stripped full-color-table full-dark-table">
                                    <thead>
                                        <tr>
                                            <th>Participants</th>
                                           	<th>Fest</th>
											<th>Event Name</th>
											<th>College Name</th>
																			
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php
												$sql = "SELECT *,add_event.e_eventname,fest.fname, std_co.s_college FROM participant JOIN add_event ON   participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id JOIN std_co ON participant.sid=std_co.s_id WHERE sid='$sid'";
												$result = mysqli_query($connection, $sql);
												foreach($result as $key=>$result)
												{ ?>
													<tr>
														<td> <?php echo $result["p_name"] ?> </td>
														<td> <?php echo $result["fname"]; ?> </td>
														<td> <?php echo $result["e_eventname"]; ?> </td>
														<td> <?php echo $result["s_college"]; ?> </td>
														
												</tr>
										  <?php
												}
										  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>
</html>
